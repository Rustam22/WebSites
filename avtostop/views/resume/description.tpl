<div class="resume-description">
	{foreach from=$fields item=f}
	<div class="resume-description-field">
		<div class="resume-description-field-title">
			{$f.title}
		</div>
		<div class="resume-description-field-own">
			{$f.value}
		</div>
	</div>
	{/foreach}
</div>