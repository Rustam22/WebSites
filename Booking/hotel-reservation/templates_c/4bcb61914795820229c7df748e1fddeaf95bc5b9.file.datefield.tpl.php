<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:59:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/datefield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149382860458f67014ba7e17-77482958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bcb61914795820229c7df748e1fddeaf95bc5b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/datefield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149382860458f67014ba7e17-77482958',
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
  'unifunc' => 'content_58f67014c9af87_23061767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f67014c9af87_23061767')) {function content_58f67014c9af87_23061767($_smarty_tpl) {?><div class="field-container datefield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
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