<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>AGClub.az {block name="page-title"}{/block}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet/less" type="text/css" href="{$app_url}/static/stylesheets/styles.less" />
		<link rel="shortcut icon" href="{$app_url}/static/img/favicon.ico" type="image/x-icon" />
		<script src="{$static_url}/js/less.js"></script>
		<script>
			var appData = {
				url: '{$app_url}',
				lang: '{$currentLang}',
				regSubmitUrl: '{$app_url}/{$currentLang}/registration',
				loginSubmitUrl: '{$app_url}/{$currentLang}/login',
				horoscopeSubmitUrl: '{$app_url}/{$currentLang}/horoscope/',
				objectsListUrl: '{$app_url}/{$currentLang}/objects/list/',
				objectsGetDiscountUrl: '{$app_url}/{$currentLang}/objects/getdiscount/',
				addCommentUrl: '{$app_url}/{$currentLang}/news/add/comment/',
				callToBankUrl: '{$app_url}/{$currentLang}/callto/addorder',
				getMapUrl: '{$app_url}/getmap',
				addRatingUrl: '{$app_url}/addrating',
				urls: {
					lostPswUrl: '{$app_url}/{$currentLang}/lostpsw',
				}
			}
			var Lang = [];
			Lang['user_exists'] = '{$messages.notices.user_exists}';
			Lang['wrong_data'] = '{$messages.notices.wrong_filled_fields}';
			Lang['reg_success'] = '{$messages.notices.reg_success}';
			Lang['wrong_login'] = '{$messages.notices.login_error}';
			Lang['horoscope_error'] = '{$messages.notices.horoscope_error}';
			Lang['comment_add_error'] = '{$messages.notices.comment_error}';
			Lang['show_map'] = '{$messages.common.show_map}';
			Lang['choose_obj'] = '{$messages.common.choose_obj}';
			Lang['lpw_title'] = '{$messages.auth.restore_psw}';
		</script>
		<script src="{$static_url}/js/actions.js"></script>
		<!--[if lt IE 9]>
			<style>
				body, html {
					min-width: 1000px;
				}
				.font27 {
					font-size: 23px;
				}
				.font33 {
					font-size: 27px;
				}
			</style>
		<![endif]-->
	</head>
	<body onresize="App.onResize();">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div class="main-wrapper">
			<div class="center-container">
				<!-- header -->
				<div id="header">
					<div id="logo-container">
						<a href="{$app_url}/{$currentLang}"><img src="{$static_url}/img/logo.png" /></a>
					</div>
					<div id="header-info-container" class="hide-in-767">
						<div id="info-links">
							<div class="info-left-link relative" style="margin-right: 2%;">
								<a href="//www.facebook.com/AGClub.AGBank" target="_blank"><img src="{$static_url}/img/fb-icon.png" style="width: 80%;" /></a>
							</div>
							<div class="info-left-link relative">
								<img src="{$static_url}/img/call-icon-{$currentLang}.png" />
							</div>
							<div class="info-right-link">
								<a href="javascript:void(0);" class="font16 show-block" block-identifier=".call-to-bank-block">{$messages.common.order_call}</a>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- header end -->
				<!-- lang in 767 -->
				<div id="lang-in-767">
					<ul>
						{foreach from=$languages item=lang key=langIso}
							{if $langIso == $currentLang}
								<li><span class="lang-767-active font15" >{$langIso|upper}</span></li>
							{else}
								<li><a href="{$app_url}/{$langIso}/{$langUrl}" class="font15" >{$langIso|upper}</a></li>
							{/if}
						{/foreach}
					</ul>
				</div>
				<!-- lang in 767 end -->
				
				<!-- menu in 767 -->
				<div id="menu-in-767" class="show-in-767">
					<div class="left-side">
						<div class="menu-item-title"><a href="#" class="font15">{$messages.common.menu}</a></div>
						<div class="dd-menu-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
						<div class="clear"></div>
					</div>
					<div class="right-side">
						<div class="right-side-left"><img src="{$static_url}/img/registration-icon.png" class="hide-in-479" /></div>
						<div class="right-side-right"><a href="javascript:void(0);" class="font15" id="reg-in-1-column-mode">{$messages.common.registration}</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="menu-content hide">
						<div class="content-left-side">
							{foreach from=$menuTreeItems item=treeItem name=menu767Left}
								{if $smarty.foreach.menu767Left.index % 2 != 0}
									<div class="menu-item"><a href="{$menuModelItems[$treeItem.id]->url}" class="font15">{$menuModelItems[$treeItem.id]->menuItemTitle->value}</a></div>
								{/if}
							{/foreach}
						</div>
						<div class="content-right-side">
							{foreach from=$menuTreeItems item=treeItem name=menu767Left}
								{if $smarty.foreach.menu767Left.index % 2 == 0}
									<div class="menu-item"><a href="{$menuModelItems[$treeItem.id]->url}" class="font15">{$menuModelItems[$treeItem.id]->menuItemTitle->value}</a></div>
								{/if}
							{/foreach}
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- menu in 767 end -->

				<!-- Registration in 479 -->
				<div class="reg-login-container-479 auth-all-container hide">
					<div class="login-container">
						<div class="login-errors"></div>
						<div class="field-container">
							<div class="field-title font16">{$messages.registration.mail}</div>
							<div class="clear show-in-767"></div>
							<div class="field-input"><input type="text" class="login-email-input" /></div>
							<div class="clear"></div>
						</div>
						<div class="field-container">
							<div class="field-title font16">{$messages.auth.password}</div>
							<div class="clear show-in-767"></div>
							<div class="field-input"><input type="password" class="login-password-input" /></div>
							<div class="clear show-in-767"></div>
							<div class="field-lost-password font16"><a href="javascript:void(0)" class="lost-psw" class="font16" >{$messages.auth.lost}</a></div>
							<div class="clear"></div>
						</div>
						<div class="submit-button login-submit-button font16" >{$messages.auth.login}</div>
						<div class="field-container">
							<img src="{$static_url}/img/login-line.jpg" class="width100" />
						</div>
					</div>
					<div class="font16 color-gray show-reg-container" style="text-align: center;">{$messages.auth.have_account} <span class="show-reg-container reg-login-link">{$messages.auth.reg}</span> !</div>
					<div class="registration-container registration-block-container hide">
						<div class="registration-content">
							<div class="registration-text">{$messages.registration.text}</div>
							<div class="registration-errors"></div>
							<div class="registration-mail-field">
								<div class="reg-mail-field-title font16">{$messages.registration.mail}</div>
								<div class="clear show-in-767"></div>
								<div class="reg-mail-field-input">
									<input type="text" name="email" class="reg-email" />
								</div>
								<div class="clear"></div>
								<div class="submit-button registration-submit-button font16" >{$messages.registration.title}</div>
								<div class="field-container">
									<img src="{$static_url}/img/login-line.jpg" class="width100" />
								</div>
							</div>
						</div>
					</div>
					<div class="font16 color-gray hide show-login-container" style="text-align: center;">{$messages.auth.have_not_account} <span class="show-login-container reg-login-link">{$messages.auth.have_ac_login}</span> !</div>
					<div class="lpw-container registration-container hide">
						<div class="registration-top">
							<div class="registration-title font25" style="margin-left: 30%;">{$messages.lpw.title}</div>
							<div class="clear"></div>
						</div>
						<div class="registration-content">
							<div class="registration-text">{$messages.lpw.text}</div>
							<div class="registration-mail-field">
								<div class="lpw-message" style="text-align: center; color: #016A9E;"></div>
								<br/>
								<div class="reg-mail-field-title font16">{$messages.registration.mail}</div>
								<div class="clear show-in-767"></div>
								<div class="reg-mail-field-input">
									<input type="text" name="email" class="user-mail-lpw" />
								</div>
								<div class="clear"></div>
								<div class="submit-button lpw-submit-button font16" >{$messages.lpw.submit}</div>
								<div class="field-container">
									<img src="{$static_url}/img/login-line.jpg" class="width100" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Registration in 479 end -->
				
				<!-- menu -->
				<div id="menu-container" class="hide-in-767">
					<img src="{$static_url}/img/menu-bg.png" />
					<div id="menu-content">
						{foreach from=$menuTreeItems item=treeItem name=menuContent}
							<div class="menu-item relative font15" menutype="0" toopen="ddm-{$smarty.foreach.menuContent.index}">
								<a href="{$menuModelItems[$treeItem.id]->url}">{$menuModelItems[$treeItem.id]->menuItemTitle->value}</a>
								{if isset($treeItem.items)}
								<div class="absolute submenu-1 hide" {if $smarty.foreach.menuContent.first}style="left: -19%;"{/if} id="ddm-{$smarty.foreach.menuContent.index}">
									{foreach from=$treeItem.items item=treeSubItem}
										<div class="submenu-item">
											<div class="pointer"><img src="{$static_url}/img/submenu-pointer.png"/></div>
											<div class="text"><a href="{$menuModelItems[$treeSubItem.id]->url}" class="font15">{$menuModelItems[$treeSubItem.id]->menuItemTitle->value}</a></div>
											<div class="clear"></div>
										</div>
									{/foreach}
								</div>
								{/if}
							</div>
							{if !$smarty.foreach.menuContent.last}
								<div class="menu-pointer">
									<img src="{$static_url}/img/menu-pointer.png" class="p-inactive" />
									<img src="{$static_url}/img/menu-pointer-active.png" class="p-active" />
								</div>
							{/if}
						{/foreach}
						
						{if $logged_in}
							<div class="right profile-container">
								<div class="profile-link"><a href="{$app_url}/{$currentLang}/profile" class="font15" >{$messages.profile.title}</a></div>
								<div class="profile-logout"><a href="{$app_url}/{$currentLang}/logout" class="font15"><img src="{$static_url}/img/registration-icon.png" /></a></div>
								<div class="clear"></div>
							</div>
						{else}
							<div class="registration right">
								<a href="#" class="font15"><img src="{$static_url}/img/registration-icon.png" /> &nbsp;<span class="hide-in-960">{$messages.common.registration}</span></a>
							</div>
						{/if}
						<div class="clear"></div>
					</div>
				</div>
				<!-- menu end -->
			</div>
			<!-- slider -->
			<div id="banner-slider-container" class="hide-in-767">
				<div id="banner-slider-left" class="hidden">
					<ul>
						{foreach from=$languages item=lang key=langIso}
							{if $langIso == $currentLang}
								<li><span class="font15 lang-item-active">{$langIso|upper}</span></li>
							{else}
								<li><a href="{$app_url}/{$langIso}/{$langUrl}" class="font15" >{$langIso|upper}</a></li>
							{/if}
						{/foreach}
					</ul>
				</div>
				<div id="banner-slider-middle" class="relative">
					{block name="msliderContainer"}
					<div class="mslider-container">
						{if count($ibanners) > 1}
						<div class="mslider-top">
							<div class="mslider-pointer"><img src="{$static_url}/img/mslider-pointer.png" /></div>
							<div class="clear"></div>
						</div>
						{/if}
						<div class="mslider-bottom">
							<div class="mslider-wrapper">
								<div class="mslider-ribbon relative">
									{foreach from=$ibanners item=ib}
										<div class="mslider-item relative">
											<a href="{$ib->link->value}"><img src="{$public_url}/{$ib->image->value}" /></a>
											<div class="text-container font25">
												<div class="text-layer {$ib->posClass} font27">{$ib->text->value}</div>
											</div>
										</div>
									{/foreach}
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					{/block}
				</div>
				<div id="banner-slider-right">
					<ul>
						<li><a href="{$app_url}/{$currentLang}"><img src="{$static_url}/img/home-icon.png" /></a></li>
						<li><a href="{$app_url}/{$currentLang}/feedback"><img src="{$static_url}/img/phone-icon.png" /></a></li>
						<li><a href="{$app_url}/{$currentLang}/sitemap"><img src="{$static_url}/img/sitemap-icon.png" /></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<!-- slider end -->
			{block name="calculator"}{/block}
			<!-- content -->
			<div class="center-container">
				<div id="content-container">
				{block name="content"}{/block}
				
				<!-- content block -->
				<div class="last-news right">
					{block name="last_news"}
						{if count($lastNews)}
							<span class="title italic font16">{$messages.common.new_news}</span>
							<div class="date font16">{$lastNews[0]->date->value|date_format:"%m/%d/%Y"}</div>
							<div class="description font16"><a href="{$app_url}/{$currentLang}/news/view/{$lastNews[0]->r_id->value}">{$lastNews[0]->description} ...</a></div>
							<p align="right"><a href="{$app_url}/{$currentLang}/news" class="font13 color-green" >{$messages.common.news}</a></p>
						{/if}
					{/block}
				</div>
				<!-- content block end -->
				
				<!-- tool for adaptive -->
				<div class="clear show-in-767"></div>
				<div class="clear show-in-960"></div>
				<!-- tool for adaptive end -->
				
				
				<!-- content block 3 items -->
				<div id="partners-slider-container" class="hide-in-479">
					<div id="partners-slider-container-top">
						<div class="font25" id="partners-block-title">{$messages.common.our_partners}</div>
						<div id="partners-icon">
							<img src="{$static_url}/img/partners-icon.png" />
						</div>
						<div class="clear"></div>
					</div>
					<div id="partners-slider-container-bottom">
						<div class="horizontal-slider-container">
							<div class="horizontal-slider-to-left">
								<img src="{$static_url}/img/slider-to-left-active.png" class="active-pointer" />
								<img src="{$static_url}/img/slider-to-left-inactive.png" class="inactive-pointer" />
							</div>
							<div class="horizontal-slider-wrapper">
								<div class="horizontal-slider-ribbon relative">
									{foreach from=$hSliderItems item=sItem}
										<div class="horizontal-slider-item">
											<div class="horizontal-slider-item-image">
												<div class="horizontal-slider-item-image-cell">
													<a href="javascript:void(0);" title="{$sItem.objTitle}" data-url="{$app_url}/objects/get-object-data/{$sItem.id}" class="show-result-in-message" ><img src="{$public_url}{$sItem.objLogo}" /></a>
												</div>
											</div>
											<div class="horizontal-slider-item-title font16">
												<a href="javascript:void(0);" title="{$sItem.objTitle}" data-url="{$app_url}/objects/get-object-data/{$sItem.id}" class="show-result-in-message" >{$sItem.objTitle}</a>
											</div>
										</div>
									{/foreach}
									<div class="clear"></div>
								</div>
							</div>
							<div class="horizontal-slider-to-right">
								<img src="{$static_url}/img/slider-to-right-active.png" class="active-pointer" />
								<img src="{$static_url}/img/slider-to-right-inactive.png" class="inactive-pointer" />
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				
				<!-- content block 3 items end -->
				
				<div class="clear"></div>
			
				</div>
			</div>
			
		</div>
		
		<!-- footer -->
		<div id="footer-container" class="relative">	
			<div class="absolute" style=" right:0; top: 120px;"><a href="http://agbank.az"><img src="{$static_url}/img/logo-bank.png"/></a></div>
			<div class="absolute" style=" bottom: 20px; width: 100%; text-align: center;"><a href="http://meqa.az"><img src="{$static_url}/img/mega-logo.png"/></a></div>
			<div id="top-gradient"></div>
			<div id="search-container">
				<div class="left relative" id="search-input">
					<img src="{$static_url}/img/search-input-transparent.png" class="hide-in-479" />
					<input type="text" name="#" id="search-text" onclick="this.value = ''" value="{$messages.common.search_text}" class="absolute font16" />
				</div>
				<div class="clear show-in-767"></div>
				<div class="right relative" id="search-button">
					<img src="{$static_url}/img/search-button-transparent.png" />
					<div id="search-button-text" class="font16" id="search-button">{$messages.common.search}</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="main-wrapper">
				<div class="center-container">
					<div id="footer-elements-container">
						<div class="left" id="footer-elements-top">
							<div id="footer-phone-icon">
								<img src="{$static_url}/img/footer-phone-icon.png" />
							</div>
							<div id="footer-left-text">
								<span class="font16">{$messages.common.info_centre}</span>
								<br/>
								<span class="font25">+994 12 4975017</span>
							</div>
						</div>
						<!-- tool for adaptive -->
						<div class="clear show-in-767"></div>
						<!-- tool for adaptive end -->
						<div class="right hide" id="footer-right">
							<div id="copyright" class="font16">{$messages.common.copy}</div>
							<div id="meqa-copy"><a href="http://www.meqa.az" class="font16">{$messages.common.meqa_link}</a></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer end -->
		
		<!-- Call to bank -->
		<div class="block-ui call-to-bank-block hide">
			<div class="call-to-bank-container relative">
				<div class="popup-close"><img src="{$static_url}/img/reg-close.png" /></div>
				<div class="call-to-bank-title font25">{$messages.call_to.title}</div>
				<div class="call-to-success hide font15">{$messages.call_to.success}</div>
				<div class="call-to-error hide  font15">{$messages.call_to.error}</div>
				<div class="call-to-bank-content">
					
					<div class="call-to-field-container">
						<div class="field-title font18">{$messages.call_to.name}:*</div>
						<div class="field-own"><input type="text" id="call-to-user" class="font15" value="{if $logged_in}{$logged_in.name}{/if}" /></div>
						<div class="clear"></div>
					</div>
					
					<div class="call-to-field-container">
						<div class="field-title font18">{$messages.call_to.phone}:*</div>
						<div class="field-own" id="call-to-bank-number">
							<div class="phone-label font18">+994</div>
							<div class="phone-code" id="phone-code">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left font16">sd</div>
										<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										<div class="select-option" key="12" >12</div>
										<div class="select-option" key="40" >40</div>
										<div class="select-option" key="50" >50</div>
										<div class="select-option" key="51" >51</div>
										<div class="select-option" key="55" >55</div>
										<div class="select-option" key="70" >70</div>
										<div class="select-option" key="77" >77</div>
									</div>
									<input type="hidden" />
								</div>
							</div>
							<div class="phone-number">
								<input type="text" id="phone-number" />
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="call-to-field-container">
						<div class="field-title font18">{$messages.call_to.time}:*</div>
						<div class="field-own" id="call-to-bank-time">
							<div class="select-container relative">
								<div class="selected-value-container">
									<div class="selected-value left">sd</div>
									<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
									<div class="clear"></div>
								</div>
								<div class="select-options-container absolute hide">
									<div class="select-option" key="{$smarty.now|date_format:"%Y %m %d %k:%M"}" >{$messages.common.now}</div>
									<div class="select-option" key="09:00 - 10:00" >09:00 - 10:00</div>
									<div class="select-option" key="10:00 - 11:00" >10:00 - 11:00</div>
									<div class="select-option" key="11:00 - 12:00" >11:00 - 12:00</div>
									<div class="select-option" key="12:00 - 13:00" >12:00 - 13:00</div>
									<div class="select-option" key="14:00 - 15:00" >14:00 - 15:00</div>
									<div class="select-option" key="15:00 - 16:00" >15:00 - 16:00</div>
									<div class="select-option" key="16:00 - 17:00" >16:00 - 17:00</div>
									<div class="select-option" key="17:00 - 18:00" >17:00 - 18:00</div>
								</div>
								<input type="hidden" />
							</div>
						</div>
						<div class="clear"></div>
					</div>
				
					<div class="call-to-field-container">
						<div class="field-title font18">{$messages.call_to.subject}:*</div>
						<div class="field-own">
							<input type="text" id="call-to-bank-subject" class="font15" />
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="call-to-field-container">
						<div class="field-title font18">
							<img src="{$app_url}/getcaptcha/1" id="call-to-captcha-image" /> <br/>
							<a href="javascript:reloadCallToCaptcha();">{$messages.common.captcha_refresh}</a>
						</div>
						<div class="field-own">
							<input type="text" id="call-to-bank-captcha" style="width: 50%; float: right;" class="font15" />
						</div>
						<div class="clear"></div>
					</div>
				
					<div class="submit-button font16 call-to-bank-submit" id="call-to-bank-submit">{$messages.common.send}</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- Call to bank end -->
		
		<!-- Horoscope block -->
		<div class="block-ui horoscope-block hide">
			<div class="horoscope-container relative" style="width: 600px;">
				<img src="{$static_url}/img/horoscope-bg.png" class="horoscope-bg" />
				<div class="horoscope-close"><img src="{$static_url}/img/reg-close.png" /></div>
				<div class="horoscope-content">
					<div class="horoscope-head-title font30">{$messages.horoscope.title}</div>
					{if isset($monthHoroscope)}
					<div class="horoscope-title font18" id="horoscope-title">{$monthHoroscope->horoscopeTitle->value}</div>
					<div class="horoscope-inner-content horoscope-inner-content-man font16" sex="0">{$monthHoroscope->contentMan->value}</div>
					<div class="horoscope-inner-content horoscope-inner-content-woman font16" sex="1">{$monthHoroscope->contentWoman->value}</div>
					<div class="horoscope-personal-title font18">{$messages.horoscope.personal}</div>
					<div id="horoscope-error"></div>
					<div class="horoscope-personal-container">
						<div class="horoscope-me font16">{$messages.horoscope.me}</div>
						<div class="horoscope-sex">
							<div id="horoscope-sex-select-container">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left">sd</div>
										<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										{foreach from=$sexOptions key=k item=v}
										<div class="select-option" key="{$k}" >{$v}</div>
										{/foreach}
									</div>
									<input type="hidden" />
								</div>
							</div>
						</div>
						<div class="horoscope-me-zodiac font16">, {$messages.horoscope.zodiac}</div>
						<div class="horoscope-zodiac">
							<div id="horoscope-zodiac-select-container">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left">sd</div>
										<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										{foreach from=$zodiac key=k item=v}
										<div class="select-option" key="{$k}" >{$v}</div>
										{/foreach}
									</div>
									<input type="hidden" />
								</div>
							</div>
						</div>
						<div class="submit-button horoscope-submit-button" id="horoscope-submit">{$messages.horoscope.next}</div>
						<div class="clear"></div>
					</div>
					{else}
						<div style="color: #fff; text-align: center;">{$messages.common.no_horoscope}</div>
					{/if}
				</div>
			</div>
		</div>
		<!-- Horoscope block end -->
		
		<!-- Registration block -->
		<div class="block-ui registration-block hide auth-all-container">
			<div class="reg-login-container relative">
				<div class="reg-login-close"><img src="{$static_url}/img/reg-close.png" /></div>
				<div class="login-container">
					<div class="login-container-title font25">{$messages.auth.in}</div>
					<div class="login-errors"></div>
					<div class="field-container">
						<div class="field-title font16">{$messages.registration.mail}</div>
						<div class="clear show-in-767"></div>
						<div class="field-input"><input type="text" class="login-email-input" /></div>
						<div class="clear"></div>
					</div>
					<div class="field-container">
						<div class="field-title font16">{$messages.auth.password}</div>
						<div class="clear show-in-767"></div>
						<div class="field-input"><input type="password" class="login-password-input" /></div>
						<div class="clear show-in-767"></div>
						<div class="field-lost-password font16"><a href="javascript:void(0)" class="lost-psw" class="font16" >{$messages.auth.lost}</a></div>
						<div class="clear"></div>
					</div>
					<div class="submit-button login-submit-button font16" >{$messages.auth.login}</div>
					<div class="field-container">
						<img src="{$static_url}/img/login-line.jpg" class="width100" />
					</div>
				</div>
				<div class="font16 color-gray show-reg-container" style="text-align: center;">{$messages.auth.have_account} <span class="show-reg-container reg-login-link">{$messages.auth.reg}</span> !</div>
				<div class="registration-container hide registration-block-container">
					<div class="registration-top">
						<div class="registration-title font25">{$messages.registration.title}</div>
						<div class="clear"></div>
					</div>
					<div class="registration-content">
						<div class="registration-text">{$messages.registration.text}</div>
						<div class="registration-errors"></div>
						<div class="registration-mail-field">
							<div class="reg-mail-field-title font16">{$messages.registration.mail}</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" class="reg-email" />
							</div>
							<div class="clear"></div>
							<div class="submit-button registration-submit-button font16" >{$messages.registration.title}</div>
							<div class="field-container">
								<img src="{$static_url}/img/login-line.jpg" class="width100" />
							</div>
						</div>
					</div>
				</div>
				<div class="font16 color-gray hide show-login-container" style="text-align: center;">{$messages.auth.have_not_account} <span class="show-login-container reg-login-link">{$messages.auth.have_ac_login}</span> !</div>
				<div class="lpw-container registration-container hide">
					<div class="registration-top">
						<div class="registration-title font25" style="margin-left: 30%;">{$messages.lpw.title}</div>
						<div class="clear"></div>
					</div>
					<div class="registration-content">
						<div class="registration-text">{$messages.lpw.text}</div>
						<div class="registration-mail-field">
							<div class="lpw-message" style="text-align: center; color: #016A9E;"></div>
							<br/>
							<div class="reg-mail-field-title font16">{$messages.registration.mail}</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" class="user-mail-lpw" />
							</div>
							<div class="clear"></div>
							<div class="submit-button lpw-submit-button font16" >{$messages.lpw.submit}</div>
							<div class="field-container">
								<img src="{$static_url}/img/login-line.jpg" class="width100" />
							</div>
						</div>
					</div>
				</div>
				<!--
				<div class="registration-container lost-password">
					<div class="registration-top">
						<div class="registration-title font25">{$messages.common.lost_psw}</div>
						<div class="clear"></div>
					</div>
					<div id="registration-content">
						<div class="registration-text">{$messages.registration.text}</div>
						<div id="registration-errors"></div>
						<div class="registration-mail-field">
							<div class="reg-mail-field-title font16">{$messages.registration.mail}</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" id="lost-psw-email" />
							</div>
							<div class="clear"></div>
							<div class="submit-button lost-psw-submit-button font16" >{$messages.common.submit}</div>
							<div class="field-container">
								<img src="{$static_url}/img/login-line.jpg" class="width100" />
							</div>
							<input type="submit" id="reg-submit-button" class="hide" />
						</div>
					</div>
				</div>
				-->
			</div>
		</div>
		<!-- Registration block end -->
		
		<div class="hide">
			<input type="hidden" id="csrf-key" class="csrf-key" name="csrf_key" value="{$csrf_key}" />
			<input class="ibanner-reg-input-element font27" />
		</div>
		
		<!-- Templates -->
		
		<script type="html/template" id="block-template">
			<div class="block-ui">
				<div class="block-content relative">
					<div class="popup-close"><img src="{$static_url}/img/reg-close.png" /></div>
					<div class="block-title font25"><%=title%></div>
					<div class="block-inner-content font13"><%=content%></div>
				</div>
			</div>
		</script>
		
		<script type="html/template" id="mslider-segment-template">
			<% if (slidesCount > 1) { %>
				<%  for (var i = 0; i < slidesCount; i++) { %>
					<div class="mslider-segment">
						<div class="mslider-segment-line"></div>
						<div class="mslider-segment-pointer"></div>
						<div class="clear"></div>
					</div>
				<% } %>
				<div class="mslider-segment">
					<div class="mslider-segment-pointer" style="top: -1px !important;"></div>
					<div class="clear"></div>
				</div>
			<% } %>
		</script>
		
		<script type="html/template" id="registration-template">
		</script>
		
		<!-- Templates end -->
		
		
		{literal}
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-42048591-1', 'agclub.az');
		  ga('send', 'pageview');
		
		</script>
		{/literal}
	</body>
</html>