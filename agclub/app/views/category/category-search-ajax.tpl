{foreach from=$simpleObj item=o name=objects_f}
	{if $smarty.foreach.objects_f.index != 0 && $smarty.foreach.objects_f.index % 4 == 0}
		<div class="clear show-in-960"></div>
	{/if}
	{if $smarty.foreach.objects_f.index != 0 && $smarty.foreach.objects_f.index % 3 == 0}
		<div class="clear show-in-767"></div>
	{/if}
	{if $smarty.foreach.objects_f.index != 0 && $smarty.foreach.objects_f.index % 2 == 0}
		<div class="clear show-in-479"></div>
	{/if}
	<div class="element-container left relative">
		<a href="javascript:loadUrl('{$app_url}/object/{$o.r_id}');"><img src="{$static_url}/img/element-bg.png" class="width100" /></a>
		<div class="absolute element-icon">
			<div class="width100">
				<a href="javascript:loadUrl('{$app_url}/object/{$o.r_id}');"><img src="{$public_url}{$o.objLogo}" class="width100" /></a>
			</div>
		</div>
		<div class="element-title">
			<a href="javascript:loadUrl('{$app_url}/object/{$o.r_id}');" class="txt-color-dark no-decoration font20 bold">{$o.objTitle}</a>
		</div>
	</div>
{/foreach}
<div class="clear"></div>

{if isset($first)}
	<div class="show-more-point hide"></div>
	<div class="show-more" page-number="1" data-url="{$app_url}/search/object/{$search_text}/page/" {if !$enable_more}style="display: none;"{/if}><a href="javascript:showMore();" class="show-more-a" style="text-decoration: none; color: #fff;">Daha artiq göstər</a></div>
{/if}

<script>
	activateListButton();
</script>