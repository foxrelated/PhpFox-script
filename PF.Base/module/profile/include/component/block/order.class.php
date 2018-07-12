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
 * @version 		$Id: order.class.php 852 2009-08-10 18:05:32Z Raymond_Benc $
 */
class Profile_Component_Block_Order extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		$aUser = $this->getParam('aUser');	

		Phpfox_Module::instance()->getCachedBlocks($aUser['user_id'], $this->getParam('type'));
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('profile.component_block_order_clean')) ? eval($sPlugin) : false);
	}
}

?>