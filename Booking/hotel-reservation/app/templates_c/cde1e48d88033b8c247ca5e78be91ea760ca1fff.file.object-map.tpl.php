<?php /* Smarty version Smarty-3.1.8, created on 2013-02-04 14:37:59
         compiled from "/var/www/mbapp.az/app/views/objects/object-map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1287041420510f7a90c696f1-29160169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cde1e48d88033b8c247ca5e78be91ea760ca1fff' => 
    array (
      0 => '/var/www/mbapp.az/app/views/objects/object-map.tpl',
      1 => 1359974226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1287041420510f7a90c696f1-29160169',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f7a90d5c5a9_42268078',
  'variables' => 
  array (
    'map' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f7a90d5c5a9_42268078')) {function content_510f7a90d5c5a9_42268078($_smarty_tpl) {?><div class="object-map-container">
	<?php echo $_smarty_tpl->tpl_vars['map']->value;?>

</div>
<script>
	activateMapButton();
</script><?php }} ?>