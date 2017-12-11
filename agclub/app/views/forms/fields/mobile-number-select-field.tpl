<div class="form-field-container selectfield-div" id="el-{$randNum}">
	<div class="left form-field-title">
		{$title}:
	</div>
	<div class="right form-field-own">
		<div class="left form-field-own-select-small">
			<select name="phone-code" class="form-select-small form-phone-code">
				<option value="050">050</option>
				<option value="051">051</option>
				<option value="055">055</option>
				<option value="070">070</option>
				<option value="077">077</option>
			</select>
		</div>
		<div class="left form-field-own-input-medium">
			<input type="text" class="form-phone-number only-integer" />
		</div>
		<div class="left"></div>
		<div class="clear"></div>
	</div>
	<input type="hidden" name="{$name}" class="form-result-value" />
	<div class="clear"></div>
</div>
<script>
	$('#el-{$randNum}').find('.form-phone-code, .form-phone-number').change(function(){
		$('#el-{$randNum}').find('.form-result-value').val($('#el-{$randNum}').find('.form-phone-code').val() + $('#el-{$randNum}').find('.form-phone-number').val());
	});
</script>