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
 * @version 		$Id: template-menufooter.class.php 2817 2011-08-08 16:59:43Z Raymond_Benc $
 */
class Core_Component_Block_Template_Menufooter extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		$this->template()->assign([
			'aFooterMenu' => $this->template()->getMenu('footer')
		]);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('core.component_block_template-menufooter_clean')) ? eval($sPlugin) : false);
	}
}

?>