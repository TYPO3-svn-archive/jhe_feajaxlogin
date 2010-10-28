<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$TYPO3_CONF_VARS['FE']['eID_include']['jhefeajaxlogin'] = 'EXT:jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_eID.php';

t3lib_extMgm::addService($_EXTKEY, 'auth',  'tx_jhefeajaxlogin_sv1',
    array(
        'title' => 'authUser',
        'description' => '',

        'subtype' => '',

        'available' => TRUE,
        'priority' => 50,
        'quality' => 50,

        'os' => '',
        'exec' => '',

        'classFile' => t3lib_extMgm::extPath($_EXTKEY).'sv1/class.tx_jhefeajaxlogin_sv1.php',
        'className' => 'tx_jhefeajaxlogin_sv1',
    )
);

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_jhefeajaxlogin_pi1.php', '_pi1', 'list_type', 1);
?>