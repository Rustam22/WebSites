<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 04:19:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/newActuary/modules/admin/views/login_form/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10755359558c1f12f22f582-13055442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5042f3c2607e9849af9087db6026a6a140d8886' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/newActuary/modules/admin/views/login_form/login.tpl',
      1 => 1472037096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10755359558c1f12f22f582-13055442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'theme_folder' => 0,
    'errors' => 0,
    'messages' => 0,
    'needCaptcha' => 0,
    'app_url' => 0,
    'csrf_key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1f12f2b12e9_04372929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1f12f2b12e9_04372929')) {function content_58c1f12f2b12e9_04372929($_smarty_tpl) {?><html>
	<head>
		<title>Log in</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/less/login_form_stylesheets.less" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/less.js"></script>
		<script>
			var errors = [];
			<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>errors = <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
;<?php }?>
		</script>
	</head>
	<body>
		
		<div id="login-form-container">
			<form action="" method="post" id="login-form">
			<div id="app-builder-title-container">
				<div id="app-builder-title"><h1 style="color: #FFFFFF;">RR-Integration</h1></div>
			</div>
			<div id="login-title"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/login-form-title.png" /></div>
			<div class="field-container" id="errors-container">
				
			</div>
			<div class="field-container">
				<div class="field-icon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/input-icon-user.png" />
				</div>
				<div class="field-input"><input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['login_form']['email_address'];?>
" default-value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['login_form']['email_address'];?>
" id="email-field" /></div>
				<div class="clear"></div>
			</div>
			<div class="field-container">
				<div class="field-icon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/password-icon-user.png" />
				</div>
				<div class="field-input"><input type="password" name="password" value="pswpsw" default-value="pswpsw" id="password-field" /></div>
				<div class="clear"></div>
			</div>
			<?php if (isset($_smarty_tpl->tpl_vars['needCaptcha']->value)&&$_smarty_tpl->tpl_vars['needCaptcha']->value){?>
			<div class="field-container">
				<div class="field-icon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/libs/kcaptcha/index.php" />
				</div>
				<div class="field-input"><input type="text" name="captcha" value="" id="capctha-field" /></div>
				<div class="clear"></div>
			</div>
			<?php }?>
			<div class="field-container">
				<div id="save-password-container">
					<div id="save-password-checkbox">
						<div class="checkbox-controller-container" val="1" key="savePassword">
							<div class="checkbox-controller-icon"></div>
							<div class="checkbox-controller-title"><?php echo $_smarty_tpl->tpl_vars['messages']->value['login_form']['save_password'];?>
</div>
							<div class="clear"></div>
							<input type="hidden" name="savePassword" value="" />
						</div>
					</div>
					<!--<div id="lost-password-link"><a href="#"><?php echo $_smarty_tpl->tpl_vars['messages']->value['login_form']['lost_password'];?>
</a></div>-->
				</div>
				<div id="login-button-container">
					<div class="button-std" onclick="document.getElementById('login-form').submit()"><?php echo $_smarty_tpl->tpl_vars['messages']->value['login_form']['login'];?>
</div>
				</div>
				<div class="clear"></div>
			</div>
			<input type="hidden" name="csrf_key" value="<?php echo $_smarty_tpl->tpl_vars['csrf_key']->value;?>
" />
			</form>
		</div>
		
		<!-- scripts -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/jquery.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/checkbox-controller.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/login_actions.js"></script>
		<!-- scripts end -->
		
	</body>
</html><?php }} ?>