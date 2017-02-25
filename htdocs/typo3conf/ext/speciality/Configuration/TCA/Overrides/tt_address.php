<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

$tca = [
    'columns' => [
        'token' => [
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:token',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
        ],
        'is_email_verified' => [
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:is_email_verified',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'is_newsletter_active' => [
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:is_newsletter_active',
            'config' => [
                'type' => 'check',
                'default' => '1',
            ],
        ],
        'image' => [
            'config' => [
                'type' => 'select',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999,
                'autoSizeMax' => 30,
                'multiple' => 0,
                'foreign_table' => 'tt_address',
                'MM' => 'CHANGE_ME',
                'MM_opposite_field' => 'image',
            ],
        ],

    ]
];


if (!empty($GLOBALS['TCA']['image'])) {
    return \TYPO3\CMS\Core\Utility\GeneralUtility::array_merge_recursive_overrule($GLOBALS['TCA']['image'], $tca);
}

// Add new fields to the TCA.
$fieldList = '--div--;LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:tab.newsletter,
              token, is_email_verified, is_newsletter_active';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', $fieldList);

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['tt_address'], $tca);