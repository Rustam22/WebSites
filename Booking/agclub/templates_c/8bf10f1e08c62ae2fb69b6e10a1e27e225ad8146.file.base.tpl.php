<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:13:18
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80235060458c1fbd4a5e285-32703731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bf10f1e08c62ae2fb69b6e10a1e27e225ad8146' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/base.tpl',
      1 => 1489108395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80235060458c1fbd4a5e285-32703731',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fbd4b47ee9_69806410',
  'variables' => 
  array (
    'theme_folder' => 0,
    'static_url' => 0,
    'app_url' => 0,
    'admin_title' => 0,
    'public_folder' => 0,
    'user_info' => 0,
    'users_model_index' => 0,
    'messages' => 0,
    'top_panel_icons' => 0,
    'main_model_icons' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fbd4b47ee9_69806410')) {function content_58c1fbd4b47ee9_69806410($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MEQA SiteBuilder</title>
		<link rel="stylesheet/less" type="text/css" href="/agclub/modules/admin/static/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/less/stylesheets.less" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/less.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/get_static/js/admin"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/js/tiny_mce/tiny_mce.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/imagemanager/jscripts/mcimagemanager.js"></script>
		<script>
			var app = [];
			app['url'] = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
';
		</script>
		<style>
			.shortcut-text {
				color: white;
			}
		</style>
	</head>
	<body>
		<div id="desktop-container">
			<div id="top-panel-container">
				<div id="top-panel-wrapper">
					<div id="resizer-container">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/top-panel-resizer.png" />
					</div>
					<div id="top-panel-content">
						<div id="logo-container">
							<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/logo.png" /></a>
						</div>
						<div id="settings-container">
							<div id="user-avatar-container">
								<div id="user-avatar">
									<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/imageresizer/resize/50/50/<?php echo $_smarty_tpl->tpl_vars['public_folder']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user_info']->value->avatar->value;?>
" />
								</div>
								<div id="user-initials">
									<?php if (isset($_smarty_tpl->tpl_vars['user_info']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value->name->value;?>
<?php }?>
								</div>
								<div class="clear"></div>
							</div>
							<div id="settings-icon-container">
								<!--<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/settings-icon.png" />-->
							</div>
							<div class="clear"></div>
							<div id="settings-dropdown">
								<div class="setting-dropdown-item">
									<a class="new-window" data-url="admin/edit/<?php echo $_smarty_tpl->tpl_vars['users_model_index']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['user_info']->value->id->value;?>
" href="javascript:void(0)" title="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['user_settings'];?>
"><?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['user_settings'];?>
</a>
								</div>
								<div class="setting-dropdown-item"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/logout"><?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['logout'];?>
</a></div>
							</div>
						</div>
						<!-- Icons container shortcuts -->
						<div id="top-panel-icons-container">
							<?php echo $_smarty_tpl->tpl_vars['top_panel_icons']->value;?>

						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div id="desktop-elements-container">
				<div class="left">
				<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main_model_icons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['model_shortcuts']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['model_shortcuts']['index']++;
?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['model_shortcuts']['index']%5==0){?>
						</div>
						<div class="left">
					<?php }?>
					<?php echo $_smarty_tpl->tpl_vars['m']->value;?>

				<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div id="bottom-panel-container">
				<div id="bottom-panel-wrapper">
					<div id="bottom-panel-resizer">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/bottom-panel-resizer.png" />
					</div>
					<div id="bottom-panel-content"></div>
				</div>
			</div>
		</div>
		
		
		
		<!--  hidden layers -->
		<div id="window-popup" class="absolute hide window-popup">
			<div class="popup-item" action="0"><?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['reload'];?>
</div>
		</div>
		<!--  hidden layers end -->
		<!-- templates -->
		
		<script type="html/template" id="tab-button-container">
			<div class="window-header-tab-button tab-<<?php ?>%=index%<?php ?>>"><<?php ?>%=title%<?php ?>></div>
		</script>
		
		<script type="html/template" id="tree-item-tpl">
			<div class="tree-node-container" id="tree-item-<<?php ?>%=id%<?php ?>>-<<?php ?>%=randomNum%<?php ?>>" elId="<<?php ?>%=id%<?php ?>>" pId="<<?php ?>%=pId%<?php ?>>" url="<<?php ?>%=app['url']%<?php ?>>">
				<div class="tree-node">
					<div class="tree-node-slide <<?php ?>% if (childs.length == 0) { %<?php ?>>hidden<<?php ?>% } %<?php ?>>"></div>
					<div class="tree-node-title"><<?php ?>% if (first) { %<?php ?>><img src="<<?php ?>%=title%<?php ?>>" /><<?php ?>% } else { %<?php ?>> <<?php ?>%=title%<?php ?>> <<?php ?>% } %<?php ?>></div>
					<div class="tree-node-operations">
						<div class="tree-add-node new-window" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/structure/add/<<?php ?>%=treeModelId%<?php ?>>/<<?php ?>%=id%<?php ?>>" reload-parent="1" have-parent="1" title="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['add'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/tree-plus-icon.png" />
						</div>
						<<?php ?>% if (!first) { %<?php ?>>
						<div class="tree-edit-node new-window" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/structure/edit/<<?php ?>%=treeModelId%<?php ?>>/<<?php ?>%=id%<?php ?>>" reload-parent="1" have-parent="1" title="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['edit'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/tree-edit-icon.png" />
						</div>
						<div class="tree-delete-node" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/structure/delete/<<?php ?>%=treeModelId%<?php ?>>/<<?php ?>%=id%<?php ?>>">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/tree-remove-icon.png" />
						</div>
						<<?php ?>% } %<?php ?>>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="tree-node-sibling"></div>
				<div class="tree-node-childs">
					<<?php ?>%=childs%<?php ?>>
				</div>
			</div>
		</script>
		
		<script type="html/template" id="block-ui-template">
			<div class="block-ui-container" id="<<?php ?>%=id%<?php ?>>">
				<div class="block-ui-window">
					<div class="block-ui-window-header">
						<div class="block-ui-window-title"><<?php ?>%=title%<?php ?>></div>
						<div class="block-ui-window-close-button"></div>
						<div class="clear"></div>
					</div>
					<div class="block-ui-window-content"><<?php ?>%=message%<?php ?>></div>
				</div>
			</div>
		</script>
		
		<script type="html/template" id="taskbar-element-template">
			<div class="bottom-panel-item" id="<<?php ?>%=id%<?php ?>>">
				<div class="left bottom-panel-item-text"><<?php ?>%=title%<?php ?>></div>
				<div class="left bottom-panel-item-close-icon" onclick="closeWindow('<<?php ?>%=windowId%<?php ?>>')"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/window-close-button.png" /></div>
			</div>
		</script>
		
		<!-- show message tpl -->
		<script type="html/template" id="message-tpl">
			<div class="message-container" id="<<?php ?>%=id%<?php ?>>">
				<div class="message-title"><<?php ?>%=title%<?php ?>></div>
				<div class="message-content"><<?php ?>%=content%<?php ?>></div>
				<div class="button-std message-close"><<?php ?>%=Lang['close']%<?php ?>></div>
			</div>
		</script>
		
		<!-- window tpl -->
		<script type="html/template" id="window-template">
			<div class="window absolute">
				<div class="relative width100 height100">
					<div class="window-header">
							<div class="window-title"></div>
							<div class="window-buttons">
								<div class="window-button minimize-button"></div>
								<div class="window-button close-button"></div>
								<!--<div class="maximize-button window-button left"></div>-->
							</div>
							<div class="clear"></div>
						<div class="clear"></div>
					</div>
					<div class="window-errors-container"></div>
					<div class="window-header-tabs-container">
						<div class="clear"></div>
					</div>
					<div class="window-content-container relative">
						<div class="window-content"></div>
					</div>
					<div class="window-resizer"></div>
					<!--<div class="window-bottom-panel absolute text">sds</div>-->
				</div>
			</div>
		</script>
		
		<!-- tree item tpl -->
		
		
		<!-- templates end -->
		
		<!-- Javascripts -->
		
		<!-- Javascripts end -->
		
	</body>
</html><?php }} ?>