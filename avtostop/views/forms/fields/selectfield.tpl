<div class="afc-field-container select-field">
	<div class="afc-field-label">{$title}: {if $required == 1}<span class="field-required">*</span>{/if}</div>
	<div class="afc-field-input afc-field-own">
		<div id="select-{$id}" class="select-container p-relative" {if isset($value)}sel-val="{$value}"{/if} >
			<div class="selected-option p-relative c-pointer">
				<div class="selected-option-html"></div>
				<div class="select-icon select-options-icon p-absolute sprite"></div>
			</div>
			<div class="options-container hide p-absolute">	
				<div class="options-content p-relative">
				{foreach from=$options item=v key=k}
					<div class="option-item c-pointer" opt-val="{$k}">{$v}</div>
				{/foreach}
				</div>
			</div>
			<input type="hidden" name="{$name}" class="select-input" {if isset($value)}value="{$value}"{/if} />
		</div>
	</div>
</div>
<script>
	new SelectController('select-{$id}');
</script>