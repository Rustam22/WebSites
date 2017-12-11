{extends file="base.tpl"}

{block name="content"}
	
	
	
	{if count($path)}
		<div class="faq-title">{toupper string=$path[count($path) - 1].title}</div>
	{/if}
	
	<div class="path-container">
		<div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
		{foreach from=$path item=p name=path_f}
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} ">&raquo;</div>
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} "><a href="{$app_url}/page/{$p.r_id}">{$p.title}</a></div>
		{/foreach}
		<div class="clear"></div>
	</div>
	
	<h2>{$page->menuItemTitle->value}</h2>
	
	<div class="page-content">
		
		<div class="gallery-container">
			{foreach from=$gallery item=g}
			<div class="gallery-item left" onclick="showImage('{$public_url}/{$g->image->value}');" />
				<img src="{$public_url}/{$g->smallImage->value}" />
			</div>
			{/foreach}
			<div class="clear"></div>
		</div>
		
	</div>
	
	<script type="html/template" id="t-image">
		
		<style>
			.message-block {
				background: none !important;
				box-shadow: none !important;
				height: 80% !important;
				width: 80% !important;
			}
			.message-content {
				width: 100% !important;
			}
			.message-block {
				width: 100% !important;
			}
			.hide-message-icon-def {
				display: none !important;
			}
		</style>
		<div class="big-image-container" onclick="hideMessage();" >
			<div class="p-relative" style="width: 690px; margin: 0 auto; " >
				<div class="hide-message-icon p-absolute">
					<img src="{$static_url}/images/close-message.png" onclick="hideMessage()" />
				</div>
				<img  style="border: 5px solid #fff;" src="<%=src%>"/>
			</div>
		</div>
		
	</script>
	
{/block}