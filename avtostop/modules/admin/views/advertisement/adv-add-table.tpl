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
<form action="{$app_url}/{$admin_title}/advertisements/tables/add/data" method="post" target="submitForm">
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
					<div class="right field-value-el"><input type="text" name="tableName" value="" /></div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Xəritəsi var?</div>
					<div class="right field-value-el">
						<select name="tableHasMap">
							<option value="0">Xeyr</option>
							<option value="1">Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Qəzetdə var?</div>
					<div class="right field-value-el">
						<select name="tableNewspaper">
							<option value="0">Xeyr</option>
							<option value="1">Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Şəkili var?</div>
					<div class="right field-value-el">
						<select name="tableHasImage">
							<option value="0">Xeyr</option>
							<option value="1">Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Axtarışda "slayd" var?</div>
					<div class="right field-value-el">
						<select name="tableHasAddInfo">
							<option value="0">Xeyr</option>
							<option value="1">Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Qiyməti var?</div>
					<div class="right field-value-el">
						<select name="tableHasPrice">
							<option value="1">Bəli</option>
							<option value="0">Xeyr</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="field-el-container">
					<div class="left field-label">Video var?</div>
					<div class="right field-value-el">
						<select name="tableHasVideo">
							<option value="0">Xeyr</option>
							<option value="1">Bəli</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="adv-fields-container">
				
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
					{foreach from=$fields item=f}
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
					<option value="0">Xeyr</option>
					<option value="1">Bəli</option>
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
	$('.remove-field').live('click', removeField);
	$('#form-submit').load(getFormSubmitResult);
</script>
{/literal}