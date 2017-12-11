{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.common.p404}
{/block}

{block name="msliderContainer"}
	<img src="{$static_url}/img/404-bg.png" class="width100" />
	<div style="position: absolute; top: 14%; width: 50%; left: 3%;">
		<img src="{$static_url}/img/vay-vay-{$currentLang}.png" class="width100" />
	</div>
	<div class="font30 absolute" style="color: #eee; z-index: 999; top: 43%; left: 3%;">
		Üzr istəyirik! Deyəsən axı səhv baş verdi...
	</div>
	<div class="font16 absolute" style="color: #eee; top: 60%; width: 55%; left: 3%;">
		Axtardığınız səhifə artıq mövcud deyil. Siz yenidən <a href="{$app_url}/{$currentLang}" style="color: #6bebff;">Baş səhifəyə</a> geri qayıda, yaxud
		<a  style="color: #6bebff;" href="mailto:agclub@agclub.az">agclub@agclub.az</a> ünvanına öz suallarınızı göndərə bilərsiniz.  
	</div>
{/block}

{block name="content"}
	
{/block}