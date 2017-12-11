{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.serv_net.title}
{/block}
{block name="content"}
	<div class="view-page-content font16">
		<div class="page-title news-page-title font25">{$messages.serv_net.title}</div>
		
		{foreach from=$servNet item=snItem}
			<div class="object-list-item serv-net-list-item">
				<div class="object-left-info" style="width: 80%;">
					<div class="obj-title font18">{$snItem->name->value}</div>
					<div class="object-data-container">
						{if $snItem->address->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.category.address}:</div>
							<div class="data-own font13">{$snItem->address->value}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $snItem->phone->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.serv_net.phone_number}:</div>
							<div class="data-own font13">{$snItem->phone->value}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $snItem->postalCode->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.serv_net.postalCode}:</div>
							<div class="data-own font13">{$snItem->postalCode->value}</a></div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $snItem->licenseNumber->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.serv_net.licenseNumber}:</div>
							<div class="data-own font13">{$snItem->licenseNumber->value}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $snItem->startTime->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.serv_net.startTime}:</div>
							<div class="data-own font13">{$snItem->startTime->value}</div>
							<div class="clear"></div>
						</div>
						{/if}
						{if $snItem->workTime->value}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.serv_net.workTime}:</div>
							<div class="data-own font13">{$snItem->workTime->value}</div>
							<div class="clear"></div>
						</div>
						{/if}
						<br/>
						<div class="object-data-record">
							<div class="clear"></div>
							<div class="data-own font13"><a href="javascript:void(0);" class="font13 show-result-in-message" title="{$snItem->name->value}" data-url="{$app_url}/serv-net/getmap/{$snItem->id->value}" >{$messages.common.map}</a></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		{/foreach}
		
		<div class="clear"></div>
		
	</div>
	
	<!-- tool for adaptive -->
	<div class="clear show-in-960"></div>
	<!-- tool for adaptive end -->
	<!-- content block -->
	<div class="content-container-item relative hide-in-767" style="width: 20%; margin-left: 2%; visibility: hidden;">
		<img src="{$static_url}/img/transparent-img.png" class="width100" />
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