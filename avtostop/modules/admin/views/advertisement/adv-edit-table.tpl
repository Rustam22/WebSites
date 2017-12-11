{literal}
<script>
	var formSubmitted = false;
	
	function submitted() {
		formSubmitted = true;
		return true;
	}
</script>
{/literal}

<iframe id="form-submit" class="hide" name="submitForm"></iframe>
<form action="{$app_url}/{$admin_title}/advertisements/tables/edit/{$table.id}/save" method="post" target="submitForm">
	<div class="adv-tables-list-container">
		<div class="adv-table-fields-list">
			<div class="adv-add-table-top-buttons">
				<div class="left">
					<div class="button-std" id="add-field" >sahə əlavə et</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="fields-container-margin"></div>
			<div class="adv-table-info">
				<div class="field-el-container">
					<div class="left field-label">Cədvəlin adı</div>
					<div class="right field-value-el">
						<input type="text" name="tableName" value="{$table.table_title}" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Xəritəsi var?</div>
					<div class="right field-value-el">
						<select name="tableHasMap">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_map == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Qəzetdə var?</div>
					<div class="right field-value-el">
						<select name="tableNewspaper">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_newspaper == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Şəkili var?</div>
					<div class="right field-value-el">
						<select name="tableHasImage">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_image == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Axtarışda "slayd" var?</div>
					<div class="right field-value-el">
						<select name="tableHasAddInfo">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_add_info == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Qiyməti var?</div>
					<div class="right field-value-el">
						<select name="tableHasPrice">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_price == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Video var?</div>
					<div class="right field-value-el">
						<select name="tableHasVideo">
							<option value="0">Xeyr</option>
							<option value="1" {if ($table.has_video == 1)}selected="selected"{/if} >Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="adv-fields-container">
				
				<!-- already exist fields -->
				{foreach from=$fields item=f}
				
				<div class="field-item" new-added="0" item-id="{$f.id}">
				
					<input type="hidden" value="{$f.field_title}" name="fieldTitle[]" >
					<input type="hidden" name="fieldId[]" value="{$f.id}">
				
					<div class="field-title-cnt field-lv-container">
						<div class="left field-title-label field-label">
							<span>Ardıcıllıq</span>
						</div>
						<div class="right field-title-value-cnt field-value-el">
							<input type="text" value="{$f.order}" name="fieldOrder[]" >
						</div>
						<div class="clear"></div>
					</div>
				
					<div class="field-type-cnt field-lv-container">
						<div class="field-type-label left field-label">
							<span>Sahənin növü</span>
						</div>
						<div class="field-value right field-value-el">
							<select name="fieldType[]" class="field-type">
								{foreach from=$fieldTypes item=ft}
									<option value="{$ft.id}|{$ft.type}" {if $f.field_id == $ft.id}selected="selected"{/if} >{$ft.title}</option>
								{/foreach}
							</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="field-messages-cnt field-lv-container">
						<div class="field-messages-cnt-label">Sahənin adı - başqa dillərdə</div>
						{foreach from=$fieldMessages[$f.id] item=i key=l}
							<div class="field-lv-container">
								<div class="field-message-lang-lable left">{$langs[$i.lang_id]}</div>
								<div class="field-message-value right field-value-el">
									<input type="text" name="fieldMessage[{$i.lang_id}][]" value="{$i.title}" >
									<input type="hidden" name="fieldMessageId[{$i.lang_id}][]" value="{$i.id}" />
								</div>
								<div class="clear"></div>
							</div>
						{/foreach}
					</div>
					<div class="field-searchable field-lv-container">
						<div class="left field-searchable-label field-label">Axtarışda iştirak edir?</div>
						<div class="field-searchable-value right field-value-el">
							<select name="fieldIsSearchable[]">
								<option value="1">Bəli</option>
								<option value="0" {if $f.searchable == 0}selected="selected"{/if} >Xeyr</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="field-searchable field-lv-container">
						<div class="left field-searchable-label field-label">Əlavə məlumatdır?</div>
						<div class="field-searchable-value right field-value-el">
							<select name="fieldIsAddInfo[]">
								<option value="0">Xeyr</option>
								<option value="1"  {if $f.is_add_info == 1}selected="selected"{/if}  >Bəli</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="field-searchable field-lv-container">
						<div class="left field-searchable-label field-label">Vacibdir?</div>
						<div class="field-searchable-value right field-value-el">
							<select name="fieldIsRequired[]">
								<option value="0">Xeyr</option>
								<option value="1" {if $f.required == 1}selected="selected"{/if} >Bəli</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="field-action-buttons">
						<div class="left">
							<div class="button-std remove-field">Sil</div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="field-containers-splitter"></div>
					
				</div>
				{/foreach}
				
				<!-- already exist fields end -->
				
			</div>
		</div>
		<div class="adv-action-buttons">
			<div class="left action-buttons">
				<input type="submit" class="button-std" onclick="submitted()" value="yadda saxla" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
{literal}
<script id="t-add-field" type="text/html">
	
	<div class="field-item" new-added="1">
		<input type="hidden" name="newField[]" />
		<div class="field-title-cnt field-lv-container">
			<div class="left field-title-label field-label">
				<span>Sahənin adı</span>
			</div>
			<div class="right field-title-value-cnt field-value-el">
				<input type="text" value="" name="fieldTitle[]" >
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-title-cnt field-lv-container">
			<div class="left field-title-label field-label">
				<span>Ardıcıllıq</span>
			</div>
			<div class="right field-title-value-cnt field-value-el">
				<input type="text" value="" name="fieldOrder[]" >
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-type-cnt field-lv-container">
			<div class="field-type-label left field-label">
				<span>Sahənin növü</span>
			</div>
			<div class="field-value right field-value-el">
				<select name="fieldType[]" class="field-type">
					{/literal}
					{foreach from=$fieldTypes item=f}
						<option value="{$f.id}|{$f.type}">{$f.title}</option>
					{/foreach}
					{literal}
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-messages-cnt field-lv-container">
			<div class="field-messages-cnt-label">Sahənin adı - başqa dillərdə</div>
			<% for (i = 0; i < lang.length; i++) { %>
				<div class="field-lv-container">
					<div class="field-message-lang-lable left"><%=lang[i].title%></div>
					<div class="field-message-value right field-value-el"><input type="text" name="fieldMessage[<%=lang[i].value%>][]" value="" ></div>
					<div class="clear"></div>
				</div>
			<% } %>
		</div>
		<div class="field-searchable field-lv-container">
			<div class="left field-searchable-label field-label">Axtarışda iştirak edir?</div>
			<div class="field-searchable-value right field-value-el">
				<select name="fieldIsSearchable[]">
					<option value="0">Bəli</option>
					<option value="1">Xeyr</option>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-searchable field-lv-container">
			<div class="left field-searchable-label field-label">Əlavə məlumatdır?</div>
			<div class="field-searchable-value right field-value-el">
				<select name="fieldIsAddInfo[]">
					<option value="0">Xeyr</option>
					<option value="1">Bəli</option>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-searchable field-lv-container">
			<div class="left field-searchable-label field-label">Vacibdir?</div>
			<div class="field-searchable-value right field-value-el">
				<select name="fieldIsRequired[]">
					<option value="0">Xeyr</option>
					<option value="1">Bəli</option>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		
		
		<div class="field-action-buttons">
			<div class="left">
				<div class="button-std remove-field">Sil</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="field-containers-splitter"></div>
		
	</div>
</script>
<script>

	function l(s) { console.log(s); }

	function getFieldHtml(lang) {
		return tmpl($('#t-add-field').html(), {lang: lang});
	}
	
	function addField() {
		$('.adv-fields-container').append(getFieldHtml(app['langs']));
		getWindow($(this).parents('.window').attr('id')).correctSize();
	}
	
	function removeField() {
		var parent = $(this).parents('.field-item');
		if ((typeof parent.attr('new-added') != 'undefined') && (parseInt(parent.attr('new-added')) == 1)) {
			parent.remove();
		} else {
			if (confirm('Silməyə əminsiniz?')) {
				var itemId = parseInt(parent.attr('item-id'));
				$.ajax({
					url: app['url'] + '/advertisements/tables/remove/field/' + itemId,
					type: 'post',
					dataType: 'json',
					success: function(r) {
						if (r.success) parent.remove();
					}
				});
			}
		}
	}

	function getFormSubmitResult() {
		if (!formSubmitted) return;
		var r = $(this).contents().find('body').html();
		l(r);
		if (r == 'success') {
			alert('all is ok');
		} else {
			alert('error');
		}
	}
	
	$('#add-field').click(addField);
	$('.remove-field').die('click');
	$('.remove-field').live('click', removeField);
	$('#form-submit').load(getFormSubmitResult);
</script>
{/literal}