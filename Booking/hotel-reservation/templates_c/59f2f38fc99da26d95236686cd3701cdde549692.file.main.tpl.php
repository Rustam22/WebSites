<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:51:34
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/fm/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185769197558f66e46aa47a5-08213268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59f2f38fc99da26d95236686cd3701cdde549692' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/fm/main.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185769197558f66e46aa47a5-08213268',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'messages' => 0,
    'entries' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66e46b198c8_55505391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66e46b198c8_55505391')) {function content_58f66e46b198c8_55505391($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(rand(10000,99999), null, 0);?>
<div class="filemanager-main-container" id="fm-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
	<div class="fm-instruments-panel">
		<div class="fm-button create-folder-container">
			<div class="button-std create-folder-button"><?php echo $_smarty_tpl->tpl_vars['messages']->value['file_manager']['create_folder'];?>
</div>
			<div class="folder-name-container hide">
				<input type="text" class="folder-name textfield-input left" style="box-shadow: none; width: auto;" onclick="this.value=''" value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['file_manager']['folder_name'];?>
" />
				<div class="fm-button create-folder button-std create-folder-submit-button left">ok</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="fm-button button-std upload-file"><?php echo $_smarty_tpl->tpl_vars['messages']->value['file_manager']['upload_file'];?>
</div>
		<div class="clear"></div>
		<input type="file" class="file-to-upload-input hide" />
	</div>
	<div class="fm-entry">
		<?php if (isset($_smarty_tpl->tpl_vars['entries']->value)){?><?php echo $_smarty_tpl->tpl_vars['entries']->value;?>
<?php }?>
	</div>
	<div class="clear"></div>
</div>

<script>
	new FileManager({
		container: $('#fm-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'),
		allowActions: 1,
	});
</script><?php }} ?>