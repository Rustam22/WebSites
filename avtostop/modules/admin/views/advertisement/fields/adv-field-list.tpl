<div class="adv-tables-list-container">
	<div class="adv-tables-list">
		{foreach from=$fields item=f}
			<div class="list-container">
				<div class="table-item list-item left" >
					<a href="javascript:void(0);" class="new-window" data-url="{$app_url}/{$admin_title}/advertisements/fields/edit/{$f.id}" title="{$f.title}" have-parent="1" reload-parent="1" >{$f.title}</a>
				</div>
				<div class="right" style="right: 0; top: 0;">
					<div class="right button-std remove-field" item-id="{$f.id}">sil</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		{/foreach}
	</div>
	<div class="adv-action-buttons">
		<div class="left action-buttons">
			<div class="button-std new-window" data-url="{$app_url}/{$admin_title}/advertisements/fields/add" have-parent="1" reload-parent="1" title="əlavə et"> əlavə et </div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
	$('.remove-field').unbind('click').click(function() {
		var fieldId = parseInt($(this).attr('item-id'));
		var windowId = $(this).parents('.window').attr('id');
		if (confirm('Silməyə əminsiz?')) {
			$.ajax({
				url: app['url'] + '/advertisements/fields/remove/' + fieldId,
				type: 'post',
				dataType: 'json',
				success: function(r) {
					if (r.success) getWindow(windowId).reload();
				}
			});
		}
	});
</script>