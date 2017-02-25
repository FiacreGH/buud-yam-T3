<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('speciality', 'Configuration/TypoScript', 'Speciality: main template');

# Add user TSConfig
$basePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('speciality');

# Use default pid for news
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('

	# Default pid for "tt_news" in Vidi:
	tx_vidi.dataType.tt_news.storagePid = 18
');

# Use default pid for news
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('

	# Default pid for "tt_address" in Vidi:
	tx_vidi.dataType.tt_address.storagePid = 137
');

// Default User TSConfig to be added in any case.
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
    <INCLUDE_TYPOSCRIPT: source="DIR:EXT:speciality/Configuration/UserTS">
');

// New icons for the BE
if (TYPO3_MODE === 'BE') {

    $icons = array('category', 'comment', 'storage', 'news', 'people');
    foreach ($icons as $icon) {

        \TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
            'pages',
            'contains-' . $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Backend/Icons/' . $icon . '.png');

        $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = array(
            ucfirst($icon),
            $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Backend/Icons/' . $icon . '.png'
        );
    }
}

# Use Flux Core API for registering extension provider.
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('speciality', 'Page');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('speciality', 'Content');