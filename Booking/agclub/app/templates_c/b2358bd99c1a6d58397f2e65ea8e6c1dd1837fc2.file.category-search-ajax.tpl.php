<?php /* Smarty version Smarty-3.1.8, created on 2013-02-04 14:24:48
         compiled from "/var/www/mbapp.az/app/views/category/category-search-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:829576350510f75eb10aa03-12199250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2358bd99c1a6d58397f2e65ea8e6c1dd1837fc2' => 
    array (
      0 => '/var/www/mbapp.az/app/views/category/category-search-ajax.tpl',
      1 => 1359969391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '829576350510f75eb10aa03-12199250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f75eb21d3b2_15780811',
  'variables' => 
  array (
    'simpleObj' => 0,
    'app_url' => 0,
    'o' => 0,
    'static_url' => 0,
    'public_url' => 0,
    'first' => 0,
    'search_text' => 0,
    'enable_more' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f75eb21d3b2_15780811')) {function content_510f75eb21d3b2_15780811($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['simpleObj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['objects_f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
$_smarty_tpl->tpl_vars['o']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['objects_f']['index']++;
?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']%3==0){?>
		<div class="clear show-in-767"></div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']%2==0){?>
		<div class="clear show-in-479"></div>
	<?php }?>
	<div class="element-container left relative">
		<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/element-bg.png" class="width100" /></a>
		<div class="absolute element-icon">
			<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['o']->value['objLogo'];?>
" class="width100" /></a>
		</div>
		<div class="element-title">
			<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
');" class="txt-color-dark no-decoration font20 bold"><?php echo $_smarty_tpl->tpl_vars['o']->value['objTitle'];?>
</a>
		</div>
	</div>
<?php } ?>
<div class="clear"></div>

<?php if (isset($_smarty_tpl->tpl_vars['first']->value)){?>
	<div class="show-more-point hide"></div>
	<div class="show-more" page-number="1" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/search/object/<?php echo $_smarty_tpl->tpl_vars['search_text']->value;?>
/page/" <?php if (!$_smarty_tpl->tpl_vars['enable_more']->value){?>style="display: none;"<?php }?>><a href="javascript:showMore();" class="show-more-a" style="text-decoration: none; color: #fff;">Daha artiq göstər</a></div>
<?php }?><?php }} ?>