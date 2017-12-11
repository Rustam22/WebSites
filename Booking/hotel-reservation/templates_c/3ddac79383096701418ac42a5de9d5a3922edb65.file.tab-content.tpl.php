<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:51:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tab-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17380170058f66e3bda3ef6-38009434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ddac79383096701418ac42a5de9d5a3922edb65' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tab-content.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17380170058f66e3bda3ef6-38009434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tab_index' => 0,
    'tab_title' => 0,
    'tab_content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66e3bdaadf1_27145763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66e3bdaadf1_27145763')) {function content_58f66e3bdaadf1_27145763($_smarty_tpl) {?><div class="window-tab-content tab-<?php echo $_smarty_tpl->tpl_vars['tab_index']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['tab_title']->value;?>
">
	<?php echo $_smarty_tpl->tpl_vars['tab_content']->value;?>

</div><?php }} ?>