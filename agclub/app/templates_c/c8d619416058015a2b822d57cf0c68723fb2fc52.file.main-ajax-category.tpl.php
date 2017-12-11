<?php /* Smarty version Smarty-3.1.8, created on 2014-09-10 15:14:37
         compiled from "/home/agclub/public_html/app/views/main/main-ajax-category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1428072085510f9cc16456b5-47787326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8d619416058015a2b822d57cf0c68723fb2fc52' => 
    array (
      0 => '/home/agclub/public_html/app/views/main/main-ajax-category.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1428072085510f9cc16456b5-47787326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f9cc16cc0c1_06316376',
  'variables' => 
  array (
    'categories' => 0,
    'app_url' => 0,
    'c' => 0,
    'static_url' => 0,
    'public_url' => 0,
    'enable_more' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f9cc16cc0c1_06316376')) {function content_510f9cc16cc0c1_06316376($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories_f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories_f']['index']++;
?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']%4==0){?>
		<div class="clear show-in-960"></div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']%3==0){?>
		<div class="clear show-in-767"></div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['categories_f']['index']%2==0){?>
		<div class="clear show-in-479"></div>
	<?php }?>
	<div class="element-container left relative">
		<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['c']->value->id->value;?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/element-bg.png" class="width100" /></a>
		<div class="absolute element-icon category-icon">
			<div class="width100">
				<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['c']->value->id->value;?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->categoryItemImage->value;?>
" class="width100" /></a>
			</div>
		</div>
		<div class="element-title">
			<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['c']->value->id->value;?>
');" class="txt-color-dark no-decoration font20 bold"><?php echo $_smarty_tpl->tpl_vars['c']->value->categoryItemTitle->value;?>
</a>
		</div>
	</div>
	
<?php } ?>
<div class="clear"></div>

<div class="show-more-point hide"></div>

<div class="show-more" page-number="1" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/categories/" <?php if (!$_smarty_tpl->tpl_vars['enable_more']->value){?>style="display: none;"<?php }?>><a href="javascript:showMore();" class="show-more-a" style="text-decoration: none; color: #fff;">Daha artıq göstər</a></div>

<script>
	activateListButton();
</script><?php }} ?>