<?php
namespace Fab\Speciality\Processor;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Fab\Formule\Processor\AbstractProcessor;
use Fab\Formule\Service\TemplateService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;

/**
 * Class NewsletterEditProcessor
 */
class MemberDeleteProcessor extends AbstractProcessor
{

    /**
     * @param array $values
     * @param string $insertOrUpdate
     * @return array
     */
    public function process(array $values, $insertOrUpdate = '')
    {

        // Redirect
        if ($this->shouldDelete()) {

            // Reset values.
            $values = [];
            $values['tstamp'] = time();
            $values['deleted'] = 1;
            $tableName = $this->getTemplateService()->getPersistingTable();
            $this->getDatabaseConnection()->exec_UPDATEquery($tableName, $this->getClause(), $values);

            HttpUtility::redirect($this->getUrl());
        }

        return $values;
    }

    /**
     * @return string
     */
    protected function getUrl()
    {
        $parsedURL = parse_url(GeneralUtility::getIndpEnv('HTTP_REFERER'));
        $url = $parsedURL['scheme'] . '://' . $parsedURL['host'] . '/';
        return $url;
    }

    /**
     * @return bool
     */
    protected function shouldDelete()
    {
        return (bool)GeneralUtility::_GP('delete') && $this->getIdentifierValue() && $this->recordExists();
    }

    /**
     * @return bool
     */
    protected function recordExists()
    {
        $tableName = $this->getTemplateService()->getPersistingTable();
        $record = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', $tableName, $this->getClause());
        return !empty($record);
    }

    /**
     * @return string
     */
    protected function getClause()
    {
        $tableName = $this->getTemplateService()->getPersistingTable();
        $clause = sprintf(
            '%s = "%s"',
            $this->getTemplateService()->getIdentifierField(),
            $this->getDatabaseConnection()->quoteStr($this->getIdentifierValue(), $tableName)
        );
        $clause .= $this->getPageRepository()->deleteClause($tableName);
        return $clause;
    }

    /**
     * @return string
     */
    protected function getIdentifierValue()
    {
        $identifierField = $this->getTemplateService()->getIdentifierField();
        return (string)GeneralUtility::_GP($identifierField);
    }

    /**
     * Returns a pointer to the database.
     *
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }

    /**
     * @return TemplateService
     */
    protected function getTemplateService()
    {
        return GeneralUtility::makeInstance(TemplateService::class);
    }

    /**
     * Returns an instance of the page repository.
     *
     * @return \TYPO3\CMS\Frontend\Page\PageRepository
     */
    protected function getPageRepository()
    {
        return $GLOBALS['TSFE']->sys_page;
    }

}
