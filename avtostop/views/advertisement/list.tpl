{extends file="base.tpl"}

{block name="content"}
	
	<div class="faq-title">ELANLAR</div>
	
	<div class="path-container">
		<div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
		<div class="clear"></div>
	</div>
	
	<div class="page-content">
		
		{foreach from=$data item=d}
			
			<div class="advice-item">
				<div class="advice-item-date">{$d.date|date_format:"%d. %m. %Y"}</div>
				<div class="advice-item-title">{$d.itemTitle}</div>
				<div class="advice-description">{$d.content}</div>
				<div class="advice-description" style=" margin-top: 10px;">
					<div class="item-phone-icon left" style="margin-right: 10px;">
						<div class="red-phone-icon-sprite sprite"></div>
					</div>
					<div class="left">{$d.phone}</div>
					<div class="clear"></div>
				</div>
			</div>
			
		{/foreach}
		
		{if ($pages > 1)}
		<div class="advice-paginator-container">
			<div class="advice-paginator-item"><a href="{$app_url}/advertisements/{$category}/page/{$to_left}">&laquo;</a></div>
			
			{section name=adv_pag loop=$pages }
				{if ($curPage == $smarty.section.adv_pag.index)}
				<div class="advice-paginator-item"><span>{$smarty.section.adv_pag.index + 1}</span></div>
				{else}
				<div class="advice-paginator-item"><a href="{$app_url}/advertisements/{$category}/page/{$smarty.section.adv_pag.index}">{$smarty.section.adv_pag.index + 1}</a></div>
				{/if}
			{/section}
			
			<div class="advice-paginator-item"><a href="{$app_url}/advertisements/{$category}/page/{$to_right}">&raquo;</a></div>
		</div>
		{/if}
		
	</div>
	
{/block}