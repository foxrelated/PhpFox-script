<?php
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: logout-mobile.class.php 1491 2010-03-03 15:34:04Z Raymond_Benc $
 */
class User_Component_Controller_Logout_Mobile extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		Phpfox_Module::instance()->setController('user.logout');
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('user.component_controller_logout-mobile_clean')) ? eval($sPlugin) : false);
	}
}

?>