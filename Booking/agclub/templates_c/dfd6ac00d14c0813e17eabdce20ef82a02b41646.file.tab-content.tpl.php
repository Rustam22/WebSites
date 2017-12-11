<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:12:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tab-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2868511358c1fd77d852c8-67463171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfd6ac00d14c0813e17eabdce20ef82a02b41646' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tab-content.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2868511358c1fd77d852c8-67463171',
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
  'unifunc' => 'content_58c1fd77d8cbc9_50346943',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd77d8cbc9_50346943')) {function content_58c1fd77d8cbc9_50346943($_smarty_tpl) {?><div class="window-tab-content tab-<?php echo $_smarty_tpl->tpl_vars['tab_index']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['tab_title']->value;?>
">
	<?php echo $_smarty_tpl->tpl_vars['tab_content']->value;?>

</div><?php }} ?>