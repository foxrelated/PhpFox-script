<?php 
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: search.html.php 5574 2013-03-27 13:02:04Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !$bSearch}
<script type="text/javascript">
	var sPrivacyInputName = '{$sPrivacyInputName}';
	var sSearchByValue = '';
{literal}
	$Behavior.searchFriendBlock = function()
	{
		sSearchByValue = $('.js_is_enter').val();		
		
		if ($.browser.mozilla) 
		{
			$('.js_is_enter').keypress(checkForEnter);
		} 
		else 
		{
			$('.js_is_enter').keydown(checkForEnter);
		}		
	};

	$Behavior.friend_block_search_init = function()
	{		
		updateCheckBoxes();
	};
		function updateFriendsList()
		{		
			updateCheckBoxes();
		}
		
		function removeFromSelectList(sId)
		{
			$('.js_cached_friend_id_' + sId + '').remove();
			$('#js_friends_checkbox_' + sId).attr('checked', false);
			$('#js_friend_input_' + sId).remove();
			$('.js_cached_friend_id_' + sId).remove(); return false;		
			
			return false;
		}
		
		function addFriendToSelectList(oObject, sId, bForce)
		{	
			if (oObject.checked || bForce)
			{
				iCnt = 0;
				$('.js_cached_friend_name').each(function()
				{			
					iCnt++;
				});			

				if (function_exists('plugin_addFriendToSelectList'))
				{
					plugin_addFriendToSelectList(sId);
				}
				{/literal}
				$('#js_selected_friends').append('<div class="js_cached_friend_name row1 js_cached_friend_id_' + sId + '' + (iCnt ? '' : ' row_first') + '"><span style="display:none;">' + sId + '</span><input type="hidden" name="val[' + sPrivacyInputName + '][]" value="' + sId + '" /><a href="#" onclick="return removeFromSelectList(' + sId + ');">{img theme='misc/delete.gif' class="delete_hover v_middle"}</a> ' + $('#js_friend_' + sId + '').html() + '</div>');			
				{literal}
			}
			else
			{
				if (function_exists('plugin_removeFriendToSelectList'))
				{
					plugin_removeFriendToSelectList(sId);
				}			
				
				$('.js_cached_friend_id_' + sId).remove();
				$('#js_friend_input_' + sId).remove();
			}
		}
		
		function cancelFriendSelection()
		{
			if (function_exists('plugin_cancelFriendSelection'))
			{
				plugin_cancelFriendSelection();
			}			
			
			$('#js_selected_friends').html('');	
			$Core.loadInit(); 
			tb_remove();
		}
		
		function updateCheckBoxes()
		{
			iCnt = 0;
			$('.js_cached_friend_name').each(function()
			{			
				iCnt++;
				$('#js_friends_checkbox_' + $(this).find('span').html()).attr('checked', true);
			});
			
			$('#js_selected_count').html((iCnt / 2));
		}
		
		function showLoader()
		{
			$('#js_friend_search_content').html($.ajaxProcess(oTranslations['friend.loading'], 'large'));
		}	
		
		function checkForEnter(event)
		{
			if (event.keyCode == 13) 
			{
				showLoader(); 
				
				$.ajaxCall('friend.searchAjax', 'find=' + $('#js_find_friend').val() + '&amp;input=' + sPrivacyInputName + '');
			
				return false;	
			}
		}
		
		
{/literal}
</script>
<div id="js_friend_loader_info"></div>
<div id="js_friend_loader">
{if $sFriendType != 'mail'}
	<form method="post" onsubmit="showLoader(); $.ajaxCall('friend.searchAjax', 'friend_module_id={$sFriendModuleId}&amp;friend_item_id={$sFriendItemId}&amp;find=' + $('#js_find_friend').val() + '&amp;input={$sPrivacyInputName}'); return false;">
		<input type="text" class="js_is_enter v_middle default_value" name="find" placeholder="{phrase var='friend.search_by_email_full_name_or_user_name'}" onfocus="if (this.value == sSearchByValue){literal}{{/literal}this.value = ''; $(this).removeClass('default_value');{literal}}{/literal}" onblur="if (this.value == ''){literal}{{/literal}this.value = sSearchByValue; $(this).addClass('default_value');{literal}}{/literal}" id="js_find_friend" autocomplete="off" size="30" />
	</form>
{else}	
	<input type="text" class="js_is_enter v_middle default_value" name="find" value="{phrase var='friend.search_by_email_full_name_or_user_name'}" onfocus="if (this.value == sSearchByValue){literal}{{/literal}this.value = ''; $(this).removeClass('default_value');{literal}}{/literal}" onblur="if (this.value == ''){literal}{{/literal}this.value = sSearchByValue; $(this).addClass('default_value');{literal}}{/literal}" id="js_find_friend" autocomplete="off" size="30" />
	<input type="button" value="{phrase var='friend.find'}" onclick="showLoader(); $.ajaxCall('friend.searchAjax', 'friend_module_id={$sFriendModuleId}&amp;friend_item_id={$sFriendItemId}&amp;find=' + $('#js_find_friend').val() + '&amp;input={$sPrivacyInputName}&amp;type={$sFriendType}'); return false;" class="button v_middle" />
{/if}
{/if}
	<div id="js_friend_search_content">
		<div class="label_flow" style="height:200px;">
			{foreach from=$aFriends name=friend item=aFriend}
			<div class="friend_search_holder {if isset($aFriend.is_active)} friend_search_holder_active{/if}"{if !isset($aFriend.is_active)} onclick="if ($('#js_friends_checkbox_{$aFriend.user_id}').attr('checked') == 'checked') {l} $('#js_friends_checkbox_{$aFriend.user_id}').attr('checked', false); $(this).removeClass('friend_search_active'); {r} else {l} $('#js_friends_checkbox_{$aFriend.user_id}').attr('checked', 'checked'); $(this).addClass('friend_search_active'); {r} {if isset($aFriend.canMessageUser) && $aFriend.canMessageUser == false} {else} addFriendToSelectList($('#js_friends_checkbox_{$aFriend.user_id}'), '{$aFriend.user_id}', ($('#js_friends_checkbox_{$aFriend.user_id}').attr('checked') == 'checked' ? true : false));{/if}"{/if}>
				<span style="display:none;"><input type="checkbox" class="checkbox" name="friend[]" class="js_friends_checkbox" id="js_friends_checkbox_{$aFriend.user_id}" value="{$aFriend.user_id}" {if (isset($aFriend.canMessageUser) && $aFriend.canMessageUser == false) || isset($aFriend.is_active)}DISABLED {else} onclick="addFriendToSelectList(this, '{$aFriend.user_id}');"{/if} style="vertical-align:middle;" /></span>

				{img user=$aFriend suffix='_50_square' max_width=30 max_height=30 no_link=true style="vertical-align:middle;"}
			
				<span id="js_friend_{$aFriend.user_id}" style="padding-left:5px;">{$aFriend.full_name|clean}{if isset($aFriend.is_active)} <em>({$aFriend.is_active})</em>{/if}{if isset($aFriend.canMessageUser) && $aFriend.canMessageUser == false} {phrase var='friend.cannot_select_this_user'}{/if}</span>				
			</div>
			{foreachelse}
			<div class="extra_info">
			{if $sFriendType == 'mail'}
				{phrase var='user.sorry_no_members_found'}
			{else}
				{phrase var='friend.sorry_no_friends_were_found'}
			{/if}
			</div>		
			{/foreach}
		</div>
	</div>
{if !$bSearch}
	{if $bIsForShare}
	
	{else}
	{if $sPrivacyInputName != 'invite'}
	<div class="main_break t_right">		
		<input type="button" name="submit" value="{phrase var='friend.use_selected'}" onclick="{literal}if (function_exists('plugin_selectSearchFriends')) { plugin_selectSearchFriends(); } else { $Core.loadInit(); tb_remove(); }{/literal}" class="button" />&nbsp;<input type="button" name="cancel" value="{phrase var='friend.cancel'}" onclick="{literal}if (function_exists('plugin_cancelSearchFriends')) { plugin_cancelSearchFriends(); } else { cancelFriendSelection(); }{/literal}" class="button" />		
	</div>
	{/if}
	{/if}
</div>
{/if}