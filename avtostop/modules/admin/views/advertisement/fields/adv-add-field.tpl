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
<form action="{$app_url}/{$admin_title}/advertisements/fields/add/data" method="post" target="submitForm" enctype="multipart/form-data">
	<div class="adv-tables-list-container">
		<div class="adv-table-fields-list">
			<div class="adv-add-table-top-buttons">
				<div class="left add-field-data">
					<div class="button-std" id="add-field" >sahə əlavə et</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="fields-container-margin"></div>
			<div class="adv-table-info">
				<div class="field-el-container">
					<div class="left field-label">Sahənin adı</div>
					<div class="right field-value-el"><input type="text" name="fieldName" value="" /></div>
					<div class="clear"></div>
				</div>
				<div class="field-type-container field-lv-container">
					<div class="left field-label">Sahənin növü</div>
					<div class="right field-value-el">
						<select name="fieldType" id="set-field-type">
							<option value="0">Cümlə</option>
							<option value="1">Mətn</option>
							<option value="2">Bir seçim</option>
							<option value="3">Birneçə seçim (checkbox)</option>
							<option value="4">Birneçə seçim (select)</option>
							<option value="5">Tarix</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="adv-fields-container hide">
				
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
<script id="t-add-field-data" type="text/html">
	
	<div class="field-item" new-added="1">
		<div class="field-image-cnt field-lv-container">
			<div class="left field-image-label field-label">
				<span>Qiyməti</span>
			</div>
			<div class="field-image-value right field-value-el">
				<input type="text" name="fieldValue[]">
			</div>
			<div class="clear"></div>
		</div>
		<div class="field-messages-cnt field-lv-container">
			<div class="field-messages-cnt-label">Sahənin qiymətinin adı</div>
			<% for (i = 0; i < lang.length; i++) { %>
				<div class="field-lv-container">
					<div class="field-message-lang-lable left"><%=lang[i].title%></div>
					<div class="field-message-value right field-value-el"><input type="text" name="fieldMessage[<%=lang[i].value%>][]" value="" ></div>
					<div class="clear"></div>
				</div>
			<% } %>
		</div>
		<div class="field-image-cnt field-lv-container">
			<div class="left field-image-label field-label">
				<span>Aid şəkil (mövcuddursa)</span>
			</div>
			<div class="field-image-value right field-value-el">
				<input type="file" name="fieldImage[]">
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
		return tmpl($('#t-add-field-data').html(), {lang: lang});
	}
	
	function addField() {
		var parent = $(this).parents('.window');
		parent.find('.adv-fields-container').append(getFieldHtml(app['langs']));
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
	
	function inArray(el, ar) {
		for (i = 0; i < ar.length; i++) if (ar[i] == el) return true;
		return false;
	}
	
	function fieldTypeChanged() {
		var arShowMultiple = [2, 3, 4];
		var val = parseInt($(this).val());
		var parent = $(this).parents('.window');
		
		if (inArray(val, arShowMultiple)) {
			parent.find('.add-field-data').show();
			parent.find('.adv-fields-container').show();
		} else {
			parent.find('.add-field-data').hide();
			parent.find('.adv-fields-container').hide();
		}
	}
	
	$('#add-field').click(addField);
	$('.remove-field').live('click', removeField);
	$('#form-submit').load(getFormSubmitResult);
	$('#set-field-type').change(fieldTypeChanged);
</script>
{/literal}