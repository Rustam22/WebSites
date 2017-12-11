<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:58:24
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tree/tree-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9187888558f66fe0e56ff3-75805997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea45cc8c797c9f2f873337056709f41a13cf4062' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/tree/tree-view.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9187888558f66fe0e56ff3-75805997',
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
  'unifunc' => 'content_58f66fe0e82767_05753434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66fe0e82767_05753434')) {function content_58f66fe0e82767_05753434($_smarty_tpl) {?><div class="tree-items-container" id="tree-<?php echo $_smarty_tpl->tpl_vars['randomNum']->value;?>
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