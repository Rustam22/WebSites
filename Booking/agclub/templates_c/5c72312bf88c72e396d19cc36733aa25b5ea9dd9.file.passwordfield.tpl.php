<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 06:03:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/passwordfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48222198558c2097e916579-04117661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c72312bf88c72e396d19cc36733aa25b5ea9dd9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/passwordfield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48222198558c2097e916579-04117661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c2097e987c91_01141604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c2097e987c91_01141604')) {function content_58c2097e987c91_01141604($_smarty_tpl) {?><div class="field-container textfield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">	<div class="left field-title">		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
	</div>	<div class="right">		<input type="password" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="" class="textfield-input field" />	</div>	<div class="clear"></div></div><?php }} ?>