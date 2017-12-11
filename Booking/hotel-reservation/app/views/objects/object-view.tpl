<div class="fixed" id="go-back-button">
	<a href="javascript:loadUrl('{$app_url}/category/view/{$object->category->value}');"><img src="{$static_url}/img/go-back.png" /></a>
</div>
<div class="obj-data-container">
	<div class="object-logo">
		<img src="{$public_url}{$object->objLogo->value}" class="width100" />
	</div>
	<div class="txt-color-red font36 text-center">{$object->discount->value}</div>

	<br/>
	{if !count($childs)}
	<div class="obj-childs-container">
		{if $object->address->value}
		<div class="left obj-left bold txt-color-dark font20">{$messages.category.address}</div>
		<div class="right obj-right txt-color-dark font20">{$object->address->value}</div>
		<div class="clear"></div>
		{/if}
		{if $object->phone->value}
		<div class="left obj-left bold txt-color-dark font20">{$messages.category.phone_number}</div>
		<div class="right obj-right txt-color-dark font20">{$object->phone->value}</div>
		<div class="clear"></div>
		{/if}
		<div class="left obj-left"><a href="javascript:loadUrl('{$app_url}/object/view/{$object->r_id->value}');" class="font20 txt-color-dark">{$messages.common.map}</a></div>
		<div class="clear"></div>
	</div>
	{/if}
	{if count($childs)}
		{foreach from=$childs item=c}
		<div class="obj-childs-container">
			{if $c.address}
			<div class="left obj-left bold txt-color-dark font20">{$messages.category.address}</div>
			<div class="right txt-color-dark font20">{$c.address}</div>
			<div class="clear"></div>
			{/if}
			{if $c.phone}
			<div class="left obj-left bold txt-color-dark font20">{$messages.category.phone_number}</div>
			<div class="right txt-color-dark font20">{$c.phone}</div>
			<div class="clear"></div>
			{/if}
			<div class="left"><a href="javascript:loadUrl('{$app_url}/object/view/{$c.r_id}');" class="font20 txt-color-dark">{$messages.common.map}</a></div>
			<div class="clear"></div>
		</div>
		{/foreach}
	{/if}
</div>