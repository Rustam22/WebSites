<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:51:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/imagefield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27142896558f66e3bd53e09-26277382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2da910b89abcef53874c51b3dca58597973c073f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/imagefield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27142896558f66e3bd53e09-26277382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'forContent' => 0,
    'randId' => 0,
    'id' => 0,
    'type' => 0,
    'messages' => 0,
    'value' => 0,
    'public_url' => 0,
    'app_url' => 0,
    'public_folder' => 0,
    'elementId' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66e3bda0420_16384720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66e3bda0420_16384720')) {function content_58f66e3bda0420_16384720($_smarty_tpl) {?><div class="field-container filefield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
" />
][]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
][]" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
</div>-->
/<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" target="_blank">

/imageresizer/resize/50/50/<?php echo $_smarty_tpl->tpl_vars['public_folder']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />-->
" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['fields_image_field']['select_image'];?>
</a>
">
</div>
">
" class="image-field-value" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />
').find('.image-field-value').val($(this).attr('path'));
'),
').click(function(){
').toggleClass('hide');
').find('.block-ui-window-close-button').click(function(){
').toggleClass('hide');