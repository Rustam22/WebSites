{extends file="base.tpl"}

{block name="content"}
	
	
	{if count($path)}
		<div class="faq-title print">{toupper string=$path[count($path) - 1].title}</div>
	{/if}
	
	<div class="path-container">
		<div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
		{foreach from=$path item=p name=path_f}
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} ">&raquo;</div>
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} "><a href="{$app_url}/page/{$p.r_id}">{$p.title}</a></div>
		{/foreach}
		<div class="clear"></div>
	</div>
	
	<h2 class="print">{$page->menuItemTitle->value}</h2>
	
	<div class="page-content print">
		{$page->content->value}
	</div>
	<a href="javascript:window.print();" class="print-page">çap et</a>
	{literal}
	<br/>
	
	<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_google_plusone_share"></a>
<a class="addthis_button_odnoklassniki_ru"></a>
<a class="addthis_button_linkedin"></a>
<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52ea4000578c2613"></script>
<!-- AddThis Button END -->
	{/literal}
	
{/block}