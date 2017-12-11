{extends file="base.tpl"}

{block name="content"}
	<form action="{$app_url}/profile/save" method="post" enctype="multipart/form-data">
	<input type="hidden" value="2000600" name="MAX_FILE_SIZE">
	<div class="tabs-container profile-tabs-container">
		<div class="tab-buttons-container">
			<div class="layer-right-block-list-menu">
				<div class="layer-menu-list-withresume">
					<div class="layer-menu-list-item">
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey layer-menu-list-element-active">
							<span>{$m.about_me}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.my_adv}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.balance}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.reviews}</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>{$m.resume}</span>
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
								<div>
									<br/>
									{$m.avatar}: <input type="file" name="avatar" />
								</div>
								<!--Private info for resume -->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>{$m.private_info}</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
												<div><b>{$m.name_surname}: </b><span class="editable-input">{if isset($userInfo['name'])}{$userInfo['name']}{else}{$m.empty}{/if}</span>
												<input type="text" name="name" value="{if isset($userInfo['name'])}{$userInfo['name']}{/if}" class="editable-input-own hide" /></div>
											</div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px">
												<span><b>{$m.birthday}: </b></span><span class="editable-input">{if isset($userInfo['birthday'])}{$userInfo['birthday']}{else}{$m.empty}{/if}</span>
												<input type="text" name="birthday" value="{if isset($userInfo['birthday'])}{$userInfo['birthday']}{/if}" class="editable-input-own hide date-field" />
											</div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
												<div class="profile-field-container">
													<div class="profile-field-title left">
														<b>{$m.city}: </b>
													</div>
													<div class="profile-field-own left">
														<div id="profile-country" >
															<span class="c-pointer value-element">{$cityTitle}</span>
															<input type="hidden" name="city_id" id="city_id" class="select-input" value="{if isset($userInfo['cityId'])}{$userInfo['cityId']}{/if}" />
															<input type="hidden" name="country_id" id="country_id" class="select-input" value="{if isset($userInfo['countryId'])}{$userInfo['countryId']}{/if}" />
														</div>
														<script>
															new SelectCityController("#profile-country", "#country_id", "#city_id");
														</script>
													</div>
													<div class="clear"></div>
												</div>
											</div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
												<div class="profile-field-container">
													<div class="profile-field-title left">
														<b>{$m.sex}: </b>
													</div>
													<div class="profile-field-own left">
														<div id="profile-sex" class="select-container p-relative select-inactive editable-select-own" {if isset($userInfo['sex'])}sel-val="{$userInfo['sex']}"{else}{/if}>
															<div class="selected-option p-relative c-pointer">
																<div class="selected-option-html"></div>
																<div class="select-icon select-options-icon p-absolute sprite"></div>
															</div>
															<div class="options-container hide p-absolute">
																<div class="option-item c-pointer" opt-val="0">{$m.man}</div>
																<div class="option-item c-pointer" opt-val="1">{$m.woman}</div>
															</div>
															<input type="hidden" name="sex" class="select-input" value="{if isset($userInfo['sex'])}{$userInfo['sex']}{/if}" />
														</div>
														<script>
															new SelectController('profile-sex');
														</script>
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
													<span class="editable-input">{if isset($cValues[$cType['r_id']]) && !empty($cValues[$cType['r_id']]['contactValue'])}{$cValues[$cType['r_id']]['contactValue']}{else}{$m.empty}{/if}</span>
													<input type="text" name="contact[]" value="{if isset($cValues[$cType['r_id']]) && !empty($cValues[$cType['r_id']]['contactValue'])}{$cValues[$cType['r_id']]['contactValue']}{/if}" class="editable-input-own hide" />
												</div>
												<input type="hidden" name="contact_type_id[]" value="{$cType['r_id']}" />
											{/foreach}
										</div>
									</div>	
									<!--Regards for resume-->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>{$m.wishes}</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
												<span><b>{$m.profession}: </b></span>
												<span class="editable-input">{if isset($userWishes['profession']) && !empty($userWishes['profession'])}{$userWishes['profession']}{else}{$m.empty}{/if}</span>
												<input type="text" name="profession" value="{if isset($userWishes['profession']) && !empty($userWishes['profession'])}{$userWishes['profession']}{/if}" class="editable-input-own hide" />
											</div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px">
												<span><b>{$m.salary}:</b></span>
												<span class="editable-input">{if isset($userWishes['salary']) && !empty($userWishes['salary'])}{$userWishes['salary']}{else}{$m.empty}{/if}</span>
												<input type="text" name="salary" value="{if isset($userWishes['salary']) && !empty($userWishes['salary'])}{$userWishes['salary']}{/if}" class="editable-input-own hide" />
											</div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
												<div class="profile-field-container">
													<div class="profile-field-title left">
														<b>{$m.city}: </b>
													</div>
													<div class="profile-field-own left">
														<div id="profile-wish-country" >
															<span class="c-pointer value-element">{$userWishes['city']}</span>
															<input type="hidden" name="city_wish_id" id="city_wish_id" class="select-input" value="{if isset($userWishes['cityId'])}{$userWishes['cityId']}{/if}" />
															<input type="hidden" name="country_wish_id" id="country_wish_id" class="select-input" value="{if isset($userWishes['countryId'])}{$userWishes['countryId']}{/if}" />
														</div>
														<script>
															new SelectCityController("#profile-wish-country", "#country_wish_id", "#city_wish_id");
														</script>
													</div>
													<div class="clear"></div>
												</div>
											</div>
										</div>
									</div>	
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
							<div class="resume-person-profession-title">
								<div class="resume-person-profession-title-item tx-green-light tx-14"><span>{$m.prof_knoledge}</span></div>
							</div>
							<div class="resume-person-profession-content tx-margin-top-6px">
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>{$m.education}:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['education']) && !empty($userInfo['education'])}{$userInfo['education']}{else}{$m.empty}{/if}</span>
											<textarea class="editable-textarea-own hide" name="education">{if isset($userInfo['education']) && !empty($userInfo['education'])}{$userInfo['education']}{else}{$m.empty}{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>{$m.courses}:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['courses']) && !empty($userInfo['courses'])}{$userInfo['courses']}{else}{$m.empty}{/if}</span>
											<textarea class="editable-textarea-own hide" name="courses">{if isset($userInfo['courses']) && !empty($userInfo['courses'])}{$userInfo['courses']}{else}{$m.empty}{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>{$m.skills}:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['skills']) && !empty($userInfo['skills'])}{$userInfo['skills']}{else}{$m.empty}{/if}</span>
											<textarea class="editable-textarea-own hide" name="skills">{if isset($userInfo['skills']) && !empty($userInfo['skills'])}{$userInfo['skills']}{else}{$m.empty}{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>{$m.about}:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['about']) && !empty($userInfo['about'])}{$userInfo['about']}{else}{$m.empty}{/if}</span>
											<textarea class="editable-textarea-own hide" name="about">{if isset($userInfo['about']) && !empty($userInfo['about'])}{$userInfo['about']}{else}{$m.empty}{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="layer-line-after-cash">
						</div>
						<div class="clear"></div>
						
						<div class="layer-resume-person-experience">
							<div class="resume-person-profession-title">
								<div class="resume-person-profession-title-item tx-green-light tx-14"><span>{$m.w_experience}</span></div>
							</div>
							{foreach from=$userExperience item=exp}
							<div class="profile-experience" data-id="{$exp['id']}">
								<div class="remove-experience"><div class="sprite layer-person-info-delete-icon"></div></div>
								<div class="experience-top">
									<div class="experience-company left">“{$exp['company']}”</div>
									<div class="experience-title left">{$exp['profession']}</div>
									<div class="experience-start left">{$exp['dateStart']}</div>
									<div class="experience-date-splitter left">-</div>
									<div class="experience-end left">{$exp['dateEnd']}</div>
									<div class="clear"></div>
								</div>
								<div class="experience-bottom">
									<span class="exp-bottom-title">{$m.work}:</span>{$exp['description']}
								</div>
								<div class="clear"></div>
							</div>
							{/foreach}
							<div id="profile-experiences-container"></div>
							
							<div id="add-experience" class="blue-button">{$m.add}</div>
						</div>
						
						<div class="layer-line-after-cash">
						</div>
						<div class="clear"></div>
						
					</div>						
			
			
					<div class="layer-resume-person-button-big">
						<div class="left">
							<input type="submit" value="Сохранить" name="save_profile" class="blue-button-input">
						</div>
						<div class="clear"></div>
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
												<div class="left a-underline tx-margin-right-10px tx-margin-top-15px"><span class="show-on-map c-pointer" data-map="{$adv->map}">{$m.adv_on_map}</span></div>
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
					<div class="advertisement-action-buttons">
						<div class="left advertisement-action-button">
							<div class="blue-button">
								<div class="left advertisement-action-button-title"><a href="{$app_url}/advertisement/edit/{$adv->tableId}/{$adv->recordId}">{$m.edit}</a></div>
								<div class="left advertisement-action-button-icon"><div class="sprite layer-person-info-editb-icon"></div></div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="left advertisement-action-button">
							<div class="blue-button">
								<div class="left advertisement-action-button-title"><a href="{$app_url}/advertisement/publish/{$adv->tableId}/{$adv->recordId}">{$m.publish}</a></div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="left advertisement-action-button">
							<div class="blue-button">
								<div class="left advertisement-action-button-title"><a href="{$app_url}/advertisement/remove/{$adv->tableId}/{$adv->recordId}">{$m.remove}</a></div>
								<div class="left advertisement-action-button-icon"><div class="sprite layer-person-info-delete-icon"></div></div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
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
												<div class="user-review-buttons">
													{if (!$r->enabled)}
														<div class="user-review-button left enable-review c-pointer blue-button" data-id="{$r->id}">{$m.enable}</div>
													{/if}
													<div class="user-review-button left remove-review c-pointer blue-button" data-id="{$r->id}">{$m.remove}</div>
													<div class="clear"></div>
												</div>
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
						<div class="layer-line-after-cash">
						</div>
						<div class="clear"></div>
					</div>						
			
			</div>
			<!--Voice view end-->
			
			
			<div class="clear"></div>
			
			<div class="tab-content hide p-relative tx-padding-top-10px" style="display: none;">
				{if ($resumeExists)}
					<div class="resume-fieldset">
						<fieldset>
						<legend>{$m.common_info}</legend>
						{$resume['info']}
						</fieldset>
					</div>
					{if (count($resume['files']))}
					<div class="resume-fieldset">
					<fieldset>
						<legend>{$m.resume_files}</legend>
						{foreach from=$resume['files'] item=f}
							<div>
								<a href="{$public_url}/advertisement/resume/{$f['file']}" target="_blank" >{$f['file']}</a>
							</div>
						{/foreach}
					</fieldset>
					</div>
					{/if}
					<div class="resume-fieldset">
					<fieldset>
					<legend>{$m.contact_info}</legend>
					{$resume['contact']}
					</fieldset>
					</div>
					<div class="resume-fieldset">
					<fieldset>
					<legend>{$m.main_info}</legend>
					{$resume['main']}
					</fieldset>
					</div>
					{if (count($resume['lastWorks']))}
						<div class="resume-fieldset">
						<fieldset>
						<legend>{$m.last_works}</legend>
						{foreach from=$resume['lastWorks'] item=lw}
						<div class="lw-item-container lw-item-container-readonly" data-id="{$lw['id']}">
							<input type="hidden" name="lwId[]" value="{$lw['id']}" />
							<div class="last-work-left left">
								<div class="lw-field">
									<div class="lw-field-title left">{$m.company}</div>
									<div class="lw-field-own left">
										{$lw['lwCompany']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title left">{$m.country}</div>
									<div class="lw-field-own left">
										{$lw['lwCountry']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title left">{$m.city}</div>
									<div class="lw-field-own left">
										{$lw['lwCity']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title left">{$m.address}</div>
									<div class="lw-field-own left">
										{$lw['lwAddress']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title left">{$m.phone}</div>
									<div class="lw-field-own left">
										{$lw['lwPhone']}
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="last-work-right right">
								<div class="lw-field lw-field-long">
									<div class="lw-field-title left">{$m.sphere}</div>
									<div class="lw-field-own left">
										{$lw['lwOrgSphere']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-title left">{$m.profession}</div>
									<div class="lw-field-own left">
										{$lw['lwOrgProfession']}
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="lw-field-title">{$m.work_period}</div>
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.work_period_start}</div>
											{$lw['lwWorkStart']}
										</div>
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.work_period_end}</div>
											{$lw['lwWorkEnd']}
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.dis_reason}</div>
											{$lw['lwDismissal']}
										</div>
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.prof_resp}</div>
											{$lw['lwLastProf']}
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.work_result}</div>
											{$lw['lwWorkResult']}
										</div>
										<div class="left lw-date lw-small-field">
											<div class="lw-field-title">{$m.core_skills}</div>
											{$lw['lwWorkResultMain']}
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						{/foreach}
						</fieldset>
						</div>
					{/if}
					<div class="edit-resume-button"><a href="{$app_url}/resume/edit"><div class="blue-button">edit</div></a></div>
				{else}
				<a href="{$app_url}/resume/add">add resume</a>
				{/if}
				
			</div>
			<!--Resume view end-->
			
		</div>
	</div>
	<input type="hidden" name="csrf_key" class="csrf-token" value="{$csrf_token}" />
	</form>
{/block}