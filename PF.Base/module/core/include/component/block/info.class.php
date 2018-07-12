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
 * @version 		$Id: info.class.php 1339 2009-12-19 00:37:55Z Raymond_Benc $
 */
class Core_Component_Block_Info extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		$aUser = Phpfox::getService('user')->get(Phpfox::getUserId(), true);
		$aGroup = Phpfox::getService('user.group')->getGroup($aUser['user_group_id']);
		$aInfo = array(
			Phpfox::getPhrase('core.membership') => (empty($aGroup['icon_ext']) ? '' : '<img src="' . Phpfox::getParam('core.url_icon') . $aGroup['icon_ext'] . '" class="v_middle" alt="' . Phpfox_Locale::instance()->convert($aGroup['title']) . '" title="' . Phpfox_Locale::instance()->convert($aGroup['title']) . '" /> ') . $aGroup['prefix'] . Phpfox_Locale::instance()->convert($aGroup['title']) . $aGroup['suffix'],
			Phpfox::getPhrase('core.activity_points') => $aUser['activity_points'],
			Phpfox::getPhrase('core.profile_views') => $aUser['total_view'],
			Phpfox::getPhrase('core.space_used') => (Phpfox::getUserParam('user.total_upload_space') === 0 ? Phpfox::getPhrase('user.space_total_out_of_unlimited', array('space_total' => Phpfox_File::instance()->filesize($aUser['space_total']))) : Phpfox::getPhrase('user.space_total_out_of_total', array('space_total' => Phpfox_File::instance()->filesize($aUser['space_total']), 'total' => Phpfox::getUserParam('user.total_upload_space')))),
			Phpfox::getPhrase('core.member_since') => Phpfox::getLib('date')->convertTime($aUser['joined'], 'core.profile_time_stamps')
		);
		
		if (Phpfox::isModule('rss'))
		{
			$aInfo[Phpfox::getPhrase('rss.rss_subscribers')] = '<a href="#" onclick="tb_show(\'' . Phpfox::getPhrase('rss.rss_subscribers_log') . '\', $.ajaxBox(\'rss.log\', \'height=500&amp;width=500\')); return false;">' . $aUser['rss_count'] . '</a>';
		}
		
		$this->template()->assign(array(
				'aInfos' => $aInfo
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('core.component_block_info_clean')) ? eval($sPlugin) : false);
	}
}

?>