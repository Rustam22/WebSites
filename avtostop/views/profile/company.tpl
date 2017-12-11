{extends file="base.tpl"}

{block name="content"}
	<script>
		var currentUser = '{$userInfo["userId"]}';
	</script>
	
	<form action="{$app_url}/profile/save" method="post" enctype="multipart/form-data">
	<input type="hidden" value="2000600" name="MAX_FILE_SIZE">
	<div class="tabs-container profile-tabs-container">
		<div class="tab-buttons-container">
			<div class="layer-right-block-list-menu">
				<div class="layer-menu-list-withresume">
					<div class="layer-menu-list-item">
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey layer-menu-list-element-active">
							<span>{$m.about_company}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.company_adv}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.balance}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.reviews}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.vacancies}</span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="layer-menu-list-line">			
				</div>
			</div>
		</div>
		<!--Menu after search end -->
		<div class="clear"></div>

		<div class="tabs-content-container profile-tabs-content-container">
			<div class="tab-content hide" style="display: block;">
			<!--About myself-->
				<div class="layer-resume-element">
					<div class="layer-resume-person-title">
						<div class="layer-resume-person-title-photo left">
							<img src="{$app_url}/profile/get/avatar/144/200/{$userInfo['avatar']}" />
						</div>
						<div class="layer-resume-person-title-description left">
							<div class="resume-person-title-tables left">
							<!--Private info for resume -->
								<div class="resume-person-title-tables-left left">
									<div class="resume-person-title-tables-left-title">
										<div class="resume-person-title-tables-left-title-item tx-green-light"><span>{$m.common_info}</span></div>
									</div>
									<div class="resume-person-title-tables-left-content">
										<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
											<div><b>{$m.company_name}: </b><span class="">{if isset($userInfo['name'])}{$userInfo['name']}{else}{$m.empty}{/if}</span></div>
										</div>
										<div class="resume-person-title-tables-left-content-age tx-margin-top-6px">
											<span><b>{$m.company_created}: </b></span><span class="">{if isset($userInfo['birthday'])}{$userInfo['birthday']}{else}{$m.empty}{/if}</span>
										</div>
										<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
											<div class="profile-field-container">
												<div class="profile-field-title left">
													<b>{$m.city}: </b> <span>{$cityTitle}</span>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
								<!--Contacts for resume -->
								<div class="resume-person-title-tables-left left">
									<div class="resume-person-title-tables-left-title">
										<div class="resume-person-title-tables-left-title-item tx-green-light"><span>{$m.contacts}</span></div>
									</div>
									<div class="resume-person-title-tables-left-content">
										{foreach from=$cTypes item=cType}
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
												<span><b>{$cType['cTitle']}: </b></span>
												<span class="">{if isset($cValues[$cType['r_id']]) && !empty($cValues[$cType['r_id']]['contactValue'])}{$cValues[$cType['r_id']]['contactValue']}{else}{$m.empty}{/if}</span>
											</div>
											<input type="hidden" name="contact_type_id[]" value="{$cType['r_id']}" />
										{/foreach}
									</div>
								</div>	
								<!--Regards for resume-->
									
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<!--
							<div class="resume-person-horizontal-buttons">
								<div class="resume-buttons-horizontal-resumdoc left">
									<div id="public" class="tx-margin-right-15px left sprite check-box-unchecked"></div>
								</div>
								<div class="resume-buttons-horizontal-resumdoc-title left tx-green-light tx-14 a-underline c-pointer"><span>Resume.doc</span></div>
								<div class="resume-buttons-horizontal-resumlist left tx-margin-top-4px">
									<div class="sprite resume-buttons-horizontal-resumlist-item">
									</div>
								</div>
								<div class="resume-buttons-horizontal-addfile left tx-green-light a-underline c-pointer"><span>Прикрепить файл</span></div>
							</div>
							-->
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="clear"></div>
					
					<div class="layer-resume-person-profession">
						
						<div class="resume-person-profession-content tx-margin-top-6px">
							<br/>
							<div class="profession-content-education">
								<div class="profile-field-container">
									<div class="profile-field-title profile-field-title-textarea left">
										<span>{$m.about_company}:</span>
									</div>
									<div class="profile-field-own profile-field-own-textarea left">
										<span class="">{if isset($userInfo['about']) && !empty($userInfo['about'])}{$userInfo['about']}{else}{$m.empty}{/if}</span>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>						
			
			<!--About myself end-->
			</div>
			<div class="tab-content hide" style="display: none;">
				
				<div style="height: 30px;"></div>
				{foreach from=$myAdvertisements item=adv}
				<div class="layer-person-resume tx-margin-bottom-20px">
					<div class="advertisement-list-item {if ($adv->premium)}layer-person-elemet-premium{/if}">
						<div class="layer-perosn-info">
							{if $adv->premium}
							<div class="layer-premium-button right"><span class="tx-white"><i>{$m.premium}</i></span></div>
							{/if}
							{if $adv->quickly}
							<div class="layer-fast-button right"><span class="tx-white"><i>{$m.quickly}</i></span></div>
							{/if}
							<div class="layer-last-days-search-page right tx-margin-right-15px"><span>{$m.expires} {$adv->timeLeft} {$m.days}!</span></div>
							<div class="layer-breadcumb tx-green-light">
								<ul>
									<li class="layer-bredcumbs-links"><a class="tx-green-light tx-margin-right-5px" href="#">{$m.categories} </a><span class="tx-margin-right-5px">&raquo;</span></li>
									{foreach from=$adv->categoryPath item=p name=categoryPathF}
									<li class="layer-bredcumbs-links"><a class="tx-green-light tx-margin-right-5px" href="{$app_url}/category/{$p['r_id']}">{$p['title']}</a> {if (!$smarty.foreach.categoryPathF.last)} <span class="tx-margin-right-5px">&raquo;</span>{/if}</li>
									{/foreach}
								</ul>
							</div>	
							<div class="clear"></div>
							<div class="layer-article-text">

								<div class="layer-personal-text">
									<div class="layer-person-info-firstline">
										<div class="layer-personal-text-title">
											
											<div class="left p-relative">
												<div class=" a-none-underline tx-margin-right-15px tx-green-light left tx-margin-top-6px tx-margin-right-60px"><span>{$adv->country}, {$adv->city}</span></div>	
												{if ($adv->hasMap)}
												<div class="sprite layer-image-point-icon left c-pointer  tx-margin-top-6px layer-city-challenge"></div>
												<div class="left a-underline tx-margin-right-10px tx-margin-top-15px"><span class="show-on-map c-pointer" data-map="{$adv->map}">{$m.on_map}</span></div>
												{/if}
												{if ($adv->fromNewspaper)}
												<div class="tx-grey  layer-yellow-button-magazine left tx-margin-right-10px  tx-14 tx-margin-top-10px"><b>{$m.newspaper}</b></div>
												{/if}
												{if ($adv->hasPrice)}
												<div class="tx-green-light  layer-yellow-button-cash left tx-14 tx-margin-top-10px"><b>{$adv->price} {$adv->currency}</b></div>
												{/if}
												
											</div>	
											<div class="clear"></div>
										</div>
										<div class="a-underline tx-14 advertisement-list-title"><a href="{$adv->url}"><b>{$adv->title}</b></a></div>
										<div class="layer-article-content-search tx-margin-bottom-20px p-relative">
											<div class="layer-article-content-search-txt">
												<span>{$adv->description}</span>
											</div>
											<!--slider-->
											<div class="slider-block-adv p-absolute">
												<div class="right p-relative">
									
													<div class="layer-voice-image-search-page right p-relative">

															<div class="{if (!$adv->hasImages)}view-photo-apparate-icon-alignment-advanced{/if} p-absolute">
																{if (!$adv->hasImages)}
																<div class="sprite view-photo-apparate-icon"></div>
																<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px">{$m.no_photo}</div>
																{else}
																<div class="advertisement-list-item-image">
																	{if (isset($adv->images[0]))}<img src="{$public_url}/advertisement/images/{$adv->images[0]['image']}" />{/if}
																</div>
																{/if}
															</div>	
													</div>	
													{if ($adv->hasAdditionalInfo)}
													<div class="arrow-slider-serach-icon p-absolute c-pointer">
														<div class="arrow-slider-left-position">
															<div class="sprite arrow-slider-left-icon"></div>
														</div>	
													</div>
													<div class="slider-search-block p-absolute c-pointer">
														<div class="blue-close p-absolute left">
															<div class="blue-close-icon-position">
																<div class="sprite blue-close-arrow-icon"></div>
															</div>	
														</div>
														<div class="slider-search-content">
															<div>
																{foreach from=$adv->additionalInfo item=info}
																<div class="layer-second-row-slider-menu tx-line-height-20px">
																	<div class="layer-element-left left"><span>{$info['message']}:</span></div>
																	<div class="layer-element-right right tx-green-light"><span>{$info['value']}</span></div>
																</div>
																<div class="clear"></div>
																<div class="yellow-horizontal-line"></div>
																{/foreach}
																
															</div>
														</div>
													</div>
													{/if}
												</div>	
											</div>		
											<!--slider-->
										</div>
										<div class="layer-person-info-secondline">
											<div class="sprite layer-person-info-editb-icon left"></div>
											<div class="left tx-margin-top-6px"><span>{$m.published}: {$adv->published}</span></div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</div>									
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				{/foreach}
			
			<!--My articles end-->
			</div>
			
			<div class="tab-content" style="display: none;">
				<!--Balans view start-->	
				<div class="clear"></div>
				<div class="layer-balans left">
					<div class="layer-balans-cash">
						<div class="layer-balans-cashinfo">
							<div class="cashinfo-text">На вашем счету: <span class="tx-green-light tx-18">157 AZN</span></div>
							<span class="cashinfo-text">Номер счета: 27408</span>
						</div>
					</div>
				</div>
				<div class="layer-cash-info left">
					<div class="layer-cash-info-table p-relative">
						<div class="layer-cash-info-table-txt left">
							<span>Вывод денег с личного счета не производится</span>
						</div>
							<div class="sprite layer-cash-info-table-close left c-pointer p-absolute">
								
							</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="layer-line-after-cash">
					
				</div>
				<div class="clear"></div>
				<div class="layer-select-card">
					<div class="layer-select-card-title">
						<div class="tx-green-light left"><span class="left layer-select-card-txt">Выберете способ пополнения баланса </span>
							<div class="sprite layer-select-card-image left">
							</div> 
							<span class="layer-select-card-txt left">:</span>
						</div>
					</div>
					<div class="clear"></div>
					<div class="layer-card-type">
						<div class="layer-card-type-title left">
							<span>Платежные системы:</span>
						</div>
						<div class="layer-card-type-item">
							<div class="sprite pay-system web-money left c-pointer">
							</div>
							
							<div class="sprite pay-system yandex-money left c-pointer">
							</div>
							
							<div class="sprite pay-system pay-pal-money left c-pointer">
							</div>
							
							<div class="sprite pay-system golden-pay-money left c-pointer">
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="layer-card-type">
						<div class="layer-card-type-title left">
							<span>Терминалы:</span>
						</div>
						<div class="layer-card-type-item">
							<div class="sprite pay-system arrow-terminal left c-pointer">
							</div>
							
							<div class="sprite pay-system qiwi-terminal left c-pointer">
							</div>

						</div>
					</div>
					<div class="clear"></div>
					<div class="layer-card-type">
						<div class="layer-card-type-title left">
							<span>Пластиковы карты:</span>
						</div>
						<div class="layer-card-type-item">
							<div class="sprite pay-system master-card-money left c-pointer">
							</div>
							
							<div class="sprite pay-system visa-card-money left c-pointer">
							</div>

						</div>
					</div>
					<div class="clear"></div>
					<div class="layer-card-type">
						<div class="layer-card-type-title left">
							<span>При помощи SMS:</span>
						</div>
						<div class="layer-card-type-item">
							<div class="sprite pay-system mts-money left c-pointer">
							</div>
							
							<div class="sprite pay-system beeline-money left c-pointer">
							</div>
							
							<div class="sprite pay-system megafon-money left c-pointer">
							</div>

							<div class="sprite pay-system others-money left c-pointer">
							</div>								
						</div>
					</div>
				</div>
			</div>
			<!--Balans view end-->	
			
			<!--Voice view start-->
			<div class="tab-content hide" style="display: none;">					
				<div class="layer-resume-element">

					
					<div class="clear"></div>
					<div class="layer-voice-content tx-margin-top-15px">
						<div class="layer-person-resume">
							<div style="height: 30px;"></div>
					
							{foreach from=$reviews item=r}
							
							<div class="layer-person-element-voice-element">
								<div class="layer-perosn-info-inactives">
									<div class="layer-article-text">
										<div class="layer-voice-image right">
											{if (!$r->hasAvatar)}
											<div class="view-photo-apparate-icon-alignment review-photo-layer">
												<div class="sprite view-photo-apparate-icon"></div>
												<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px"> {$m.no_photo}</div>
											</div>
											{else}
												<div class="view-photo-apparate-icon-alignment review-photo-layer review-photo-exists-layer">
													<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px">
														<img src="{$app_url}/profile/get/avatar/100/100/{$r->avatar}" />
													</div>
												</div>
											{/if}
										</div>
										<div class="layer-personal-text left">
											<div class="layer-person-info-firstline">
												<div class="layer-personal-text-title">
													<div class="tx-margin-right-15px a-underline tx-14 tx-margin-top-10px tx-black user-review-title"><a href="{$app_url}/user{$r->userId}"><b>{$r->name}</b></a></div>
													<div class="left  tx-margin-right-15px"><span class="tx-green-light a-none-underline ">{$r->country}, {$r->city}</span></div>
													<div class="clear"></div>
													<div class="layer-voice-content-items  tx-margin-top-10px tx-margin-bottom-20px">
														<span>{$r->review}</span>
													</div>
												</div>
											</div>
											<div class="layer-person-info-secondline tx-margin-top-15px left">
												<div class="sprite layer-person-info-editb-icon left"></div>
												<div class="left tx-margin-right-5px tx-margin-top-6px"><span>{$m.published}: {$r->published}</span></div>
											</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							
							<div class="layer-line-after-cash ">
							</div>
							{/foreach}
							
							{if ($logged_in)}
							<div class="profile-add-review-container">
								<div class="profile-add-review-text">
									<textarea name="" id="profile-add-review-txt"></textarea>
								</div>
								<div class="profile-add-review-captcha-container">
									<div class="profile-add-review-captcha left" id="profile-add-review-captcha" data-src="{$app_url}/libs/kcaptcha/index.php">
										<img src="{$app_url}/libs/kcaptcha/index.php?" class="no-selection" onclick="updateCaptcha('#profile-add-review-captcha')" />
									</div>
									<div class="profile-add-review-captcha-code left">
										<input type="text" id="profile-add-review-captcha-code" />
									</div>
									<div class="clear"></div>
								</div>
								<div class="blue-button" id="profile-add-review-submit">{$m.add}</div>
							</div>
							{else}
							<div class="profile-add-review-container">
								{$m.login_for_review}
							</div>
							{/if}
							
							<div class="clear"></div>												
						</div>
						
						<div class="clear"></div>
						<!--
						<div class="navigator-voice-buttons right">
							<div class="layer-left-block-search-navigation">
								<div class="layer-left-block-search-navigation-prev left c-pointer">
									<div class="sprite layer-left-block-search-navigation-prev-img"></div>
								</div>
								<div class="layer-left-block-search-navigation-pages left">
									<div class="search-navigation-pages-left left c-pointer">
										<div class="sprite search-navigation-pages-left-img"></div>
									</div>
									<div class="search-navigation-pages-numbers  left">
										<span><a class="search-navigation-pages-numbers-list" href="#">1</a></span>
										<span><a class="search-navigation-pages-numbers-list-active" href="#">2</a></span>
										<span><a class="search-navigation-pages-numbers-list" href="#">3</a></span>
									</div>
									<div class="search-navigation-pages-right  left c-pointer">
										<div class="sprite search-navigation-pages-right-img"></div>
									</div>
								</div>
								<div class="layer-left-block-search-navigation-next left c-pointer">
									<div class="sprite layer-left-block-search-navigation-next-img"></div>
								</div>
							</div>
						</div>
						-->
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>						
			</div>
			<!--Voice view end-->
			
			
			<div class="clear"></div>
			
			<div class="tab-content hide p-relative tx-padding-top-10px" style="display: none;">
			<!--Resume view start-->
				
				
				{foreach from=$vacancies item=v}
				<div class="vacancy-item vacancy-item-big">
					<div class="vacancy-item-left left">
						<div class="vacancy-title"><a href="{$app_url}/vacancy/{$v->id}">{$v->title}</a></div>
						<div class="vacancy-description">{$v->description}</div>
						<div class="vacancy-date">{$v->date}</div>
					</div>
					<div class="vacancy-item-middle left">
						<div class="vacancy-city">{$v->country}, {$v->city}</div>
					</div>
					<div class="vacancy-item-salary left">
						{$v->salaryFrom} - {$v->salaryTo} {$v->currency}
					</div>
					<div class="vacancy-item-premium left">
						
					</div>
					<div class="clear"></div>
				</div>
				{/foreach}
				
				<div class="clear"></div>
				
			</div>
			<!--Resume view end-->
			
		</div>
	</div>
	<input type="hidden" name="csrf_key" class="csrf-token" value="{$csrf_token}" />
	</form>
{/block}