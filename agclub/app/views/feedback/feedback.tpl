{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.feedback.title}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$messages.feedback.title}</span></div>
			<div class="clear"></div>
		</div>
		
		<div class="view-content-page-content text-color-blue font14">
			<div class="feedback-container left">
				<form action="{$app_url}/{$currentLang}/feedback/add" method="post">
				<div class="feedback-error-container">
					{if isset($errors)}
						{foreach from=$errors item=e}
							<span class="text-color-red font14">{$messages.common[$e]} - {$messages.common.wrong_filled}</span><br/>
						{/foreach}
					{/if}
				</div>
				<div class="feedback-success-container">
					<br/>
					{if isset($added)}
						<span class="text-color-blue font14">{$messages.feedback.success}</span>
					{/if}
					<br/>
				</div>
				{$f_form}
				<p align="center"><input type="submit" name="f_submit" value="{$messages.common.send}" class="submit-button std-button" /></p>
				</form>
			</div>
			<div class="left feedback-left text-color-gray">
				{$messages.common.feedback_text}
			</div>
			<div class="clear"></div>
			<input type="hidden" name="csrf_key" class="csrf-key" value="{$csrf_key}" />
		
		</div>
		
	</div>
{/block}