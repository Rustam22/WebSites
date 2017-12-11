{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.app_form.title}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$messages.app_form.title}</span></div>
			<div class="clear"></div>
		</div>
		<br/>
		<div class="view-content-page-content text-color-blue font14">
			<div class="application-form-container width100">
				<div class="app-form-errors-container">
					{if isset($errors) && count($errors)}
						{foreach from=$errors item=e}
							<div class="app-form-error">{$messages.app_form[$e]} {$messages.common.wrong_filled}</div>
						{/foreach}
					{/if}
				</div>
				{if isset($success) && ($success)}
					<div class="app-form-success">{$messages.app_form.success}</div>
					<br/>
				{/if}
				<form action="{$app_url}/{$currentLang}/application-form/send" method="post" enctype="multipart/form-data">
					<div class="app-form-fields-container left">
						{$app_form}
						<input type="hidden" name="csrf_key" class="csrf-key" value="{$csrf_key}" />
					</div>
					<div class="app-form-text-container left font14 text-color-gray">
						{$messages.app_form.text}
					</div>
					<div class="clear"></div>
					<br/>
					<div class="form-agree-container">
						<div class="left form-agree-own"><input type="checkbox" name="agree_with_terms" /></div>
						<div class="left font14 form-agree-text"><a href="/public/terms/ATIB Nizamname.pdf" class="text-color-blue font14 a-rhover">{$messages.app_form.c1}</a>, <a href="/public/terms/Biznes etikasi ile bagli ATIB-in movqe senedi.pdf" class="text-color-blue font14 a-rhover">{$messages.app_form.c2}</a>, <a href="/public/terms/uzvluk muqavile.doc" class="text-color-blue font14 a-rhover">{$messages.app_form.c3}</a> {$messages.app_form.c_end}</div>
						<div class="clear"></div>
					</div>
					<br/>
					<div class="gray-line"></div>
					<p align="center"><input type="submit" class="std-button" value="{$messages.common.send}" /></p>
				</form>
			</div>
		</div>
		
	</div>
{/block}
{extends file="base.tpl"}