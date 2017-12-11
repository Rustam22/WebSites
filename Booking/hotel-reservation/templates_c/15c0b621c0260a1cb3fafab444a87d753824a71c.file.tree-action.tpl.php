<?php /* Smarty version Smarty-3.1.8, created on 2017-03-11 00:55:10
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tree/tree-action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6638709658c312ae533892-46966398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c0b621c0260a1cb3fafab444a87d753824a71c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tree/tree-action.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6638709658c312ae533892-46966398',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'treeForm' => 0,
    'modelForm' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c312ae542f20_88430391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c312ae542f20_88430391')) {function content_58c312ae542f20_88430391($_smarty_tpl) {?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="submitForm" method="post" enctype="multipart/form-data">
			<div class="window-inner-content">
				<?php echo $_smarty_tpl->tpl_vars['treeForm']->value;?>

				<?php echo $_smarty_tpl->tpl_vars['modelForm']->value;?>

			</div>
			<br/>
			<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['save'];?>
" name="saveItem" class="button-std input-std  save-item" />
		</form>
		<iframe src="" name="submitForm" style="display: none;"></iframe>
<?php }} ?>