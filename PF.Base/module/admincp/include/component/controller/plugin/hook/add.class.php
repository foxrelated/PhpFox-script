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
 * @package  		Module_Admincp
 * @version 		$Id: add.class.php 1931 2010-10-25 11:58:06Z Raymond_Benc $
 */
class Admincp_Component_Controller_Plugin_Hook_Add extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		if (Phpfox::getParam('core.phpfox_is_hosted'))
		{
			$this->url()->send('admincp');
		}		
		
		$bIsEdit = false;
		$aValidation = array(
			'product_id' => Phpfox::getPhrase('admincp.select_product'),
			'hook_type' => Phpfox::getPhrase('admincp.select_what_type_of_a_hook_this_is')
		);		
		
		$oValid = Phpfox_Validator::instance()->set(array('sFormName' => 'js_form', 'aParams' => $aValidation));
		
		if ($aVals = $this->request()->getArray('val'))
		{
			if (Phpfox::getService('admincp.plugin.process')->addHook($aVals))
			{
				$this->url()->send('admincp.plugin.hook.add', null, Phpfox::getPhrase('admincp.hook_successfully_added'));
			}
		}
		
		$this->template()->setTitle(Phpfox::getPhrase('admincp.add_hook'))
			->setBreadCrumb(Phpfox::getPhrase('admincp.add_hook'))
			->assign(array(
				'aProducts' => Admincp_Service_Product_Product::instance()->get(),
				'aModules' => Phpfox::getService('admincp.module')->getModules(),
				'sCreateJs' => $oValid->createJS(),
				'sGetJsForm' => $oValid->getJsForm(),
				'bIsEdit' => $bIsEdit,
				'aHookTypes' => array(
					'library',
					'service',
					'component',
					'template'
				)
			)
		);
	}
}	

?>