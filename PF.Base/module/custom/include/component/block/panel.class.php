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
 * @version 		$Id: panel.class.php 477 2009-05-03 10:37:09Z Raymond_Benc $
 */
class Custom_Component_Block_Panel extends Phpfox_Component
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
		(($sPlugin = Phpfox_Plugin::get('custom.component_block_panel_clean')) ? eval($sPlugin) : false);
	}
}

?>