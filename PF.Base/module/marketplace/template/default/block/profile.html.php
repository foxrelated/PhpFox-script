<?php 
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul class="block_listing">
{foreach from=$aListings name=minilistings item=aMiniListing}
	{template file='marketplace.block.mini'}
{/foreach}
</ul>