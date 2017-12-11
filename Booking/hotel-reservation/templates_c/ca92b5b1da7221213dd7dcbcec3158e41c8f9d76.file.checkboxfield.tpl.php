<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:13:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/checkboxfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135839689958c1fdcb2bfbb9-05951659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca92b5b1da7221213dd7dcbcec3158e41c8f9d76' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/checkboxfield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135839689958c1fdcb2bfbb9-05951659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'keyValue' => 0,
    'elementId' => 0,
    'k' => 0,
    'name' => 0,
    'value' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fdcb3ae6f0_52842562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fdcb3ae6f0_52842562')) {function content_58c1fdcb3ae6f0_52842562($_smarty_tpl) {?><div class="field-container checkboxfield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">
	<div class="left field-title">
		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>
	</div>
	<div class="right">
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keyValue']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['chkbx']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['chkbx']['index']++;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['chkbx']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['chkbx']['index']%2==0){?><div class="clear"></div><?php }?>
			<div id="checkbox-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['chkbx']['index'];?>
" class="left checkbox-controller-main-container">
				<div class="checkbox-controller-container" val="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" key="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]">
					<div class="checkbox-controller-icon <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['value']->value)){?>checkbox-controller-checked<?php }?>"></div>
					<div class="checkbox-controller-title"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</div>
					<div class="clear"></div>
					<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['value']->value)){?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php }?>" />
				</div>
			</div>
			<script>
				new CheckBoxController('#checkbox-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['chkbx']['index'];?>
'<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['value']->value)){?>,true<?php }?>);
			</script>
		<?php } ?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div><?php }} ?>