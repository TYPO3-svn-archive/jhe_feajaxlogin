<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addService($_EXTKEY, '',  'tx_jhefeajaxlogin_sv1',
	array(
		'title' => 'Authentification',
		'description' => 'Authenticates against something different from TYPOs database!!!',

		'subtype' => 'authUserFE,getUserFE',

		'available' => TRUE,
		'priority' => 50,
		'quality' => 50,

		'os' => '',
		'exec' => '',

		'classFile' => t3lib_extMgm::extPath($_EXTKEY).'sv1/class.tx_jhefeajaxlogin_sv1.php',
		'className' => 'tx_jhefeajaxlogin_sv1',
	)
);
?>