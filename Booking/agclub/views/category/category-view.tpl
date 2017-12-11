{extends file="base.tpl"}

{block name="page-title"}
	:: {$category->categoryItemTitle->value}
{/block}

{block name="content"}
	<div class="view-page-content view-page-content-small font16">
		<div class="page-title news-page-title font25">{$category->categoryItemTitle->value}</div>
		
		{foreach from=$objects item=o}
		<div class="object-list-item">
			<div class="object-left-info">
				<div class="obj-title font18">{$o.parent.objTitle}</div>
				{if isset($o.childs)}
					{foreach from=$o.childs item=child}
						{foreach from=$child item=d}
							<div class="object-data-container">
								{if $d.address}
								<div class="object-data-record">
									<div class="data-title font13">{$messages.category.address}</div>
									<div class="data-own font13">{$d.address}</div>
									<div class="clear"></div>
								</div>
								{/if}
								{if $d.phone}
								<div class="object-data-record">
									<div class="data-title font13">{$messages.category.phone_number}:</div>
									<div class="data-own font13">{$d.phone}</div>
									<div class="clear"></div>
								</div>
								{/if}
								{if $d.webSite}
								<div class="object-data-record">
									<div class="data-title font13">{$messages.category.site}:</div>
									<div class="data-own font13"><a href="http://{$d.webSite}" target="_blank">{$d.webSite}</a></div>
									<div class="clear"></div>
								</div>
								{/if}
								{if $d.description}
								<div class="object-data-record">
									<div class="data-title font13">{$messages.category.more_info}:</div>
									<div class="data-own font13">{$d.description}</div>
									<div class="clear"></div>
								</div>
								{/if}
							</div>
							<div class="object-links relative">
								<img src="{$static_url}/img/show-map-tr-bg.png" class="width100" />
								<div class="object-links-top-layer">
									<div class="object-link-left">
										<a href="javascript:void(0);" class="font13 show-map" object-id="{$d.id}">{$messages.common.map}</a>
									</div>
									<div class="object-link-right"><a href="javascript:void(0);" class="font13">{$messages.common.rating}</a>: <span class="rating-value font13">{if ($d.ratesCount && intval($d.rating / $d.ratesCount))}{intval($d.rating / $d.ratesCount)}{else}0{/if}</span></div>
									<div class="clear"></div>
								</div>
								<div class="object-links-bottom-layer">
									<div class="object-rating-container relative">
										<div class="object-rating-ribbon" object-id="{$d.id}">
											<div class="object-rating-icon">
												<img class="inactive" src="{$static_url}/img/star-inactive.png" />
												<img class="active hide" src="{$static_url}/img/star-active.png" />
											</div>
											<div class="object-rating-icon">
												<img class="inactive" src="{$static_url}/img/star-inactive.png" />
												<img class="active hide" src="{$static_url}/img/star-active.png" />
											</div>
											<div class="object-rating-icon">
												<img class="inactive" src="{$static_url}/img/star-inactive.png" />
												<img class="active hide" src="{$static_url}/img/star-active.png" />
											</div>
											<div class="object-rating-icon">
												<img class="inactive" src="{$static_url}/img/star-inactive.png" />
												<img class="active hide" src="{$static_url}/img/star-active.png" />
											</div>
											<div class="object-rating-icon">
												<img class="inactive" src="{$static_url}/img/star-inactive.png" />
												<img class="active hide" src="{$static_url}/img/star-active.png" />
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						{/foreach}
					{/foreach}
				{else}
					<div class="object-data-container">
						{if $o.parent.address}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.category.address}:</div>
							<div class="data-own font13">{$o.parent.address}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $o.parent.phone}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.category.phone_number}:</div>
							<div class="data-own font13">{$o.parent.phone}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $o.parent.webSite}
							<div class="object-data-record">
								<div class="data-title font13">{$messages.category.site}:</div>
								<div class="data-own font13"><a href="http://{$o.parent.webSite}" target="_blank">{$o.parent.webSite}</a></div>
								<div class="clear"></div>
							</div>
						{/if}
						{if $o.parent.description}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.category.more_info}:</div>
							<div class="data-own font13">{$o.parent.description}</div>
							<div class="clear"></div>
						</div>
						{/if}
					</div>
					<div class="object-links relative">
						<div class="object-links-top-layer">
							<div class="object-link-left">
								<a href="javascript:void(0);" class="font13 show-map" object-id="{$o.parent.id}">{$messages.common.map}</a>
							</div>
							<div class="object-link-right"><a href="javascript:void(0);" class="font13">{$messages.common.rating}</a>: <span class="rating-value font13">{if ($o.parent.ratesCount && intval($o.parent.rating / $o.parent.ratesCount))}{intval($o.parent.rating / $o.parent.ratesCount)}{else}0{/if}</span></div>
							<div class="clear"></div>
						</div>
						<div class="object-links-bottom-layer">
							<div class="object-rating-container relative">
								<div class="object-rating-ribbon" object-id="{$o.parent.id}">
									<div class="object-rating-icon">
										<img class="inactive" src="{$static_url}/img/star-inactive.png" />
										<img class="active hide" src="{$static_url}/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="{$static_url}/img/star-inactive.png" />
										<img class="active hide" src="{$static_url}/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="{$static_url}/img/star-inactive.png" />
										<img class="active hide" src="{$static_url}/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="{$static_url}/img/star-inactive.png" />
										<img class="active hide" src="{$static_url}/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="{$static_url}/img/star-inactive.png" />
										<img class="active hide" src="{$static_url}/img/star-active.png" />
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				{/if}
			</div>
			<div class="object-discount font25">{$o.parent.discount}</div>
			<div class="object-logo">{if $o.parent.objLogo}<img src="{$public_url}/{$o.parent.objLogo}" />{/if}</div>
			<div class="clear"></div>
		</div>
		
		{/foreach}
		
		<div class="clear"></div>
		
		{if count($paginator) > 3}
		<div class="paginator-container">
			<div class="paginator-content">
				{foreach from=$paginator item=p}
					{if $currentPage == $p.key}
						<div class="paginator-item paginator-item-active">
							<span class="font13" >{$p.title}</span>
						</div>
					{else}
						<div class="paginator-item">
							{if isset($p.inactive)}
								<span class="font13" style="color: #000;" >{$p.title}</span>
							{else}
								<a href="{$app_url}/{$currentLang}/category/view/{$category->id->value}/page/{$p.key}" class="font13" >{$p.title}</a>
							{/if}
						</div>
					{/if}
				{/foreach}
				<div class="clear"></div>
			</div>
		</div>
		{/if}
		
	</div>
	
	<!-- tool for adaptive -->
	<!--<div class="clear show-in-960"></div>-->
	<div class="clear show-in-767"></div>
	<!-- tool for adaptive end -->
	<!-- content block -->
	<div class="content-container-item relative horoscope-content-container hide-in-767" style="width: 20%; margin-left: 2%; visibility: hidden;">
		<img src="{$static_url}/img/transparent-img.png" class="width100 horoscope-carcas" />
		<div class="text-layer" class="absolute" >
			<div class="text-right">
				<a href="#">
					<img src="{$static_url}/img/horoscope.png" class="horoscope-icon" />
				</a>
			</div>
			<div class="font25">{$messages.horoscope.title}</div>
			<br/>
			
			<div><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="0">{$messages.horoscope.man}</a></div>
			<div><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="1">{$messages.horoscope.woman}</a></div>
		</div>
	</div>
	<!-- content block end -->
	
	<div class="clear"></div>
{/block}