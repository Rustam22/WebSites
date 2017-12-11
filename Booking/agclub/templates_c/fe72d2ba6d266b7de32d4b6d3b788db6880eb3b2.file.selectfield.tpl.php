<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:13:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/selectfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77643086958c1fdcb404e26-67902313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe72d2ba6d266b7de32d4b6d3b788db6880eb3b2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/selectfield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77643086958c1fdcb404e26-67902313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
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
  'unifunc' => 'content_58c1fdcb42f7a6_76448533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fdcb42f7a6_76448533')) {function content_58c1fdcb42f7a6_76448533($_smarty_tpl) {?><div class="field-container selectfield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">
	<div class="left field-title">
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
		new SelectController('#<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
');
	</script>
	<div class="clear"></div>
</div><?php }} ?>