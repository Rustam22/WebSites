<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:12:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200498708858c1fd77d626e5-61225247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e30da44a41823d0bd3578522ae6f5af41a6f599b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/textarea.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200498708858c1fd77d626e5-61225247',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'name' => 0,
    'value' => 0,
    'forContent' => 0,
    'randId' => 0,
    'id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fd77d829f4_32571890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd77d829f4_32571890')) {function content_58c1fd77d829f4_32571890($_smarty_tpl) {?><div class="field-container textfield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">	<div class="left field-title">		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>	</div>	<div class="right">		<textarea name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="textarea field" ><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</textarea>		<?php if (isset($_smarty_tpl->tpl_vars['forContent']->value)){?>			<input type="hidden" name="fieldLang[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
" />			<input type="hidden" name="fieldId[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />			<input type="hidden" name="fieldType[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />		<?php }?>	</div>	<div class="clear"></div></div><?php }} ?>