<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */
if (!defined ('PATH_typo3conf')) die ('Could not access this script directly!');
header('Content-Type: text/html; charset=utf-8');

$feUserObj = tslib_eidtools::initFeUser(); // Initialize FE user object
tslib_eidtools::connectDB(); //Connect to database


class tx_jhefeajaxlogin_eID {

    function main() {

#        require_once(PATH_tslib.'class.tslib_pibase.php');
 #       require_once(PATH_tslib.'class.tslib_eidtools.php');
  #      require_once(PATH_t3lib.'class.t3lib_div.php');

        require_once('typo3conf/ext/jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_pi1.php');
        $obj = t3lib_div::makeInstance("tx_jhefeajaxlogin_pi1");




      
        #echo json_encode($response);
    }
}
    //XCLASS-Declaration
    if(defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_eID.php']) {
        include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_eID.php']);
    }

    //Make Instance
    $SOBE = t3lib_div::makeInstance('tx_jhefeajaxlogin_eID');
    $SOBE->main();

?>