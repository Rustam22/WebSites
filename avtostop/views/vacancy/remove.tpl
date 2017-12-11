{extends file="base.tpl"}

{block name="content"}
	
	<div class="layer-right-block-options-content">
		Are you sure?
		
		<a href="{$referer}">no</a>
		<form action="" method="post">
			<input type="submit" name="remove_vac" value="remove" />
		</form>
	</div>
	
{/block}