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

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Frontend AJAX Login w/ jQuery' for the 'jhe_feajaxlogin' extension.
 *
 * @author	Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>
 * @package	TYPO3
 * @subpackage	tx_jhefeajaxlogin
 */
class tx_jhefeajaxlogin_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_jhefeajaxlogin_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_jhefeajaxlogin_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'jhe_feajaxlogin';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

                //integration of an main css file for styling the html output
                $css = '<link rel="stylesheet" type="text/css" href="' . t3lib_extMgm::siteRelPath($this->extKey) . 'res/css/main.css" />';
                $GLOBALS['TSFE']->additionalHeaderData[$this->extKey . '_css'] = $css;

                $GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = '
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                        // AJAX Request per eID
                            $("#login_submit").bind("click", function() {
                            $("#ajax-loader-login").show();
                            $.ajax({
                                url: "?eID=jhefeajaxlogin",
                                data:
                                    "logintype=login&pid=2247&user=jhernst&pass=cyberelk",
                                success: function(result) {
                                    $("#ajax-loader-login").hide();
                                    alert(result);
                                    }
                                });
                            });
                        });
                    </script>
	';

                #if($this->userIsLoggedIn && !$this->logintype) {
                #    $content .= $this->showLogout();
		#} else {
                #    $content .= $this->showLogin();
		#}

		$content='
                        <form class="loginform" method="get" enctype="multipart/form-data" action="'.$this->pi_getPageLink($GLOBALS['TSFE']->id).'">
                            <input type="hidden" value="login" name="logintype">
                            <input type="hidden" value="2247" name="pid">
                            <input type="text" class="username" id="user" onblur="if(this.value==\'\') this.value=\'Nutzername\';" onfocus="if(this.value==\'Nutzername\') this.value=\'\';" value="Nutzername" size="20" name="user">
                            <input type="password" class="password" id="pass" onblur="if(this.value==\'\') this.value=\'Passwort\';" onfocus="if(this.value==\'Passwort\') this.value=\'\';" value="Passwort" size="20" name="pass">
                            <img height="24" width="24" alt="" src="fileadmin/templates/img/ajax-loader.gif" id="ajax-loader-login">
                            <input type="button" id="login_submit" value="Anmelden" name="submit">
                        </form>

		';
	
		return $this->pi_wrapInBaseClass($content);
	}

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_feajaxlogin/pi1/class.tx_jhefeajaxlogin_pi1.php']);
}

?>