<?php
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: profile.class.php 2592 2011-05-05 18:51:50Z Raymond_Benc $
 */
class Music_Component_Controller_Profile extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		$this->setParam('bIsProfile', true);
		
		Phpfox::getComponent('music.index', array('bNoTemplate' => true), 'controller');
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('music.component_controller_profile_clean')) ? eval($sPlugin) : false);
	}
}

?>