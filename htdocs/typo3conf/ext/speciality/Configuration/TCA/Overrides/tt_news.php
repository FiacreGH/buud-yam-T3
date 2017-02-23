<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');
//update the extension plugin form in the backend

/******* tt_news *******/

$TCA['tt_news']['columns']['datetime']['label'] = 'Date de début (événement / publication):';
$TCA['tt_news']['columns']['datetime']['config']['default'] = '';

$TCA['tt_news']['columns']['highlight'] = [
    'l10n_mode' => '',
    'exclude' => 1,
    'label' => 'Highlight ET:',
    'config' => [
        'type' => 'check',
        'default' => ''
    ]
];

$tca = [
    'grid_frontend' => [
        'columns' => [
            '__news_renderer' => [
                'renderers' => [
                    \Ecodev\Speciality\Grid\NewsRenderer::class,
                ],
                'sorting' => FALSE,
                'sortable' => FALSE,
                'label' => 'News',
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_news'], $tca);