<?php /* Smarty version Smarty-3.1.8, created on 2017-03-11 17:59:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/objects-selectfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6914882158c402c8d01798-65049281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06b842587ac115aa47a12aa1d099059b3bf84597' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/objects-selectfield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6914882158c402c8d01798-65049281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'lang' => 0,
    'elementId' => 0,
    'value' => 0,
    'keyValue' => 0,
    'defaultValue' => 0,
    'k' => 0,
    'v' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c402c8dc8202_73281876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c402c8dc8202_73281876')) {function content_58c402c8dc8202_73281876($_smarty_tpl) {?><div class="field-container selectfield-div">
	<div class="left">
		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>
	</div>
	<div class="right" id="<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
">
		<div class="selectfield-container relative">
			<div class="select-container relative">
				<div class="selected-value-container">
					<div class="selected-value left">
						<?php if (isset($_smarty_tpl->tpl_vars['value']->value)){?><?php echo $_smarty_tpl->tpl_vars['keyValue']->value[$_smarty_tpl->tpl_vars['value']->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['keyValue']->value[$_smarty_tpl->tpl_vars['defaultValue']->value];?>
<?php }?>
					</div>
					<div class="selected-value-pointer"></div>
					<div class="clear"></div>
				</div>
				<div class="select-options-container absolute hide">
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keyValue']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						<div class="select-option" key="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</div>
					<?php } ?>
				</div>
				<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"/>
			</div>
		</div>
	</div>
	<script>
		if (typeof selectIndex == 'undefined') selectIndex = 0;
		if (typeof select == 'undefined') select = [];
		if (typeof selectSelf == 'undefined') selectSelf = [];
		select[selectIndex] = new SelectController('#<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
');
		selectSelf[selectIndex] = select[selectIndex].getSelf();
		selectSelf[selectIndex].onChange = function(key){
			switch(parseInt(key)) {
				case 1:
					$(this.identifier).parents('.window').find('.objects-item-map').hide();
					$(this.identifier).parents('.window').find('.objects-item-object').show();
					break;
				case 2:
					$(this.identifier).parents('.window').find('.objects-item-map').show();
					$(this.identifier).parents('.window').find('.objects-item-object').hide();
					break;
				case 3:
					$(this.identifier).parents('.window').find('.objects-item-map, .objects-item-object').show();
					break;
			}
		}
		select[selectIndex].setSelf(selectSelf[selectIndex]);
		<?php if (isset($_smarty_tpl->tpl_vars['value']->value)){?>
			select[selectIndex].setValue('<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
');
		<?php }else{ ?>
			select[selectIndex].setValue(3);
		<?php }?>
		selectIndex++;
	</script>
	<div class="clear"></div>
</div><?php }} ?>