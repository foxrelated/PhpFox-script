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
 * @version 		$Id: index.class.php 1458 2010-01-29 19:28:49Z Raymond_Benc $
 */
class Facebook_Component_Controller_Index extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{

	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('facebook.component_controller_index_clean')) ? eval($sPlugin) : false);
	}
}

?>