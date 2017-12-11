<?php /* Smarty version Smarty-3.1.8, created on 2017-03-28 07:23:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/views/content/view-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87250817158c1ff7fcdf0d6-52854295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35f7116d6dc6cac50eabbe35de02d09eb12eb511' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/content/view-page.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
    'c76b54d4520074328f808ebb57d5035fb0f95968' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/base.tpl',
      1 => 1490671437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87250817158c1ff7fcdf0d6-52854295',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1ff80122870_19977385',
  'variables' => 
  array (
    'app_url' => 0,
    'static_url' => 0,
    'currentLang' => 0,
    'messages' => 0,
    'languages' => 0,
    'langIso' => 0,
    'langUrl' => 0,
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
    'treeSubItem' => 0,
    'logged_in' => 0,
    'ibanners' => 0,
    'ib' => 0,
    'public_url' => 0,
    'lastNews' => 0,
    'hSliderItems' => 0,
    'sItem' => 0,
    'monthHoroscope' => 0,
    'sexOptions' => 0,
    'k' => 0,
    'v' => 0,
    'zodiac' => 0,
    'csrf_key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1ff80122870_19977385')) {function content_58c1ff80122870_19977385($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/agclub/core/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>AGClub.az 
	:: <?php echo $_smarty_tpl->tpl_vars['page']->value->menuItemTitle->value;?>

</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/styles.less" />
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/img/favicon.ico" type="image/x-icon" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/less.js"></script>
		<script>
			var appData = {
				url: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
',
				lang: '<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
',
				regSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/registration',
				loginSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/login',
				horoscopeSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/horoscope/',
				objectsListUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/objects/list/',
				objectsGetDiscountUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/objects/getdiscount/',
				addCommentUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news/add/comment/',
				callToBankUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/callto/addorder',
				getMapUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/getmap',
				addRatingUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/addrating',
				urls: {
					lostPswUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/lostpsw',
				}
			}
			var Lang = [];
			Lang['user_exists'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['user_exists'];?>
';
			Lang['wrong_data'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['wrong_filled_fields'];?>
';
			Lang['reg_success'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['reg_success'];?>
';
			Lang['wrong_login'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['login_error'];?>
';
			Lang['horoscope_error'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['horoscope_error'];?>
';
			Lang['comment_add_error'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['notices']['comment_error'];?>
';
			Lang['show_map'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['show_map'];?>
';
			Lang['choose_obj'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['choose_obj'];?>
';
			Lang['lpw_title'] = '<?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['restore_psw'];?>
';
		</script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/actions.js"></script>
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
						<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/logo.png" /></a>
					</div>
					<div id="header-info-container" class="hide-in-767">
						<div id="info-links">
							<div class="info-left-link relative" style="margin-right: 2%;">
								<a href="//www.facebook.com/AGClub.AGBank" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/fb-icon.png" style="width: 80%;" /></a>
							</div>
							<div class="info-left-link relative">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/call-icon-<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
.png" />
							</div>
							<div class="info-right-link">
								<a href="javascript:void(0);" class="font16 show-block" block-identifier=".call-to-bank-block"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['order_call'];?>
</a>
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
						<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_smarty_tpl->tpl_vars['langIso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['langIso']->value = $_smarty_tpl->tpl_vars['lang']->key;
?>
							<?php if ($_smarty_tpl->tpl_vars['langIso']->value==$_smarty_tpl->tpl_vars['currentLang']->value){?>
								<li><span class="lang-767-active font15" ><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['langIso']->value, 'UTF-8');?>
</span></li>
							<?php }else{ ?>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['langIso']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['langUrl']->value;?>
" class="font15" ><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['langIso']->value, 'UTF-8');?>
</a></li>
							<?php }?>
						<?php } ?>
					</ul>
				</div>
				<!-- lang in 767 end -->

				<!-- menu in 767 -->
				<div id="menu-in-767" class="show-in-767">
					<div class="left-side">
						<div class="menu-item-title"><a href="#" class="font15"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['menu'];?>
</a></div>
						<div class="dd-menu-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/select-arrow.png" /></div>
						<div class="clear"></div>
					</div>
					<div class="right-side">
						<div class="right-side-left"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/registration-icon.png" class="hide-in-479" /></div>
						<div class="right-side-right"><a href="javascript:void(0);" class="font15" id="reg-in-1-column-mode"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['registration'];?>
</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="menu-content hide">
						<div class="content-left-side">
							<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']++;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu767Left']['index']%2!=0){?>
									<div class="menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
" class="font15"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a></div>
								<?php }?>
							<?php } ?>
						</div>
						<div class="content-right-side">
							<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']++;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu767Left']['index']%2==0){?>
									<div class="menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
" class="font15"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a></div>
								<?php }?>
							<?php } ?>
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
							<div class="field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
							<div class="clear show-in-767"></div>
							<div class="field-input"><input type="text" class="login-email-input" /></div>
							<div class="clear"></div>
						</div>
						<div class="field-container">
							<div class="field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['password'];?>
</div>
							<div class="clear show-in-767"></div>
							<div class="field-input"><input type="password" class="login-password-input" /></div>
							<div class="clear show-in-767"></div>
							<div class="field-lost-password font16"><a href="javascript:void(0)" class="lost-psw" class="font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['lost'];?>
</a></div>
							<div class="clear"></div>
						</div>
						<div class="submit-button login-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['login'];?>
</div>
						<div class="field-container">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
						</div>
					</div>
					<div class="font16 color-gray show-reg-container" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_account'];?>
 <span class="show-reg-container reg-login-link"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['reg'];?>
</span> !</div>
					<div class="registration-container registration-block-container hide">
						<div class="registration-content">
							<div class="registration-text"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['text'];?>
</div>
							<div class="registration-errors"></div>
							<div class="registration-mail-field">
								<div class="reg-mail-field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
								<div class="clear show-in-767"></div>
								<div class="reg-mail-field-input">
									<input type="text" name="email" class="reg-email" />
								</div>
								<div class="clear"></div>
								<div class="submit-button registration-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['title'];?>
</div>
								<div class="field-container">
									<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
								</div>
							</div>
						</div>
					</div>
					<div class="font16 color-gray hide show-login-container" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_not_account'];?>
 <span class="show-login-container reg-login-link"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_ac_login'];?>
</span> !</div>
					<div class="lpw-container registration-container hide">
						<div class="registration-top">
							<div class="registration-title font25" style="margin-left: 30%;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['title'];?>
</div>
							<div class="clear"></div>
						</div>
						<div class="registration-content">
							<div class="registration-text"><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['text'];?>
</div>
							<div class="registration-mail-field">
								<div class="lpw-message" style="text-align: center; color: #016A9E;"></div>
								<br/>
								<div class="reg-mail-field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
								<div class="clear show-in-767"></div>
								<div class="reg-mail-field-input">
									<input type="text" name="email" class="user-mail-lpw" />
								</div>
								<div class="clear"></div>
								<div class="submit-button lpw-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['submit'];?>
</div>
								<div class="field-container">
									<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Registration in 479 end -->

				<!-- menu -->
				<div id="menu-container" class="hide-in-767">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/menu-bg.png" />
					<div id="menu-content">
						<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['treeItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['treeItem']->iteration=0;
 $_smarty_tpl->tpl_vars['treeItem']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menuContent']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
 $_smarty_tpl->tpl_vars['treeItem']->iteration++;
 $_smarty_tpl->tpl_vars['treeItem']->index++;
 $_smarty_tpl->tpl_vars['treeItem']->first = $_smarty_tpl->tpl_vars['treeItem']->index === 0;
 $_smarty_tpl->tpl_vars['treeItem']->last = $_smarty_tpl->tpl_vars['treeItem']->iteration === $_smarty_tpl->tpl_vars['treeItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menuContent']['first'] = $_smarty_tpl->tpl_vars['treeItem']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menuContent']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menuContent']['last'] = $_smarty_tpl->tpl_vars['treeItem']->last;
?>
							<div class="menu-item relative font15" menutype="0" toopen="ddm-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['menuContent']['index'];?>
">
								<a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a>
								<?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
								<div class="absolute submenu-1 hide" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menuContent']['first']){?>style="left: -19%;"<?php }?> id="ddm-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['menuContent']['index'];?>
">
									<?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
										<div class="submenu-item">
											<div class="pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/submenu-pointer.png"/></div>
											<div class="text"><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->url;?>
" class="font15"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</a></div>
											<div class="clear"></div>
										</div>
									<?php } ?>
								</div>
								<?php }?>
							</div>
							<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['menuContent']['last']){?>
								<div class="menu-pointer">
									<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/menu-pointer.png" class="p-inactive" />
									<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/menu-pointer-active.png" class="p-active" />
								</div>
							<?php }?>
						<?php } ?>

						<?php if ($_smarty_tpl->tpl_vars['logged_in']->value){?>
							<div class="right profile-container">
								<div class="profile-link"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/profile" class="font15" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['profile']['title'];?>
</a></div>
								<div class="profile-logout"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/logout" class="font15"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/registration-icon.png" /></a></div>
								<div class="clear"></div>
							</div>
						<?php }else{ ?>
							<div class="registration right">
								<a href="#" class="font15"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/registration-icon.png" /> &nbsp;<span class="hide-in-960"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['registration'];?>
</span></a>
							</div>
						<?php }?>
						<div class="clear"></div>
					</div>
				</div>
				<!-- menu end -->
			</div>
			<!-- slider -->
			<div id="banner-slider-container" class="hide-in-767">
				<div id="banner-slider-left" class="hidden">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_smarty_tpl->tpl_vars['langIso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['langIso']->value = $_smarty_tpl->tpl_vars['lang']->key;
?>
							<?php if ($_smarty_tpl->tpl_vars['langIso']->value==$_smarty_tpl->tpl_vars['currentLang']->value){?>
								<li><span class="font15 lang-item-active"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['langIso']->value, 'UTF-8');?>
</span></li>
							<?php }else{ ?>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['langIso']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['langUrl']->value;?>
" class="font15" ><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['langIso']->value, 'UTF-8');?>
</a></li>
							<?php }?>
						<?php } ?>
					</ul>
				</div>
				<div id="banner-slider-middle" class="relative">
					
					<div class="mslider-container">
						<?php if (count($_smarty_tpl->tpl_vars['ibanners']->value)>1){?>
						<div class="mslider-top">
							<div class="mslider-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/mslider-pointer.png" /></div>
							<div class="clear"></div>
						</div>
						<?php }?>
						<div class="mslider-bottom">
							<div class="mslider-wrapper">
								<div class="mslider-ribbon relative">
									<?php  $_smarty_tpl->tpl_vars['ib'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ib']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ibanners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ib']->key => $_smarty_tpl->tpl_vars['ib']->value){
$_smarty_tpl->tpl_vars['ib']->_loop = true;
?>
										<div class="mslider-item relative">
											<a href="<?php echo $_smarty_tpl->tpl_vars['ib']->value->link->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ib']->value->image->value;?>
" /></a>
											<div class="text-container font25">
												<div class="text-layer <?php echo $_smarty_tpl->tpl_vars['ib']->value->posClass;?>
 font27"><?php echo $_smarty_tpl->tpl_vars['ib']->value->text->value;?>
</div>
											</div>
										</div>
									<?php } ?>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div id="banner-slider-right">
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/home-icon.png" /></a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/feedback"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/phone-icon.png" /></a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/sitemap"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/sitemap-icon.png" /></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<!-- slider end -->
			
			<!-- content -->
			<div class="center-container">
				<div id="content-container">
				
	<div class="fixed show-in-767 content-child-elements">
		<div class="content-child-elements-left">
			<?php if (count($_smarty_tpl->tpl_vars['childPages']->value)){?>
				<div class="view-page-childs">
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childPages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						<div class="child-menu">
							<div class="child-menu-pointer">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/child-page-pointer.png" />
							</div>
							<div class="child-menu-text">
								<?php if ($_smarty_tpl->tpl_vars['page']->value->r_id->value==$_smarty_tpl->tpl_vars['p']->value->r_id->value){?>
									<span class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</span>
								<?php }else{ ?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url->value;?>
" class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</a>
								<?php }?>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
				</div>
			<?php }?>
		</div>
		<div class="content-child-elements-right">
			<div class="content-child-elements-pointer" id="show-content-childs-menu">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/arrow-to-right.png" class="to-right" />
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/arrow-to-left.png" class="to-left hide" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php if (count($_smarty_tpl->tpl_vars['childPages']->value)){?>
		<div class="view-page-childs hide-in-767">
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childPages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
				<div class="child-menu">
					<div class="child-menu-pointer">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/child-page-pointer.png" />
					</div>
					<div class="child-menu-text">
						<?php if ($_smarty_tpl->tpl_vars['page']->value->r_id->value==$_smarty_tpl->tpl_vars['p']->value->r_id->value){?>
							<span class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</span>
						<?php }else{ ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url->value;?>
" class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</a>
						<?php }?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
		</div>
	<?php }?>
	<div class="clear show-in-767"></div>
	<div class="view-page-content view-page-content-small font16 relative" <?php if (!count($_smarty_tpl->tpl_vars['childPages']->value)){?>style="width: 96%;"<?php }?>>
		<div class="page-title font25"><?php echo $_smarty_tpl->tpl_vars['page']->value->menuItemTitle->value;?>
</div>
		<?php echo $_smarty_tpl->tpl_vars['page']->value->content->value;?>

		<br/>
		<div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['request_url']->value;?>
" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
	</div>
	<div class="clear"></div>
	


				<!-- content block -->
				<div class="last-news right">
					
						<?php if (count($_smarty_tpl->tpl_vars['lastNews']->value)){?>
							<span class="title italic font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['new_news'];?>
</span>
							<div class="date font16"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastNews']->value[0]->date->value,"%m/%d/%Y");?>
</div>
							<div class="description font16"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news/view/<?php echo $_smarty_tpl->tpl_vars['lastNews']->value[0]->r_id->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lastNews']->value[0]->description;?>
 ...</a></div>
							<p align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news" class="font13 color-green" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['news'];?>
</a></p>
						<?php }?>
					
				</div>
				<!-- content block end -->

				<!-- tool for adaptive -->
				<div class="clear show-in-767"></div>
				<div class="clear show-in-960"></div>
				<!-- tool for adaptive end -->


				<!-- content block 3 items -->
				<div id="partners-slider-container" class="hide-in-479">
					<div id="partners-slider-container-top">
						<div class="font25" id="partners-block-title"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['our_partners'];?>
</div>
						<div id="partners-icon">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/partners-icon.png" />
						</div>
						<div class="clear"></div>
					</div>
					<div id="partners-slider-container-bottom">
						<div class="horizontal-slider-container">
							<div class="horizontal-slider-to-left">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/slider-to-left-active.png" class="active-pointer" />
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/slider-to-left-inactive.png" class="inactive-pointer" />
							</div>
							<div class="horizontal-slider-wrapper">
								<div class="horizontal-slider-ribbon relative">
									<?php  $_smarty_tpl->tpl_vars['sItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hSliderItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sItem']->key => $_smarty_tpl->tpl_vars['sItem']->value){
$_smarty_tpl->tpl_vars['sItem']->_loop = true;
?>
										<div class="horizontal-slider-item">
											<div class="horizontal-slider-item-image">
												<div class="horizontal-slider-item-image-cell">
													<a href="javascript:void(0);" title="<?php echo $_smarty_tpl->tpl_vars['sItem']->value['objTitle'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/objects/get-object-data/<?php echo $_smarty_tpl->tpl_vars['sItem']->value['id'];?>
" class="show-result-in-message" ><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['sItem']->value['objLogo'];?>
" /></a>
												</div>
											</div>
											<div class="horizontal-slider-item-title font16">
												<a href="javascript:void(0);" title="<?php echo $_smarty_tpl->tpl_vars['sItem']->value['objTitle'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/objects/get-object-data/<?php echo $_smarty_tpl->tpl_vars['sItem']->value['id'];?>
" class="show-result-in-message" ><?php echo $_smarty_tpl->tpl_vars['sItem']->value['objTitle'];?>
</a>
											</div>
										</div>
									<?php } ?>
									<div class="clear"></div>
								</div>
							</div>
							<div class="horizontal-slider-to-right">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/slider-to-right-active.png" class="active-pointer" />
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/slider-to-right-inactive.png" class="inactive-pointer" />
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
			<div class="absolute" style=" right:0; top: 120px;"><a href="http://agbank.az"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/logo-bank.png"/></a></div>
			<div class="absolute" style=" bottom: 20px; width: 100%; text-align: center;"><a href="http://meqa.az"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/mega-logo.png"/></a></div>
			<div id="top-gradient"></div>
			<div id="search-container">
				<div class="left relative" id="search-input">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/search-input-transparent.png" class="hide-in-479" />
					<input type="text" name="#" id="search-text" onclick="this.value = ''" value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['search_text'];?>
" class="absolute font16" />
				</div>
				<div class="clear show-in-767"></div>
				<div class="right relative" id="search-button">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/search-button-transparent.png" />
					<div id="search-button-text" class="font16" id="search-button"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['search'];?>
</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="main-wrapper">
				<div class="center-container">
					<div id="footer-elements-container">
						<div class="left" id="footer-elements-top">
							<div id="footer-phone-icon">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/footer-phone-icon.png" />
							</div>
							<div id="footer-left-text">
								<span class="font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['info_centre'];?>
</span>
								<br/>
								<span class="font25">+994 12 4975017</span>
							</div>
						</div>
						<!-- tool for adaptive -->
						<div class="clear show-in-767"></div>
						<!-- tool for adaptive end -->
						<div class="right hide" id="footer-right">
							<div id="copyright" class="font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['copy'];?>
</div>
							<div id="meqa-copy"><a href="http://www.meqa.az" class="font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['meqa_link'];?>
</a></div>
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
				<div class="popup-close"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/reg-close.png" /></div>
				<div class="call-to-bank-title font25"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['title'];?>
</div>
				<div class="call-to-success hide font15"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['success'];?>
</div>
				<div class="call-to-error hide  font15"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['error'];?>
</div>
				<div class="call-to-bank-content">

					<div class="call-to-field-container">
						<div class="field-title font18"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['name'];?>
:*</div>
						<div class="field-own"><input type="text" id="call-to-user" class="font15" value="<?php if ($_smarty_tpl->tpl_vars['logged_in']->value){?><?php echo $_smarty_tpl->tpl_vars['logged_in']->value['name'];?>
<?php }?>" /></div>
						<div class="clear"></div>
					</div>

					<div class="call-to-field-container">
						<div class="field-title font18"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['phone'];?>
:*</div>
						<div class="field-own" id="call-to-bank-number">
							<div class="phone-label font18">+994</div>
							<div class="phone-code" id="phone-code">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left font16">sd</div>
										<div class="selected-value-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/select-arrow.png" /></div>
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
						<div class="field-title font18"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['time'];?>
:*</div>
						<div class="field-own" id="call-to-bank-time">
							<div class="select-container relative">
								<div class="selected-value-container">
									<div class="selected-value left">sd</div>
									<div class="selected-value-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/select-arrow.png" /></div>
									<div class="clear"></div>
								</div>
								<div class="select-options-container absolute hide">
									<div class="select-option" key="<?php echo smarty_modifier_date_format(time(),"%Y %m %d %k:%M");?>
" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['now'];?>
</div>
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
						<div class="field-title font18"><?php echo $_smarty_tpl->tpl_vars['messages']->value['call_to']['subject'];?>
:*</div>
						<div class="field-own">
							<input type="text" id="call-to-bank-subject" class="font15" />
						</div>
						<div class="clear"></div>
					</div>

					<div class="call-to-field-container">
						<div class="field-title font18">
							<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/getcaptcha/1" id="call-to-captcha-image" /> <br/>
							<a href="javascript:reloadCallToCaptcha();"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['captcha_refresh'];?>
</a>
						</div>
						<div class="field-own">
							<input type="text" id="call-to-bank-captcha" style="width: 50%; float: right;" class="font15" />
						</div>
						<div class="clear"></div>
					</div>

					<div class="submit-button font16 call-to-bank-submit" id="call-to-bank-submit"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['send'];?>
</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- Call to bank end -->

		<!-- Horoscope block -->
		<div class="block-ui horoscope-block hide">
			<div class="horoscope-container relative" style="width: 600px;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/horoscope-bg.png" class="horoscope-bg" />
				<div class="horoscope-close"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/reg-close.png" /></div>
				<div class="horoscope-content">
					<div class="horoscope-head-title font30"><?php echo $_smarty_tpl->tpl_vars['messages']->value['horoscope']['title'];?>
</div>
					<?php if (isset($_smarty_tpl->tpl_vars['monthHoroscope']->value)){?>
					<div class="horoscope-title font18" id="horoscope-title"><?php echo $_smarty_tpl->tpl_vars['monthHoroscope']->value->horoscopeTitle->value;?>
</div>
					<div class="horoscope-inner-content horoscope-inner-content-man font16" sex="0"><?php echo $_smarty_tpl->tpl_vars['monthHoroscope']->value->contentMan->value;?>
</div>
					<div class="horoscope-inner-content horoscope-inner-content-woman font16" sex="1"><?php echo $_smarty_tpl->tpl_vars['monthHoroscope']->value->contentWoman->value;?>
</div>
					<div class="horoscope-personal-title font18"><?php echo $_smarty_tpl->tpl_vars['messages']->value['horoscope']['personal'];?>
</div>
					<div id="horoscope-error"></div>
					<div class="horoscope-personal-container">
						<div class="horoscope-me font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['horoscope']['me'];?>
</div>
						<div class="horoscope-sex">
							<div id="horoscope-sex-select-container">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left">sd</div>
										<div class="selected-value-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sexOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
										<div class="select-option" key="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</div>
										<?php } ?>
									</div>
									<input type="hidden" />
								</div>
							</div>
						</div>
						<div class="horoscope-me-zodiac font16">, <?php echo $_smarty_tpl->tpl_vars['messages']->value['horoscope']['zodiac'];?>
</div>
						<div class="horoscope-zodiac">
							<div id="horoscope-zodiac-select-container">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left">sd</div>
										<div class="selected-value-pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['zodiac']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
										<div class="select-option" key="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</div>
										<?php } ?>
									</div>
									<input type="hidden" />
								</div>
							</div>
						</div>
						<div class="submit-button horoscope-submit-button" id="horoscope-submit"><?php echo $_smarty_tpl->tpl_vars['messages']->value['horoscope']['next'];?>
</div>
						<div class="clear"></div>
					</div>
					<?php }else{ ?>
						<div style="color: #fff; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['no_horoscope'];?>
</div>
					<?php }?>
				</div>
			</div>
		</div>
		<!-- Horoscope block end -->

		<!-- Registration block -->
		<div class="block-ui registration-block hide auth-all-container">
			<div class="reg-login-container relative">
				<div class="reg-login-close"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/reg-close.png" /></div>
				<div class="login-container">
					<div class="login-container-title font25"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['in'];?>
</div>
					<div class="login-errors"></div>
					<div class="field-container">
						<div class="field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
						<div class="clear show-in-767"></div>
						<div class="field-input"><input type="text" class="login-email-input" /></div>
						<div class="clear"></div>
					</div>
					<div class="field-container">
						<div class="field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['password'];?>
</div>
						<div class="clear show-in-767"></div>
						<div class="field-input"><input type="password" class="login-password-input" /></div>
						<div class="clear show-in-767"></div>
						<div class="field-lost-password font16"><a href="javascript:void(0)" class="lost-psw" class="font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['lost'];?>
</a></div>
						<div class="clear"></div>
					</div>
					<div class="submit-button login-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['login'];?>
</div>
					<div class="field-container">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
					</div>
				</div>
				<div class="font16 color-gray show-reg-container" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_account'];?>
 <span class="show-reg-container reg-login-link"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['reg'];?>
</span> !</div>
				<div class="registration-container hide registration-block-container">
					<div class="registration-top">
						<div class="registration-title font25"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['title'];?>
</div>
						<div class="clear"></div>
					</div>
					<div class="registration-content">
						<div class="registration-text"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['text'];?>
</div>
						<div class="registration-errors"></div>
						<div class="registration-mail-field">
							<div class="reg-mail-field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" class="reg-email" />
							</div>
							<div class="clear"></div>
							<div class="submit-button registration-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['title'];?>
</div>
							<div class="field-container">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
							</div>
						</div>
					</div>
				</div>
				<div class="font16 color-gray hide show-login-container" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_not_account'];?>
 <span class="show-login-container reg-login-link"><?php echo $_smarty_tpl->tpl_vars['messages']->value['auth']['have_ac_login'];?>
</span> !</div>
				<div class="lpw-container registration-container hide">
					<div class="registration-top">
						<div class="registration-title font25" style="margin-left: 30%;"><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['title'];?>
</div>
						<div class="clear"></div>
					</div>
					<div class="registration-content">
						<div class="registration-text"><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['text'];?>
</div>
						<div class="registration-mail-field">
							<div class="lpw-message" style="text-align: center; color: #016A9E;"></div>
							<br/>
							<div class="reg-mail-field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" class="user-mail-lpw" />
							</div>
							<div class="clear"></div>
							<div class="submit-button lpw-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['lpw']['submit'];?>
</div>
							<div class="field-container">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
							</div>
						</div>
					</div>
				</div>
				<!--
				<div class="registration-container lost-password">
					<div class="registration-top">
						<div class="registration-title font25"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['lost_psw'];?>
</div>
						<div class="clear"></div>
					</div>
					<div id="registration-content">
						<div class="registration-text"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['text'];?>
</div>
						<div id="registration-errors"></div>
						<div class="registration-mail-field">
							<div class="reg-mail-field-title font16"><?php echo $_smarty_tpl->tpl_vars['messages']->value['registration']['mail'];?>
</div>
							<div class="clear show-in-767"></div>
							<div class="reg-mail-field-input">
								<input type="text" name="email" id="lost-psw-email" />
							</div>
							<div class="clear"></div>
							<div class="submit-button lost-psw-submit-button font16" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['submit'];?>
</div>
							<div class="field-container">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/login-line.jpg" class="width100" />
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
			<input type="hidden" id="csrf-key" class="csrf-key" name="csrf_key" value="<?php echo $_smarty_tpl->tpl_vars['csrf_key']->value;?>
" />
			<input class="ibanner-reg-input-element font27" />
		</div>

		<!-- Templates -->

		<script type="html/template" id="block-template">
			<div class="block-ui">
				<div class="block-content relative">
					<div class="popup-close"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/reg-close.png" /></div>
					<div class="block-title font25"><<?php ?>%=title%<?php ?>></div>
					<div class="block-inner-content font13"><<?php ?>%=content%<?php ?>></div>
				</div>
			</div>
		</script>

		<script type="html/template" id="mslider-segment-template">
			<<?php ?>% if (slidesCount > 1) { %<?php ?>>
				<<?php ?>%  for (var i = 0; i < slidesCount; i++) { %<?php ?>>
					<div class="mslider-segment">
						<div class="mslider-segment-line"></div>
						<div class="mslider-segment-pointer"></div>
						<div class="clear"></div>
					</div>
				<<?php ?>% } %<?php ?>>
				<div class="mslider-segment">
					<div class="mslider-segment-pointer" style="top: -1px !important;"></div>
					<div class="clear"></div>
				</div>
			<<?php ?>% } %<?php ?>>
		</script>

		<script type="html/template" id="registration-template">
		</script>

		<!-- Templates end -->


		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-42048591-1', 'agclub.az');
		  ga('send', 'pageview');

		</script>
		
	</body>
</html><?php }} ?>