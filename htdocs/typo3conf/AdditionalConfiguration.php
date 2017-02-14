<?php
// Include global configuration.
require_once (PATH_site . '../configuration/Settings.php');
require_once (PATH_site . 'typo3conf/ext/speciality_ecodev/Configuration/PHP/Typo3ConfVars.php');

# Frontend Settings
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '/404/';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageUnavailable_handling'] = '/503/';
