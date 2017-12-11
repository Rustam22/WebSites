<div class="afc-field-container radio-field">
	<div class="afc-field-label">{$title}: {if $required == 1}<span class="field-required">*</span>{/if}</div>
	<div class="afc-field-input afc-field-own">
		<div class="check-button-container" id="check-{$id}" data-name="{$name}[]" >
			{foreach from=$options item=v key=k}
				<div class="afc-check-container check-button-item-container" data-value="{$k}" >
					<div class="div left check-button-own">
						<div class="sprite check-sprite {if (isset($value) && (in_array($k, $value)))}check-checked-sprite{/if}" data-checked="{if (isset($value) && (in_array($k, $value)))}1{else}0{/if}">
							{if (isset($value) && (count($value)) && (in_array($k, $value)))}
								<input type="hidden" value="{$k}" name="{$name}[]">
							{/if}
						</div>
					</div>
					<div class="left check-button-title">
						<span>{$v}</span>
					</div>
					<div class="clear"></div>
				</div>
			{/foreach}
		</div>
	</div>
</div>
<script>
	new CheckController('#check-{$id}');
</script>