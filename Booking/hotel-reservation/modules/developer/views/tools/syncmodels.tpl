{if count($sql)}
{foreach from=$sql item=s}
	<div class="sql-commands">
		Execute<input type="checkbox" name="sql_command[]" value="{$s.value}" checked="checked" />
		<br/>
		<div>{$s.highlighted}</div>
	</div>
{/foreach}
<button class="button font12 apple-button ajaxLoadable" content=".content" url="{$app_url}/{$developer_title}/syncmodels" state="syncmodels" params=".sql-commands" message="success" >execute</button>
{else}
No sql commands needed.
{/if}