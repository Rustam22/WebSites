<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:45:39
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/model-shortcut.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203394821358f66ce3554cc5-48730629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c2b3ad22689696816c814165d13e32f345c2e79' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/model-shortcut.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203394821358f66ce3554cc5-48730629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model_main_title' => 0,
    'model_use_own_view_url' => 0,
    'model_own_view_url' => 0,
    'app_url' => 0,
    'admin_title' => 0,
    'model_main_id' => 0,
    'static_url' => 0,
    'theme_folder' => 0,
    'model_main_icon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66ce35cab72_52414321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66ce35cab72_52414321')) {function content_58f66ce35cab72_52414321($_smarty_tpl) {?><div class="shortcut-container new-window" title="<?php echo $_smarty_tpl->tpl_vars['model_main_title']->value;?>
" data-url="<?php if ($_smarty_tpl->tpl_vars['model_use_own_view_url']->value===true){?><?php echo $_smarty_tpl->tpl_vars['model_own_view_url']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/view/<?php echo $_smarty_tpl->tpl_vars['model_main_id']->value;?>
<?php }?>">
	<div class="shortcut-icon width100"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/icons/<?php echo $_smarty_tpl->tpl_vars['model_main_icon']->value;?>
" class="" /></div>
	<div class="shortcut-text"><?php echo $_smarty_tpl->tpl_vars['model_main_title']->value;?>
</div>
</div><?php }} ?>