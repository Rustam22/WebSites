<style>
    .model-list-table tr td:nth-child(2) div{
	    width: 190px;	
        overflow: hidden;		
	}
	.model-list-table tr td:nth-child(3) div {
	    width: 150px;
        overflow: hidden;			
	}
    .window {
        max-width: 880px;
    }
</style>
<table cellpadding="0" cellspacing="0" class="model-list-table">
	<tr class="model-data-list-tr model-data-list-head-tr">
		<td>{*
			<!--
			<div id="checkbox-controller-{$model_id}">
				<div class="checkbox-controller-container check-all" val="1" key="check">
					<div class="checkbox-controller-icon"></div>
					<div class="checkbox-controller-title"></div>
					<div class="clear"></div>
					<input type="checkbox" class="delete-id hide" item-id="{$field_item}" />
				</div>
			</div>
			<script>
				new CheckBoxController('#checkbox-controller-{$model_id}');
			</script>
			-->*}
		</td>
		{foreach from=$table_headers.title item=h}
			<td>
				{$h}
			</td>
		{/foreach}
		<td>Cavab</td>
	</tr>
	{foreach from=$table_content.fields item=f name=table_content}
		<tr class="model-data-list-tr {if ($smarty.foreach.table_content.index % 2 == 0)}model-data-list-tr-bg{/if}">
			{foreach from=$f item=field_item name=field_item_foreach}
			{if ($smarty.foreach.field_item_foreach.first)}
				<td id="checkbox-container-{$smarty.foreach.table_content.index}-{$model_id}" class="model-data-list-checkbox-td" >
					<div class="checkbox-controller-container" val="1" key="check">
						<div class="checkbox-controller-icon"></div>
						<div class="checkbox-controller-title"></div>
						<div class="clear"></div>
						<input type="checkbox" class="delete-id hide" item-id="{$field_item}" />
					</div>
					<script>
						(new CheckBoxController('#checkbox-container-{$smarty.foreach.table_content.index}-{$model_id}')).onCheck(showDeleteButton).onUnCheck(hideDeleteButton);
					</script>
				</td>
			{else}
			<td>
				<div>{$field_item}</div>
			</td>
			{/if}
			{if ($smarty.foreach.field_item_foreach.last)}
			    <td>
					<div class="button-std new-window-question" style="background-size: contain;" data-url="{$app_url}/{$admin_title}/answer/{$model_id}/{$f.id}">cavab ver</div>
				</td>
				<td>
					<div><a href="javascript:void(0);" class="new-window table-action" title="{$messages.interface_common.edit}" reload-parent="1" have-parent="1" data-url="{$app_url}/{$admin_title}/edit_answer/{$model_id}/{$f.id}">
						<img src="{$static_url}/{$theme_folder}/img/edit-icon-dark.png" />
					</a></div>
				</td>
			{/if}
			{/foreach}
		</tr>
	{/foreach}
</table>
