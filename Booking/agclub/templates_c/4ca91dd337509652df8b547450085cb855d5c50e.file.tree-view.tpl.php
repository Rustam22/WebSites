<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:07:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tree/tree-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22886265858c1fc6d5d3720-89174199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ca91dd337509652df8b547450085cb855d5c50e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/tree/tree-view.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22886265858c1fc6d5d3720-89174199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'randomNum' => 0,
    'tree_items' => 0,
    'tree_model_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fc6d600c01_75938785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fc6d600c01_75938785')) {function content_58c1fc6d600c01_75938785($_smarty_tpl) {?><div class="tree-items-container" id="tree-<?php echo $_smarty_tpl->tpl_vars['randomNum']->value;?>
">
</div>
<script>
	var items = <?php echo $_smarty_tpl->tpl_vars['tree_items']->value;?>
;
	(new Tree(items, '#tree-<?php echo $_smarty_tpl->tpl_vars['randomNum']->value;?>
', <?php echo $_smarty_tpl->tpl_vars['tree_model_id']->value;?>
)).draw('<?php echo $_smarty_tpl->tpl_vars['tree_model_id']->value;?>
');
</script><?php }} ?>