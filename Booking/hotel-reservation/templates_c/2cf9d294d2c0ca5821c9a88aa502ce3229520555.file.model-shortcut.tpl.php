<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:05:24
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-shortcut.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65899730758c1fbd4a0cde8-17657631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cf9d294d2c0ca5821c9a88aa502ce3229520555' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-shortcut.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65899730758c1fbd4a0cde8-17657631',
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
  'unifunc' => 'content_58c1fbd4a46ce7_73126610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fbd4a46ce7_73126610')) {function content_58c1fbd4a46ce7_73126610($_smarty_tpl) {?><div class="shortcut-container new-window" title="<?php echo $_smarty_tpl->tpl_vars['model_main_title']->value;?>
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