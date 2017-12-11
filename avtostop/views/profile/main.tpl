{extends file="base.tpl"}

{block name="content"}
	<form action="{$app_url}/profile/save" method="post">
	<div class="tabs-container profile-tabs-container">
		<div class="tab-buttons-container">
			<div class="layer-right-block-list-menu">
				<div class="layer-menu-list-withresume">
					<div class="layer-menu-list-item">
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey layer-menu-list-element-active">
							<span>Информация обо мне</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>Мои обьявления</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>Баланс</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>Отзывы</span>
						</div>
						<div class="layer-menu-list-element left tab-button a-none-underline c-pointer tx-grey">
							<span>Резюме</span>
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
							
							</div>
							<div class="layer-resume-person-title-description left">
								<div class="resume-person-title-tables left">
								<!--Private info for resume -->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Личная информация</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
												<div><b>Фамилия, имя: </b><span class="editable-input">{if isset($userInfo['name'])}{$userInfo['name']}{else}#empty{/if}</span>
												<input type="text" name="name" value="{if isset($userInfo['name'])}{$userInfo['name']}{/if}" class="editable-input-own hide" /></div>
											</div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px">
												<span><b>Дата рождения: </b></span><span class="editable-input">{if isset($userInfo['birthday'])}{$userInfo['birthday']}{else}#empty{/if}</span>
												<input type="text" name="birthday" value="{if isset($userInfo['birthday'])}{$userInfo['birthday']}{/if}" class="editable-input-own hide" />
											</div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
												<div class="profile-field-container">
													<div class="profile-field-title left">
														<b>Город: </b>
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
														<b>Пол: </b>
													</div>
													<div class="profile-field-own left">
														<div id="profile-sex" class="select-container p-relative select-inactive editable-select-own" {if isset($userInfo['sex'])}sel-val="{$userInfo['sex']}"{else}{/if}>
															<div class="selected-option p-relative c-pointer">
																<div class="selected-option-html"></div>
																<div class="select-icon select-options-icon p-absolute sprite"></div>
															</div>
															<div class="options-container hide p-absolute">
																<div class="option-item c-pointer" opt-val="0">Мужской</div>
																<div class="option-item c-pointer" opt-val="1">Женский</div>
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
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Контакты</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											{foreach from=$cTypes item=cType}
												<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
													<span><b>{$cType['cTitle']}: </b></span>
													<span class="editable-input">{if isset($cValues[$cType['r_id']]) && !empty($cValues[$cType['r_id']]['contactValue'])}{$cValues[$cType['r_id']]['contactValue']}{else}#empty{/if}</span>
													<input type="text" name="contact[]" value="{if isset($cValues[$cType['r_id']]) && !empty($cValues[$cType['r_id']]['contactValue'])}{$cValues[$cType['r_id']]['contactValue']}{/if}" class="editable-input-own hide" />
												</div>
												<input type="hidden" name="contact_type_id[]" value="{$cType['r_id']}" />
											{/foreach}
										</div>
									</div>	
									<!--Regards for resume-->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Пожелания</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px">
												<span><b>Должность: </b></span>
												<span class="editable-input">{if isset($userWishes['profession']) && !empty($userWishes['profession'])}{$userWishes['profession']}{else}#empty{/if}</span>
												<input type="text" name="profession" value="{if isset($userWishes['profession']) && !empty($userWishes['profession'])}{$userWishes['profession']}{/if}" class="editable-input-own hide" />
											</div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px">
												<span><b>Заработная плата:</b></span>
												<span class="editable-input">{if isset($userWishes['salary']) && !empty($userWishes['salary'])}{$userWishes['salary']}{else}#empty{/if}</span>
												<input type="text" name="salary" value="{if isset($userWishes['salary']) && !empty($userWishes['salary'])}{$userWishes['salary']}{/if}" class="editable-input-own hide" />
											</div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px">
												<div class="profile-field-container">
													<div class="profile-field-title left">
														<b>Город: </b>
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
								<div class="resume-person-profession-title-item tx-green-light tx-14"><span>Проф.знания</span></div>
							</div>
							<div class="resume-person-profession-content tx-margin-top-6px">
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>Образование:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['education']) && !empty($userInfo['education'])}{$userInfo['education']}{else}#empty{/if}</span>
											<textarea class="editable-textarea-own hide" name="education">{if isset($userInfo['education']) && !empty($userInfo['education'])}{$userInfo['education']}{else}#empty{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>Курсы:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['courses']) && !empty($userInfo['courses'])}{$userInfo['courses']}{else}#empty{/if}</span>
											<textarea class="editable-textarea-own hide" name="courses">{if isset($userInfo['courses']) && !empty($userInfo['courses'])}{$userInfo['courses']}{else}#empty{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>Навыки:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['skills']) && !empty($userInfo['skills'])}{$userInfo['skills']}{else}#empty{/if}</span>
											<textarea class="editable-textarea-own hide" name="skills">{if isset($userInfo['skills']) && !empty($userInfo['skills'])}{$userInfo['skills']}{else}#empty{/if}</textarea>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="profession-content-education">
									<div class="profile-field-container">
										<div class="profile-field-title profile-field-title-textarea left">
											<span>О себе:</span>
										</div>
										<div class="profile-field-own profile-field-own-textarea left">
											<span class="editable-textarea">{if isset($userInfo['about']) && !empty($userInfo['about'])}{$userInfo['about']}{else}#empty{/if}</span>
											<textarea class="editable-textarea-own hide" name="about">{if isset($userInfo['about']) && !empty($userInfo['about'])}{$userInfo['about']}{else}#empty{/if}</textarea>
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
								<div class="resume-person-profession-title-item tx-green-light tx-14"><span>Опыт работы</span></div>
							</div>
							<div class="profile-experience">
								<div class="experience-top">
									<div class="experience-company left">“НПЗ Монолит”</div>
									<div class="experience-title left">Главный архитектор, строитель</div>
									<div class="experience-start left">с 11 января 2006 г.</div>
									<div class="experience-end left">15 декабря 2007 г.</div>
									<div class="clear"></div>
								</div>
								<div class="experience-bottom">
									Обязанности: разработка эскиз-проектов нефтезавода.
								</div>
								<div class="clear"></div>
							</div>
							<div class="profession-content-experienca">
								<div class="profession-content-experienca-title tx-line-height-20px"><b>“НПЗ Монолит” </b>
									<span class="profession-content-experienca-name tx-yellow"><b> Главный архитектор, строитель </b></span>
									<span class="profession-content-experienca-date tx-green-light">с 11 января 2006 г. по 15 декабря 2007 г.</span>
								</div>
								<div>
									<div class="profession-content-courses"><span class="tx-line-height-20px"><b>Обязанности: </b>разработка эскиз-проектов нефтезавода.</span></div>							
								</div>
							</div>

							<div class="clear"></div>
							
							<div class="profession-content-experienca">
								<div class="profession-content-experienca-title tx-line-height-20px"><b>“НПЗ Монолит” </b>
									<span class="profession-content-experienca-name tx-yellow"><b> Главный архитектор, строитель </b></span>
									<span class="profession-content-experienca-date tx-green-light">с 11 января 2006 г. по 15 декабря 2007 г.</span>
								</div>
								<div>
									<div class="profession-content-courses"><span class="tx-line-height-20px"><b>Обязанности: </b>разработка эскиз-проектов нефтезавода.</span></div>							
								</div>
							</div>
							
							<div class="clear"></div>
							
							<div class="profession-content-experienca">
								<div class="profession-content-experienca-title tx-line-height-20px"><b>“НПЗ Монолит” </b>
									<span class="profession-content-experienca-name tx-yellow"><b> Главный архитектор, строитель </b></span>
									<span class="profession-content-experienca-date tx-green-light">с 11 января 2006 г. по 15 декабря 2007 г.</span>
								</div>
								<div>
									<div class="profession-content-courses"><span class="tx-line-height-20px"><b>Обязанности: </b>разработка эскиз-проектов нефтезавода.</span></div>							
								</div>
							</div>
							
							<div class="clear"></div>
							
							<div class="profession-content-experienca">
								<div class="profession-content-experienca-title tx-line-height-20px"><b>“НПЗ Монолит” </b>
									<span class="profession-content-experienca-name tx-yellow"><b> Главный архитектор, строитель </b></span>
									<span class="profession-content-experienca-date tx-green-light">с 11 января 2006 г. по 15 декабря 2007 г.</span>
								</div>
								<div>
									<div class="profession-content-courses"><span class="tx-line-height-20px"><b>Обязанности: </b>разработка эскиз-проектов нефтезавода.</span></div>							
								</div>
							</div>
							
						</div>
						
						<div class="layer-line-after-cash">
						</div>
						<div class="clear"></div>
						
						<div class="layer-resume-person-buttons">
							<div class="layer-resume-person-button-items">
								<span class="a-underline tx-margin-right-40px tx-green-light c-pointer">Вернутся к списку резюме</span>
								<span class="a-underline tx-margin-right-15px tx-green-light c-pointer">Отменить</span>
								<span class="a-underline tx-margin-right-15px tx-green-light c-pointer">Удалить</span>
							</div>
							<div class="clear"></div>
							<div class="layer-resume-person-button-content">
								<div class="layer-resume-person-button-content-txt left"><span>Подтверждаю свое согласие с условиями работы сайтом</span></div>
								<div class="layer-resume-person-button-content-txt2 left">
									<div>
										<div id="public" class="tx-margin-right-15px left sprite check-box-unchecked"></div>
										<div class="left layer-resume-person-button-content-txt2-item"><span>Предварительный просмотр</span></div>
									</div>
								</div>

								
							</div>
							<div class="clear"></div>
						</div>
					</div>						
			
			<!--About myself end-->
			</div>
			<div class="tab-content hide" style="display: none;">
				{foreach from=$myAdvertisements item=adv}
				<div class="layer-person-resume tx-margin-bottom-20px">
					<div class="layer-person-elemet-premium advertisement-list-item">
						<div class="layer-perosn-info">
							{if $adv->premium}
							<div class="layer-premium-button right"><span class="tx-white"><i>Premium</i></span></div>
							{/if}
							{if $adv->quickly}
							<div class="layer-fast-button right"><span class="tx-white"><i>Срочно</i></span></div>
							{/if}
							<div class="layer-last-days-search-page right tx-margin-right-15px"><span>истекает через {$adv->timeLeft} дня!</span></div>
							
							<div class="layer-breadcumb tx-green-light">
								<ul>
									<li class="layer-bredcumbs-links"><a class="tx-green-light tx-margin-right-5px" href="#">Категории </a><span class="tx-margin-right-5px">&raquo;</span></li>
									{foreach from=$adv->categoryPath item=p name=categoryPathF}
									<li class="layer-bredcumbs-links"><a class="tx-green-light tx-margin-right-5px" href="#">{$p['title']}</a> {if (!$smarty.foreach.categoryPathF.last)} <span class="tx-margin-right-5px">&raquo;</span>{/if}</li>
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
												<div class="left a-underline tx-margin-right-10px tx-margin-top-15px"><a class=" tx-green-light " href="#"><span>на карте</span></a></div>
												{/if}
												{if ($adv->fromNewspaper)}
												<div class="tx-grey  layer-yellow-button-magazine left tx-margin-right-10px  tx-14 tx-margin-top-10px"><b>Газета</b></div>
												{/if}
												{if ($adv->hasPrice)}
												<div class="tx-green-light  layer-yellow-button-cash left tx-14 tx-margin-top-10px"><b>{$adv->price} {$adv->currency}</b></div>
												{/if}
												
											</div>	
											<div class="clear"></div>
										</div>
										<div class="a-underline tx-14"><span><b>{$adv->title}</b></span></div>
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
																<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px">Без фото</div>
																{else}
																<div class="advertisement-list-item-image">
																	<img src="{$public_url}/advertisement/images/{$adv->images[0]['image']}" />
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
											<div class="left tx-margin-top-6px"><span>Опубликовано: {$adv->published}</span></div>
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
						<a class="blue-button" href="{$app_url}/advertisement/edit/{$adv->tableId}/{$adv->recordId}">edit</a>
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
						<div class="layer-resume-person-title">
							<div class="layer-resume-person-title-photo left">
							
							</div>
							<div class="layer-resume-person-title-description left">
								<div class="resume-person-title-tables left">
								<!--Private info for resume -->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Личная информация</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px"><span><b>Фамилия, имя: </b>Мария</span></div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px"><span><b>Возвраст: </b>27 лет</span></div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px"><span><b>Город: </b>Азербайджан</span></div>
										</div>
									</div>
									<!--Contacts for resume -->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Контакты</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px"><span><b>Телефон: </b>050-502-59-98</span></div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px"><span><b>E-mail: </b>mariya@mail.ru</span></div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px"><span><b>Icq: </b>123er123</span></div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px"><span><b>Skype: </b>qwe123Q</span></div>
										</div>
									</div>	
									<!--Regards for resume-->
									<div class="resume-person-title-tables-left left">
										<div class="resume-person-title-tables-left-title">
											<div class="resume-person-title-tables-left-title-item tx-green-light"><span>Пожелания</span></div>
										</div>
										<div class="resume-person-title-tables-left-content">
											<div class="resume-person-title-tables-left-content-name tx-margin-top-6px"><span><b>Должность: </b>Cleaner</span></div>
											<div class="resume-person-title-tables-left-content-age tx-margin-top-6px"><span><b>Заработная плата: </b>50 000 AZN</span></div>
											<div class="resume-person-title-tables-left-content-city tx-margin-top-6px"><span><b>Город: </b>Баку</span></div>
										</div>
									</div>										
								</div>
								<div class="clear"></div>
								<div class="resume-person-horizontal-buttons">
									<div class="resume-buttons-horizontal-resumdoc left">
										<div id="public" class="tx-margin-right-15px left sprite check-box-unchecked"></div>

									</div>
									<div class="resume-buttons-horizontal-resumdoc-title left tx-green-light tx-14 a-underline c-pointer"><span>Resume.doc</span></div>
									<div class="resume-buttons-horizontal-resumlist left">
										<div class="sprite resume-buttons-horizontal-resumlist-item tx-margin-top-6px">
										</div>
									</div>
									<div class="resume-buttons-horizontal-addfile left tx-green-light a-underline c-pointer"><span>Прикрепить файл</span></div>
								</div>
							</div>
						</div>
						
						<div class="clear"></div>
						<div class="layer-voice-content tx-margin-top-15px">
							<div class="layer-person-resume">
									<div class="layer-person-element-voice-element">
										<div class="layer-perosn-info-inactives">
											<div class="layer-article-text">
												<div class="layer-voice-image right">
													<div class="view-photo-apparate-icon-alignment">
														<div class="sprite view-photo-apparate-icon"></div>
														<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px"> Без фото</div>
													</div>	
												</div>
												<div class="layer-personal-text">
													<div class="layer-person-info-firstline">
														<div class="layer-personal-text-title">
															<div class="tx-margin-right-15px a-underline tx-14 tx-margin-top-10px tx-black"><span><b>Мамедов Али</b></span></div>
															<div class="left  tx-margin-right-15px"><span class="tx-green-light a-none-underline ">Азербайджан, Баку</span></div>
														</div>
														
														<div class="layer-voice-content-items left  tx-margin-top-10px tx-margin-bottom-20px">
															<span>на срочной продаже 2-комн. с дизайнерским евроремонтом. остается кухонный гарнитур, посудомоечная машина и машинка-автомат. Материалами! эксклюзивное. посудомоечная машина и машинка-автомат. материалами...  </span>
														</div>
													</div>
													<div class="layer-person-info-secondline tx-margin-top-15px left">
														<div class="sprite layer-person-info-editb-icon left"></div>
														<div class="left tx-margin-right-5px tx-margin-top-6px"><span>Опубликовано: 11 июня</span></div>
													</div>
												</div>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									
									<div class="layer-line-after-cash ">
									</div>
									
									<div class="clear"></div>
									<div class="layer-person-element-voice-element ">
										<div class="layer-perosn-info-inactives">
											<div class="layer-article-text">
												<div class="layer-voice-image right">
													<div class="view-photo-apparate-icon-alignment">
														<div class="sprite view-photo-apparate-icon"></div>
														<div class="layer-view-title-for-photo tx-margin-top-10px tx-margin-left-5px"> Без фото</div>
													</div>	
												</div>
												<div class="layer-personal-text">
													<div class="layer-person-info-firstline">
														<div class="layer-personal-text-title">
															<div class="tx-margin-right-15px a-underline tx-14 tx-margin-top-10px tx-black"><span><b>Мамедов Али</b></span></div>
															<div class="left  tx-margin-right-15px"><span class="tx-green-light a-none-underline ">Азербайджан, Баку</span></div>
														</div>
														
														<div class="layer-voice-content-items left  tx-margin-top-10px tx-margin-bottom-20px">
															<span>на срочной продаже 2-комн. с дизайнерским евроремонтом. остается кухонный гарнитур, посудомоечная машина и машинка-автомат. Материалами! эксклюзивное. посудомоечная машина и машинка-автомат. материалами...  </span>
														</div>
													</div>
													<div class="layer-person-info-secondline tx-margin-top-15px left">
														<div class="sprite layer-person-info-editb-icon left"></div>
														<div class="left tx-margin-right-5px tx-margin-top-6px"><span>Опубликовано: 11 июня</span></div>
													</div>
												</div>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>												
							</div>
							
							<div class="clear"></div>
							
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
							<div class="clear"></div>
						</div>
						<div class="layer-line-after-cash">
						</div>
						<div class="clear"></div>
						
						<div class="layer-resume-person-buttons">
							<div class="layer-resume-person-button-items">
								<span class="a-underline tx-margin-right-40px tx-green-light c-pointer">Вернутся к списку резюме</span>
								<span class="a-underline tx-margin-right-15px tx-green-light c-pointer">Отменить</span>
								<span class="a-underline tx-margin-right-15px tx-green-light c-pointer">Удалить</span>
							</div>
							<div class="clear"></div>
							<div class="layer-resume-person-button-content">
								<div class="layer-resume-person-button-content-txt left"><span>Подтверждаю свое согласие с условиями работы сайтом</span></div>
								<div class="layer-resume-person-button-content-txt2 left">
									<div>
										<div id="public" class="tx-margin-right-15px left sprite check-box-unchecked"></div>
										<div class="left layer-resume-person-button-content-txt2-item"><span>Предварительный просмотр</span></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>						
			
			</div>
			<!--Voice view end-->
			
			
			<div class="clear"></div>
			
			<div class="tab-content hide p-relative tx-padding-top-10px" style="display: none;">
			<!--Resume view start-->
				<div class="layer-person-resume">
						<div class="layer-person-elemet">
							<div class="layer-perosn-info">
								<div class="layer-person-image left">
								
								</div>
								<div class="layer-person-info-firstline">
									<div class="left a-underline tx-margin-right-15px"><a class=" tx-green-light " href="#"><span>Архитектор</span></a></div>
									<div class="left tx-margin-right-15px"><span>17 июля</span></div>
									<div class="sprite layer-image-refresh left c-pointer"></div>
									<div class="left tx-margin-right-15px tx-grey"><span><a class="a-none-underline tx-grey" href="#">Просмотров 56</a></span></div>
								</div>
								<div class="layer-person-info-secondline left">
									<div><span class="a-dotted left tx-margin-right-15px c-pointer">В выборочном доступе</span></div>
									<div class="left tx-margin-right-15px"><span>Отклики +11</span></div>
									<div class="left tx-margin-right-15px"><span><a class="a-none-underline tx-grey" href="#">История</a></span></div>
								</div>
							</div>
							<div class="clear"></div>
							<div class="layer-person-button">
								
								<div class="layer-person-info-editb left c-pointer">
									<div class="layer-person-info-editb-title left">Редактировать</div>
									<div class="sprite layer-person-info-editb-icon left"></div>
								</div>
								<div class="layer-person-info-deleteb left c-pointer">
									<div class="sprite layer-person-info-delete-icon left"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
				</div>	
				<div class="layer-person-resume">
					<div class="layer-person-elemet">
						<div class="layer-perosn-info">
							<div class="layer-person-image left">
							
							</div>
							<div class="layer-person-info-firstline">
								<div class="left a-underline tx-margin-right-15px"><a class=" tx-green-light " href="#"><span>Архитектор</span></a></div>
								<div class="left tx-margin-right-15px"><span>17 июля</span></div>
								<div class="sprite layer-image-refresh left c-pointer"></div>
								<div class="left tx-margin-right-15px tx-grey"><span><a class="a-none-underline tx-grey" href="#">Просмотров 56</a></span></div>
							</div>
							<div class="layer-person-info-secondline left">
								<div><span class="a-dotted left tx-margin-right-15px c-pointer">В выборочном доступе</span></div>
								<div class="left tx-margin-right-15px"><span>Отклики +11</span></div>
								<div class="left tx-margin-right-15px"><span><a class="a-none-underline tx-grey" href="#">История</a></span></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="layer-person-button">
							
							<div class="layer-person-info-editb left c-pointer">
								<div class="layer-person-info-editb-title left">Редактировать</div>
								<div class="sprite layer-person-info-editb-icon left"></div>
							</div>
							<div class="layer-person-info-deleteb left c-pointer">
								<div class="sprite layer-person-info-delete-icon left"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
				<div class="layer-person-resume">
					<div class="layer-person-elemet">
						<div class="layer-perosn-info">
							<div class="layer-person-image left">
							
							</div>
							<div class="layer-person-info-firstline">
								<div class="left a-underline tx-margin-right-15px"><a class=" tx-green-light " href="#"><span>Архитектор</span></a></div>
								<div class="left tx-margin-right-15px"><span>17 июля</span></div>
								<div class="sprite layer-image-refresh left c-pointer"></div>
								<div class="left tx-margin-right-15px tx-grey"><span><a class="a-none-underline tx-grey" href="#">Просмотров 56</a></span></div>
							</div>
							<div class="layer-person-info-secondline left">
								<div><span class="a-dotted left tx-margin-right-15px c-pointer">В выборочном доступе</span></div>
								<div class="left tx-margin-right-15px"><span>Отклики +11</span></div>
								<div class="left tx-margin-right-15px"><span><a class="a-none-underline tx-grey" href="#">История</a></span></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="layer-person-button">
							
							<div class="layer-person-info-editb left c-pointer">
								<div class="layer-person-info-editb-title left">Редактировать</div>
								<div class="sprite layer-person-info-editb-icon left"></div>
							</div>
							<div class="layer-person-info-deleteb left c-pointer">
								<div class="sprite layer-person-info-delete-icon left"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="layer-person-resume">
					<div class="layer-person-elemet">
						<div class="layer-perosn-info">
							<div class="layer-person-image left">
							
							</div>
							<div class="layer-person-info-firstline">
								<div class="left a-underline tx-margin-right-15px"><a class=" tx-green-light " href="#"><span>Архитектор</span></a></div>
								<div class="left tx-margin-right-15px"><span>17 июля</span></div>
								<div class="sprite layer-image-refresh left c-pointer"></div>
								<div class="left tx-margin-right-15px tx-grey"><span><a class="a-none-underline tx-grey" href="#">Просмотров 56</a></span></div>
							</div>
							<div class="layer-person-info-secondline left">
								<div><span class="a-dotted left tx-margin-right-15px c-pointer">В выборочном доступе</span></div>
								<div class="left tx-margin-right-15px"><span>Отклики +11</span></div>
								<div class="left tx-margin-right-15px"><span><a class="a-none-underline tx-grey" href="#">История</a></span></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="layer-person-button">
							
							<div class="layer-person-info-editb left c-pointer">
								<div class="layer-person-info-editb-title left">Редактировать</div>
								<div class="sprite layer-person-info-editb-icon left"></div>
							</div>
							<div class="layer-person-info-deleteb left c-pointer">
								<div class="sprite layer-person-info-delete-icon left"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="layer-person-resume">
					<div class="layer-person-elemet">
						<div class="layer-perosn-info">
							<div class="layer-person-image left">
							
							</div>
							<div class="layer-person-info-firstline">
								<div class="left a-underline tx-margin-right-15px"><a class=" tx-green-light " href="#"><span>Архитектор</span></a></div>
								<div class="left tx-margin-right-15px"><span>17 июля</span></div>
								<div class="sprite layer-image-refresh left c-pointer"></div>
								<div class="left tx-margin-right-15px tx-grey"><span><a class="a-none-underline tx-grey" href="#">Просмотров 56</a></span></div>
							</div>
							<div class="layer-person-info-secondline left">
								<div><span class="a-dotted left tx-margin-right-15px c-pointer">В выборочном доступе</span></div>
								<div class="left tx-margin-right-15px"><span>Отклики +11</span></div>
								<div class="left tx-margin-right-15px"><span><a class="a-none-underline tx-grey" href="#">История</a></span></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="layer-person-button">
							
							<div class="layer-person-info-editb left c-pointer">
								<div class="layer-person-info-editb-title left">Редактировать</div>
								<div class="sprite layer-person-info-editb-icon left"></div>
							</div>
							<div class="layer-person-info-deleteb left c-pointer">
								<div class="sprite layer-person-info-delete-icon left"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="layer-new-resume p-absolute">
					<div class="layer-new-resume-title">
					
						<div class="layer-title-resume"><span><a class="tx-green-light a-underline" href="">Хотите создать еще резюме?</a></span></div><br>
						<div class="sprite layer-person-info-questb-icon left"></div>
						<div class="layer-person-info-editb left c-pointer">
							<div class="sprite layer-person-info-plusb-icon left"></div>
							<div class="layer-person-info-plusb-title left">Добавить резюме</div>
						</div>
					</div>
				</div>	
			</div>
			<!--Resume view end-->
			
			<div class="layer-resume-person-button-big">
				<div class="left">
					<input type="submit" value="Сохранить" name="save_profile" class="blue-button">
				</div>
				<div class="clear"></div>
				<br>
				<input type="button" value="Опубликовать" class="send-article c-pointer">
			</div>
			
		</div>
	</div>
	<input type="hidden" name="csrf_key" class="csrf-token" value="{$csrfKey}" />
	</form>
{/block}