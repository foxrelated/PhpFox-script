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
 * @package  		Module_Friend
 * @version 		$Id: edit.class.php 225 2009-02-13 13:24:59Z Raymond_Benc $
 */
class Friend_Component_Block_List_Edit extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{		
		$this->template()->assign(array(
				'aLists' => Phpfox::getService('friend.list')->get()
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('friend.component_block_list_edit_clean')) ? eval($sPlugin) : false);
	}
}

?>