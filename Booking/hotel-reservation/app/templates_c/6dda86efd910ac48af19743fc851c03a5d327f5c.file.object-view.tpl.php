<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 11:16:20
         compiled from "/home/agclub/public_html/app/views/objects/object-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1008737993510f9cc79a4054-78115385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dda86efd910ac48af19743fc851c03a5d327f5c' => 
    array (
      0 => '/home/agclub/public_html/app/views/objects/object-view.tpl',
      1 => 1361776566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1008737993510f9cc79a4054-78115385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f9cc7a47f30_43574129',
  'variables' => 
  array (
    'app_url' => 0,
    'object' => 0,
    'static_url' => 0,
    'public_url' => 0,
    'childs' => 0,
    'messages' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f9cc7a47f30_43574129')) {function content_510f9cc7a47f30_43574129($_smarty_tpl) {?><div class="fixed" id="go-back-button">
	<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['object']->value->category->value;?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/go-back.png" /></a>
</div>
<div class="obj-data-container">
	<div class="object-logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['object']->value->objLogo->value;?>
" class="width100" />
	</div>
	<div class="txt-color-red font36 text-center"><?php echo $_smarty_tpl->tpl_vars['object']->value->discount->value;?>
</div>

	<br/>
	<?php if (!count($_smarty_tpl->tpl_vars['childs']->value)){?>
	<div class="obj-childs-container">
		<?php if ($_smarty_tpl->tpl_vars['object']->value->address->value){?>
		<div class="left obj-left bold txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['address'];?>
</div>
		<div class="right obj-right txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['object']->value->address->value;?>
</div>
		<div class="clear"></div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['object']->value->phone->value){?>
		<div class="left obj-left bold txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['phone_number'];?>
</div>
		<div class="right obj-right txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['object']->value->phone->value;?>
</div>
		<div class="clear"></div>
		<?php }?>
		<div class="left obj-left"><a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/view/<?php echo $_smarty_tpl->tpl_vars['object']->value->r_id->value;?>
');" class="font20 txt-color-dark"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['map'];?>
</a></div>
		<div class="clear"></div>
	</div>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['childs']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<div class="obj-childs-container">
			<?php if ($_smarty_tpl->tpl_vars['c']->value['address']){?>
			<div class="left obj-left bold txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['address'];?>
</div>
			<div class="right txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['c']->value['address'];?>
</div>
			<div class="clear"></div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value['phone']){?>
			<div class="left obj-left bold txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['phone_number'];?>
</div>
			<div class="right txt-color-dark font20"><?php echo $_smarty_tpl->tpl_vars['c']->value['phone'];?>
</div>
			<div class="clear"></div>
			<?php }?>
			<div class="left"><a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/view/<?php echo $_smarty_tpl->tpl_vars['c']->value['r_id'];?>
');" class="font20 txt-color-dark"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['map'];?>
</a></div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php }?>
</div><?php }} ?>