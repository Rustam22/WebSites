<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:12:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38959889758c1fd77d91244-44207267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '661f2e75124e9c7b122fe6193f503d4b7b0e20db' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/action.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38959889758c1fd77d91244-44207267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'randId' => 0,
    'success' => 0,
    'errors' => 0,
    'multilang' => 0,
    'url' => 0,
    'modelForm' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fd77da6ed9_32853461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd77da6ed9_32853461')) {function content_58c1fd77da6ed9_32853461($_smarty_tpl) {?><span id="span-<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
"></span>
<script>
	<?php if (isset($_smarty_tpl->tpl_vars['success']->value)){?>
		var success = '<?php echo $_smarty_tpl->tpl_vars['success']->value;?>
',
		errors = <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
,
		winId = $('#span-<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
').parents('.window').attr('id'),
		multiLang = '<?php echo $_smarty_tpl->tpl_vars['multilang']->value;?>
';
		if (success) {
			closeWindow(winId);
			showMessage(Lang['info'], Lang['saved']);
		} else {
			var errorsText = '';
			if (multiLang) {
				for (var i in errors) {
					errorsText += Lang[i] + ' ' + Lang['in_lang'] + ':<br/>';
					for (var j in errors[i]) {
						errorsText += errors[i][j] + ' ' + Lang['filled_not_correct'] + '; <br/> ';
					}
				}
			} else {
				// 
			}
			//getWindow(winId).setErrors(errorsText);
			showMessage(Lang['error'], errorsText, 15000);
		}
	<?php }?>
</script>
<form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="submitForm" method="post" enctype="multipart/form-data">
	<div class="window-inner-content">
		<?php echo $_smarty_tpl->tpl_vars['modelForm']->value;?>

	</div>
	<br/>
	<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['save'];?>
" name="saveItem" class="button-std input-std save-item" />
</form>
<iframe src="" name="submitForm" style="display: none;" ></iframe><?php }} ?>