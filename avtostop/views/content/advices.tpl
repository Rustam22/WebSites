{extends file="base.tpl"}

{block name="content"}
	
	<div class="faq-title">MƏSLƏHƏTLƏR</div>
	
	<div class="path-container">
		<div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
		{foreach from=$path item=p name=path_f}
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} ">&raquo;</div>
			<div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} "><a href="{$app_url}/page/{$p.r_id}">{$p.title}</a></div>
		{/foreach}
		<div class="clear"></div>
	</div>
	
	<div class="page-content">
		
		{foreach from=$advices item=a}
			
			<div class="advice-item">
				<div class="advice-item-date">{$a.date}</div>
				<div class="advice-item-title"><a href="{$app_url}/advice/{$a.r_id}">{$a.itemTitle}</a></div>
				<div class="advice-description">{$a.description}</div>
			</div>
			
		{/foreach}
		
		{if ($pages > 1)}
		<div class="advice-paginator-container">
			<div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$to_left}">&laquo;</a></div>
			
			{section name=adv_pag loop=$pages }
				<div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$smarty.section.adv_pag.index}">{$smarty.section.adv_pag.index + 1}</a></div>
			{/section}
			
			<div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$to_right}">&raquo;</a></div>
		</div>
		{/if}
		
	</div>
	
{/block}