{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.sitemap.title}
{/block}

{block name="content"}
	<div class="view-page-content font16" style="width: 96%;">
		<div class="page-title font25">{$messages.sitemap.title}</div>
		
		<div class="sitemap-elements-container">
			{foreach from=$menuTreeItems item=treeItem name=siteMap}
				<div class="sitemap-element" style="margin-left: 0.5%; margin-right: 0.5%;">
					<div class="sitemap-element-root">
						<a href="{$app_url}/{$currentLang}/view-page/{$menuModelItems[$treeItem.id]->r_id->value}" class="font17">{$menuModelItems[$treeItem.id]->menuItemTitle->value}</a>
					</div>
					{if isset($treeItem.items)}
						<div class="sitemap-element-childs">
							<div class="left"  style="margin-left: 1%; margin-right: 1%;">
							{foreach from=$treeItem.items item=treeSubItem name=tChildItems}
							{if $smarty.foreach.tChildItems.index % 10 == 0 && $smarty.foreach.tChildItems.index > 0}
							</div>
							<div class="left" style="margin-left: 1%; margin-right: 1%;">
							{/if}
							<div class="sitemap-child-item">
								<a href="{$app_url}/{$currentLang}/view-page/{$menuModelItems[$treeSubItem.id]->r_id->value}" class="font13">{$menuModelItems[$treeSubItem.id]->menuItemTitle->value}</a>
							</div>
							{/foreach}
							</div>
							<div class="clear"></div>
						</div>
					{/if}
				</div>
				{if $smarty.foreach.siteMap.index % 6 == 0 && $smarty.foreach.siteMap.index != 0}<div class="clear"></div>{/if}
			{/foreach}
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
{/block}