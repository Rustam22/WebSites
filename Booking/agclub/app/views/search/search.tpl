{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.search.title}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$messages.search.title}</span></div>
			<div class="clear"></div>
		</div>
		<br/>
		{if count($foundData)}
		{foreach from=$foundData item=n}
			<div class="news-list-item-container width100">
				<div class="news-list-item-title">
					<a class="font12 bold text-color-blue" href="{$app_url}/{$currentLang}/{$n->url->value}">{$n->recordTitle->value}</a>
				</div>
				<div class="news-list-item-description text-color-gray font12">
					{$n->content->value} <span class="text-color-blue font14">[</span><a href="{$app_url}/{$currentLang}/{$n->url->value}/{$n->recordTitle->value|urlencode}" class="news-more text-color-blue">...</a><span class="text-color-blue font14">]</span>
				</div>
			</div>
		{/foreach}
		{else}
		<p align="center" style="color: #ED1B24; margin: 0;" class="font14">{$messages.common.not_found}</p>
		{/if}
		
		{if count($paginator) > 3}
		<div class="paginator-container width100">
			<div class="paginator-content">
				{foreach from=$paginator item=p}
					{if $currentPage == $p.key}
						<div class="paginator-item left paginator-item-active bg-color-blue">
							<span class="font14" >{$p.title}</span>
						</div>
					{else}
						<div class="paginator-item left bg-color-gray-dark">
							{if isset($p.inactive)}
								<span class="font14" style="color: #000;" >{$p.title}</span>
							{else}
								<a href="{$app_url}/{$currentLang}/search/{$searchText}/page/{$p.key}" class="font14 text-color-blue" >{$p.title}</a>
							{/if}
						</div>
					{/if}
				{/foreach}
				<div class="clear"></div>
			</div>
		</div>
		{/if}
		
	</div>
{/block}