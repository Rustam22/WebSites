<div class="field-container filefield-div  {if isset($htmlCss.class)}{$htmlCss.class}{/if}">	<div class="left field-title">		{$title} {if isset($lang) && !empty($lang)}[{$lang}]{/if}	</div>	<div class="right">		{if isset($forContent)}			<input type="hidden" name="fieldLang[{$randId}][]" value="{$lang}" />			<input type="hidden" name="fieldId[{$randId}][]" value="{$id}" />			<input type="hidden" name="fieldType[{$randId}][]" value="{$type}" />		{/if}		<div class="file-field-data">			<div class="selected-file-container">				<!--<div class="selected-file-label">{$messages.fields_image_field.exist_image}</div>-->				<div class="selected-file">					{if $value}					<a href="{$public_url}/{$value}" target="_blank">						{$messages.fields_image_field.exist_image}						<!--<img src="{$app_url}/imageresizer/resize/50/50/{$public_folder}/{$value}" />-->					</a>					{/if}				</div>				<div class="show-file-manager-container">					<a href="javascript:void(0)" class="show-file-manager" id="show-image-field-container-{$elementId}" >{$messages.fields_image_field.select_image}</a>				</div>				<div class="clear"></div>			</div>		</div>		<div class="image-field-block-ui-container hide" id="image-field-block-ui-{$elementId}">			<div class="block-ui-window">				<div class="block-ui-window-header">					<div class="block-ui-window-title">{$messages.fields_image_field.select_image}</div>					<div class="block-ui-window-close-button"></div>					<div class="clear"></div>				</div>				<div class="block-ui-window-content">					<div class="fm-main-container">						<div class="filemanager-container">							<div class="fm-main-container">								<div class="filemanager-container" id="{$elementId}">									<input type="hidden" name="{$name}" class="image-field-value" value="{$value}" />									<div class="fm-entry">																		</div>								</div>							</div>						</div>						{literal}						<script>							new FileManager({								item: '.fm-image',								action: function() {									$({/literal}'#{$elementId}'{literal}).find('.image-field-value').val($(this).attr('path'));								},								container: $('{/literal}#{$elementId}{literal}'),								allowActions: 0,								onItemClick: function(){																	}							});						</script>						{/literal}					</div>				</div>			</div>		</div>		<script>			$('#show-image-field-container-{$elementId}').click(function(){				$('#image-field-block-ui-{$elementId}').toggleClass('hide');			});			$('#image-field-block-ui-{$elementId}').find('.block-ui-window-close-button').click(function(){				$('#image-field-block-ui-{$elementId}').toggleClass('hide');			});		</script>	</div>	<div class="clear"></div></div>