{extends file="base.tpl"}

{block name="page-title"}
	:: {$page->menuItemTitle->value}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$page->menuItemTitle->value}</span></div>
			<div class="clear"></div>
		</div>
		
		<br/>
		{if count($path) > 1}
		<div class="path-container">
			{foreach from=$path item=p name=path_f}
			{if !$smarty.foreach.path_f.last}
			<div class="path-item left"><a href="{$p.url}" class="font14">{$p.menuItemTitle}</a></div>
			<div class="path-item left"><img src="{$static_url}/img/path-arrow.jpg" /></div>
			{else}
			<div class="path-item left"><span class="font14" style="color: #999999;">{$p.menuItemTitle}</span></div>
			{/if}
			{/foreach}
			<div class="clear"></div>
		</div>
		{/if}
		
		<div class="view-content-page-content text-color-blue font14">{$page->content->value}</div>
		
		<div class="content-files-container">
			{foreach from=$files item=f}
				<div class="left">
					<a href="{$public_url}/{$f->file->value}" style="text-decoration: none;">
					<div class="page-file-item">
						<div class="file-title">
							<span>{$f->iTitle->value}</span>
						</div>
						<div class="file-content">
							<div class="file-date">
								<div class="file-date-left left"></div>
								<div class="file-date-own right">{$f->date->value|date_format:"%d/%m/%Y"}</div>
								<div class="clear"></div>
							</div>
							<div class="file-size right">
								{$f->size} MB
							</div>
							<div class="clear"></div>
							<div class="file-icon">
								<img src="{$static_url}/img/file-icons/filetype-icons-{$f->fType}.png" />
							</div>
						</div>
						<div class="file-bottom"></div>
					</div>
					</a>
				</div>
			{/foreach}
			<div class="clear"></div>
		</div>
		
	</div>
{/block}