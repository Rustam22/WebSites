<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:58:11
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56335184458f66fd3038403-25860445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94009927dc891a4f92142acdce05cbefaf939998' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/textarea.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56335184458f66fd3038403-25860445',
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
  'unifunc' => 'content_58f66fd31239d1_16350115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66fd31239d1_16350115')) {function content_58f66fd31239d1_16350115($_smarty_tpl) {?><div class="field-container textfield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
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