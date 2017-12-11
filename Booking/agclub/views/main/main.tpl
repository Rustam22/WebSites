{extends file="base.tpl"}

{block name="calculator"}

	<!-- calculator -->
	<div class="center-container hide-in-767 hide-in-479">
		<div id="calculator-container">
			<div id="calculator-title" class="show-in-767"><span class="red-border italic">{$messages.common.calc_title}</span>: </div>
			<div id="calculator-left">
				<div class="font16" id="calculator-left-title">
					<span class="red-border italic hide-in-767">{$messages.common.calc_title} :</span> <span class="bold" style="float: right; margin-top: 1%; margin-right: 1%;">{$messages.calculator.category}:</span> 
				</div>
				<div id="category-select-container">
					<div id="category-select">
						<div class="select-container relative select-box">
							<div class="selected-value-container ">
								<div class="selected-value left"></div>
								<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
								<div class="clear"></div>
							</div>
							<div class="select-options-container absolute hide">
								{foreach from=$calculatorCategories key=k item=v}
									<div class="select-option" key="{$v->id->value}" >{$v->categoryItemTitle->value}</div>
								{/foreach}
							</div>
							<input type="hidden" />
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="left" id="calculator-obj-count"></div>
			<!-- tool for adaptive -->
			<div class="clear show-in-767"></div>
			<!-- tool for adaptive end -->
			
			<div id="calculator-right">
				<div class="font16" id="category-right-title">{$messages.calculator.object}:</div>
				<div id="object-select-container">
					<div id="object-select">
						<div class="select-container select-box relative">
							<div class="selected-value-container">
								<div class="selected-value">{$messages.common.choose_obj}</div>
								<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
								<div class="clear"></div>
							</div>
							<div class="select-options-container absolute hide" style="z-index: 999;">
								<div class="select-option" key="1" >{$messages.common.choose_obj}</div>
							</div>
							<input type="hidden" />
						</div>
					</div>
				</div>
				<div id="calculator-result" class="font16">{$messages.calculator.discount} : <span id="object-discount-value"></span></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- calculator end -->

{/block}

{block name="content"}
	{foreach from=$categoryKeys item=ck name=ckeys}
	<!-- content block -->
	<div class="content-container-item relative">
		<div class="category-item-container relative">
			<!--<img src="{$static_url}/img/transparent-img.png" class="width100" />-->
			<img src="{$public_url}/{$categories[$ck]->categoryItemImage->value}" class="width100" />
			<a href="{$app_url}/{$currentLang}/category/view/{$categories[$ck]->id->value}">
			<div class="category-text-container-layer">
				{if $smarty.foreach.ckeys.index == '1'}
					<img src="{$static_url}/img/main-category-green-layer.png" />
				{else}
					<img src="{$static_url}/img/main-category-orange-layer.png" />
				{/if}
			</div>
			<div class="category-text {if $smarty.foreach.ckeys.index == '1'} category-text-top {/if}">
				<a href="{$app_url}/{$currentLang}/category/view/{$categories[$ck]->id->value}" class="font16">
					<!--<img src="{$static_url}/img/category-cosmetic.png" class="width100" />-->
					{$categories[$ck]->categoryItemTitle->value} ({$categories[$ck]->objCount})
				</a>
			</div>
			</a>
		</div>
	</div>
	<!-- content block end -->
	
	{if $smarty.foreach.ckeys.index > 1 && !$smarty.foreach.ckeys.last}
	<!-- tool for adaptive -->
	<div class="clear show-in-767"></div>
	<!-- tool for adaptive end -->
	{/if}
	
	{/foreach}
	
	<!-- tool for adaptive -->
	<div class="clear show-in-960"></div>
	<!-- tool for adaptive end -->
	<!-- content block -->
	<div class="content-container-item relative hide-in-960" style="visibility: hidden;">
		<img src="{$static_url}/img/transparent-img.png" class="width100" />
		<div class="text-layer" class="absolute" >
			<div class="text-right">
				<a href="#">
					<img src="{$static_url}/img/horoscope.png" class="horoscope-icon" />
				</a>
			</div>
			<div class="font25">{$messages.horoscope.title}</div>
			<br/>
			
			<div class="horoscope-link"><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="0">{$messages.horoscope.man}</a></div>
			<div class="horoscope-link"><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="1">{$messages.horoscope.woman}</a></div>
		</div>
	</div>
	<!-- content block end -->
	
	<!-- tool for adaptive -->
	<div class="clear show-in-767"></div>
	<!-- tool for adaptive end -->
	
{/block}