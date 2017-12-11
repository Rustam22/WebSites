<p>Models to synchronize:</p>
{foreach from=$modelsToSynchronize item=m name=ms}
<div class="models-to-synchronize"><input type="checkbox" value="{$smarty.foreach.ms.index}" checked="checked" name="models_to_synchronize[]" />{$m}</div>
{/foreach}
<button class="button font12 apple-button ajaxLoadable" content=".content" url="{$app_url}/{$developer_title}/syncmodels" state="syncmodels" params=".models-to-synchronize" >Synchronize selected models</button>