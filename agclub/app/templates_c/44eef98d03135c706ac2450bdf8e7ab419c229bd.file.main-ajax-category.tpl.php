<?php /* Smarty version Smarty-3.1.8, created on 2013-02-04 14:43:27
         compiled from "/var/www/mbapp.az/app/views/main/main-ajax-category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:338016535510f7bcc776858-87653797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44eef98d03135c706ac2450bdf8e7ab419c229bd' => 
    array (
      0 => '/var/www/mbapp.az/app/views/main/main-ajax-category.tpl',
      1 => 1359974601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '338016535510f7bcc776858-87653797',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f7bcc876c88_06372528',
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
<?php if ($_valid && !is_callable('content_510f7bcc876c88_06372528')) {function content_510f7bcc876c88_06372528($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories_f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories_f']['index']++;
?>
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
		<div class="absolute element-icon">
			<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['c']->value->id->value;?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->categoryItemImage->value;?>
" class="width100" /></a>
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

<div class="show-more" page-number="2" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/categories/" <?php if (!$_smarty_tpl->tpl_vars['enable_more']->value){?>style="display: none;"<?php }?>><a href="javascript:showMore();" class="show-more-a" style="text-decoration: none; color: #fff;">Daha artıq göstər</a></div>

<script>
	activateListButton();
</script><?php }} ?>