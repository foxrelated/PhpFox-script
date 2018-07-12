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
 * @version 		$Id: tag.class.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
class Forum_Component_Controller_Tag extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		Phpfox::getUserParam('forum.can_view_forum', true);
		
		if ($this->request()->get('module'))
		{
			if ($this->request()->get('req5'))
			{			
				return Phpfox_Module::instance()->setController('forum.forum');
			}
		}
		
		if ($sTag = $this->request()->get('req3'))
		{			
			return Phpfox_Module::instance()->setController('forum.forum');
		}
		
		$this->template()->setTitle(Phpfox::getPhrase('forum.forum_tags'))
			->setBreadcrumb(Phpfox::getPhrase('forum.forum'), $this->url()->makeUrl('forum'))
			->setBreadcrumb(Phpfox::getPhrase('forum.tags'), $this->url()->makeUrl('forum.tag'), true);
		
		$this->setParam('iTagDisplayLimit', Phpfox::getParam('forum.total_forum_tags_display'));
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('forum.component_controller_tag_clean')) ? eval($sPlugin) : false);
	}
}

?>