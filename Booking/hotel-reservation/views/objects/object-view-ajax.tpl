<div class="view-page-content view-page-content-small font16" style="width: 96%;">
	<div class="object-list-item">
		<div class="object-left-info">
			{if isset($childs) && count($childs)}
				{foreach from=$childs item=d}	
					<div class="object-data-container">
						{if $d.address}
						<div class="object-data-record">
							<div class="data-title font13">{$messages.category.address}:</div>
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
			{else}
				<div class="object-data-container">
					{if $object->address->value}
					<div class="object-data-record">
						<div class="data-title font13">{$messages.category.address}:</div>
						<div class="data-own font13">{$object->address->value}</div>
						<div class="clear"></div>
					</div>
					{/if}
					{if $object->phone->value}
					<div class="object-data-record">
						<div class="data-title font13">{$messages.category.phone_number}:</div>
						<div class="data-own font13">{$object->phone->value}</div>
						<div class="clear"></div>
					</div>
					{/if}
					{if $object->webSite->value}
					<div class="object-data-record">
						<div class="data-title font13">{$messages.category.site}:</div>
						<div class="data-own font13"><a href="http://{$object->webSite->value}" target="_blank">{$object->webSite->value}</a></div>
						<div class="clear"></div>
					</div>
					{/if}
					{if $object->description->value}
					<div class="object-data-record">
						<div class="data-title font13">{$messages.category.more_info}:</div>
						<div class="data-own font13">{$object->description->value}</div>
						<div class="clear"></div>
					</div>
					{/if}
				</div>
				<div class="object-links relative">
					<img src="{$static_url}/img/show-map-tr-bg.png" class="width100" />
					<div class="object-links-top-layer">
						<div class="object-link-left">
							<a href="javascript:void(0);" class="font13 show-map" object-id="{$object->id->value}">{$messages.common.map}</a>
						</div>
						<div class="object-link-right"><a href="javascript:void(0);" class="font13">{$messages.common.rating}</a>: <span class="rating-value font13">{if ($object->ratesCount->value && intval($object->rating->value / $object->ratesCount->value))}{intval($object->rating->value / $object->ratesCount->value)}{else}0{/if}</span></div>
						<div class="clear"></div>
					</div>
					<div class="object-links-bottom-layer">
						<div class="object-rating-container relative">
							<div class="object-rating-ribbon" object-id="{$object->id->value}">
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
		<div class="object-discount font25">{$object->discount->value}</div>
		<div class="object-logo">{if $object->objLogo->value}<img src="{$public_url}/{$object->objLogo->value}" />{/if}</div>
		<div class="clear"></div>
	</div>
	
	
	<div class="clear"></div>
	
	
</div>

<div class="clear"></div>