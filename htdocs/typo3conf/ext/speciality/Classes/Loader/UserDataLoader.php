<?php
namespace Fab\Speciality\Loader;

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

use Fab\Formule\Loader\AbstractLoader;
use Fab\Formule\Service\FlashMessageQueue;
use Fab\Formule\Service\TemplateService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class UserDataLoader
 */
class UserDataLoader extends AbstractLoader
{

    /**
     * @param array $values
     * @return array
     */
    public function load(array $values)
    {

        $identifierField = $this->getTemplateService()->getIdentifierField();
        $token = GeneralUtility::_GP($identifierField);

        if ($token) {

            if ($this->shouldActivateUser()) {
                $this->activateUser();
                $label = 'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:newsletter.email.confirmed';
                $this->getFlashMessageQueue()->success($label);
            }

            $tableName = $this->getTemplateService()->getPersistingTableName();

            // build clause
            $clause = sprintf('token = "%s"',  $this->getDatabaseConnection()->quoteStr($token, $tableName));
            $clause .= $this->getPageRepository()->enableFields($tableName);
            $clause .= $this->getPageRepository()->deleteClause($tableName);

            $record = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', $tableName, $clause);

            if (!empty($record)) {

                $fields = $this->getTemplateService()->getFields();

                // is mapping necessary here?
                foreach ($fields as $field) {
                    if (isset($record[$field])) {
                        $values[$field] = $record[$field];
                    }
                }

                $values['uid'] = $record['uid'];
            }

        }

        return $values;
    }

    /**
     * @return bool
     */
    protected function shouldActivateUser()
    {
        $tableName = $this->getTemplateService()->getPersistingTableName();

        // build clause
        $token = GeneralUtility::_GP('token');
        $clause = sprintf('token = "%s" AND hidden = 1 AND is_email_verified = 0',  $this->getDatabaseConnection()->quoteStr($token, $tableName));

        $record = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', $tableName, $clause);

        return !empty($record);
    }

    /**
     * @return void
     */
    protected function activateUser()
    {
        $tableName = $this->getTemplateService()->getPersistingTableName();

        // build clause
        $token = GeneralUtility::_GP('token');
        $clause = sprintf('token = "%s"',  $this->getDatabaseConnection()->quoteStr($token, $tableName));

        $values = [
            'hidden' => 0,
            'is_email_verified' => 1,
         ];

        $this->getDatabaseConnection()->exec_UPDATEquery($tableName, $clause, $values);
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

    /**
     * @return TemplateService
     */
    protected function getTemplateService()
    {
        return GeneralUtility::makeInstance(TemplateService::class);
    }

    /**
     * @return FlashMessageQueue
     */
    protected function getFlashMessageQueue()
    {
        return GeneralUtility::makeInstance(FlashMessageQueue::class);
    }

}
