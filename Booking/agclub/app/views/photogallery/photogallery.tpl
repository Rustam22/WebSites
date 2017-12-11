{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.common.photogallery}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$messages.common.photogallery}</span></div>
			<div class="clear"></div>
		</div>
		
		<div class="view-content-page-content text-color-blue font14">
			<br/>
			<br/>
			{foreach from=$photos item=p name=cat_f}
				{if isset($p.category)}
				<div class="accordion-title font14 text-color-yellow {if $smarty.foreach.cat_f.first}accordion-title-active{/if}">{$p.category.date|date_format:"%d/%m/%Y"}  {$p.category.title}</div>
				<div class="accordion-content {if !$smarty.foreach.cat_f.first}hide{/if}">
					{foreach from=$p.items item=ph}
						<div class="photo-item left ov-hidden">
							<a href="{$public_url}/{$ph.smallImage}" rel="photo_group">
								<img src="{$public_url}/{$ph.image}" />
							</a>
						</div>
					{/foreach}
					<div class="clear"></div>
				</div>
				{/if}
			{/foreach}
		</div>
		
	</div>
{/block}