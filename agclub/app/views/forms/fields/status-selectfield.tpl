<div class="field-container selectfield-div" id="el-{$randNum}">
	<div class="left form-field-title">
		{$title}
	</div>
	<div class="right form-field-own">
		<select name="{$name}">
			{foreach from=$options key=k item=v}
				<option value="{$k}">{$v}</option>
			{/foreach}
		</select>
	</div>
	<div class="clear"></div>
</div>
<script>
	$('#el-{$randNum}').find('select').change(function(){
		switch (parseInt($(this).val())) {
			case 0:
				$('.form-element-physical').show();
				break;
			case 1:
				$('.form-element-physical').hide();
				break;
		}
		$('.form-legal')
	});
</script>