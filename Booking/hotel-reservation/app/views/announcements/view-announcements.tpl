{extends file="base.tpl"}

{block name="page-title"}
	:: {$news->itemTitle->value}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$news->itemTitle->value}</span></div>
			<div class="clear"></div>
		</div>
		<br/>
		<div class="news-list-item-date italic font14 text-color-yellow">{$news->dateStart->value|date_format:"%d/%m/%Y"} - {$news->dateEnd->value|date_format:"%d/%m/%Y"}</div>
		<!--<div class="view-content-page-title text-color-yellow font16">{$news->itemTitle->value}</div>-->
		<div class="view-content-page-content text-color-blue font14">{$news->content->value}</div>
		
	</div>
{/block}