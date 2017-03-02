<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

return [
    'ctrl' => [
        'title' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:members',
        'label' => 'last_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'default_sortby' => 'ORDER BY uid ASC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Images/tx_speciality_member.png',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,last_name,first_name,gender,country,town,phone,natel,email,organ,rue_address,ocupation,member'
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0'
            ]
        ],
        'last_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:last_name',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'first_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:first_name',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'gender' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:gender',
            'config' => [
                'type' => 'radio',
                'items' => [
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:gender_m', 0
                    ],
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:gender_f', 1
                    ]
                ]
            ]
        ],
        'country' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:country',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'town' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:town',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'phone' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:phone',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'natel' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:natel',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:email',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'organ' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:organ',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'rue_address' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:rue_address',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'ocupation' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:ocupation',
            'config' => [
                'type' => 'input',
                'size' => '48',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'member' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:speciality/Resources/Private/Language/tx_speciality_member.xlf:member',
            'config' => [
                'type' => 'radio',
                'items' => [
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:option0', 0
                    ],
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:option1', 1
                    ],
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:option2', 2
                    ],
                    [
                        'LLL:EXT:speciality/Resources/Private/Language/locallang.xlf:option3', 3
                    ],
                ]
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'hidden,last_name,first_name,gender,country,town,phone,natel,email,organ,rue_address,ocupation,member']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ],
];