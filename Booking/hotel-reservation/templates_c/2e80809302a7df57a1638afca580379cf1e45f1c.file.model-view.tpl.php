<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:51:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/model-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153700853158f66e35761c11-23653584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e80809302a7df57a1638afca580379cf1e45f1c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/model-view.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153700853158f66e35761c11-23653584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model_content' => 0,
    'paginator' => 0,
    'model_id' => 0,
    'messages' => 0,
    'admin_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66e35774d69_39232122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66e35774d69_39232122')) {function content_58f66e35774d69_39232122($_smarty_tpl) {?><div class="block-container">
	<div class="block-content-container">
		<div class="block-content">
			<?php echo $_smarty_tpl->tpl_vars['model_content']->value;?>

		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="paginator-container">
	<p align="center"><?php echo $_smarty_tpl->tpl_vars['paginator']->value;?>
</p>
</div>
<div class="left action-buttons hide">
	<div class="button-std model-delete-checked" model-id="<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
">
		<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['delete_checked'];?>

	</div>
</div>
<div class="left action-buttons">
	<div class="button-std new-window" model-id="<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['add'];?>
" reload-parent="1" have-parent="1" data-url="<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/add/<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
">
		<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['add'];?>

	</div>
</div>
<div class="clear"></div><?php }} ?>