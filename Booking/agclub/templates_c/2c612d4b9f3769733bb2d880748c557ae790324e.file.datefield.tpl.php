<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:42:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/datefield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84133769358c2049b09b7d8-96292938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c612d4b9f3769733bb2d880748c557ae790324e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/datefield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84133769358c2049b09b7d8-96292938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'elementId' => 0,
    'name' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c2049b14f338_93658966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c2049b14f338_93658966')) {function content_58c2049b14f338_93658966($_smarty_tpl) {?><div class="field-container datefield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>
"></div>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" class="datefield-input field hide" id="input-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
" />
').DatePicker({
',
',
').val(formated);