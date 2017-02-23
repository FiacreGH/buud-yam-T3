<?php
namespace Ecodev\Speciality\Grid;

/**
 * This file is part of the TYPO3 CMS project.
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * The TYPO3 project - inspiring people to share!
 */

use Fab\Media\Thumbnail\ThumbnailConfiguration;
use Fab\Media\Thumbnail\ThumbnailService;
use Fab\Vidi\Grid\ColumnRendererAbstract;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class NewsRenderer
 */
class NewsRenderer extends ColumnRendererAbstract
{

    /**
     * @return string
     */
    public function render()
    {
        /** @var ContentObjectRenderer $contentObject */
        $contentObject = GeneralUtility::makeInstance(ContentObjectRenderer::class);

        $template = '
<div class="vidi-row">
    <a href="%s" class="vidi-col vidi-col-1">
        <div class="new-date new-date-sm">
            <div class="month">%s</div>
            <div class="day">%s</div>
            <div class="year">%s</div>
        </div>
    </a>
    <div class="vidi-col vidi-col-2">
        <a href="%s" class="title">%s</a>
        <p class="desc">%s</p>
    </div>
</div>
';
        $configuration = [
            'parameter' => 140,
            'useCacheHash' => 1,
            'additionalParams' => '&news=' . $this->object->getUid(),
        ];

        $link = $contentObject->typoLink_URL($configuration);

        $output = sprintf($template,
            $link,
            $this->object['datetime'] > 0 ? date("M", $this->object['datetime']) : '',
            $this->object['datetime'] > 0 ? date("j", $this->object['datetime']) : '',
            $this->object['datetime'] > 0 ? date("Y", $this->object['datetime']) : '',
            $link,
            $this->object['title'],
            $this->object['short']
        );

        return $output;
    }

}
