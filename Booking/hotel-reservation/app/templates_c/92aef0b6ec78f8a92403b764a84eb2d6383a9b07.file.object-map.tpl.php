<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 22:42:30
         compiled from "/home/agclub/public_html/app/views/objects/object-map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1931536012510f9cc96eb419-95699369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92aef0b6ec78f8a92403b764a84eb2d6383a9b07' => 
    array (
      0 => '/home/agclub/public_html/app/views/objects/object-map.tpl',
      1 => 1361776561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1931536012510f9cc96eb419-95699369',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f9cc9726070_92117482',
  'variables' => 
  array (
    'map' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f9cc9726070_92117482')) {function content_510f9cc9726070_92117482($_smarty_tpl) {?><div class="object-map-container">
	<?php echo $_smarty_tpl->tpl_vars['map']->value;?>

</div>
<script>
	activateMapButton();
</script><?php }} ?>