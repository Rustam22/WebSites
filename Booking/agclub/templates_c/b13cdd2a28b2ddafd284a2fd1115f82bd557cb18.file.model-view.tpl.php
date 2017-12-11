<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:10:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168417886358c1fd198431d2-91358098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b13cdd2a28b2ddafd284a2fd1115f82bd557cb18' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-view.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168417886358c1fd198431d2-91358098',
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
  'unifunc' => 'content_58c1fd198568c9_42859020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd198568c9_42859020')) {function content_58c1fd198568c9_42859020($_smarty_tpl) {?><div class="block-container">
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