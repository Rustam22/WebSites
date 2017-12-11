<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:58:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tree/tree-action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143264934858f66fe5c39b77-33089915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4487256add405a385469e3be5ca8d932295852d0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tree/tree-action.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143264934858f66fe5c39b77-33089915',
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
  'unifunc' => 'content_58f66fe5c90fc5_68760155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66fe5c90fc5_68760155')) {function content_58f66fe5c90fc5_68760155($_smarty_tpl) {?>
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