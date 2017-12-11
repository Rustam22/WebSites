<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 14:07:08
         compiled from "/home/agclub/public_html/app/views/category/category-view-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:815583083510f9cc442f771-59649061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '053ae53ea7aca53606bf4b09be22e668e54cc765' => 
    array (
      0 => '/home/agclub/public_html/app/views/category/category-view-ajax.tpl',
      1 => 1363336238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '815583083510f9cc442f771-59649061',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f9cc44a1ee2_02074383',
  'variables' => 
  array (
    'app_url' => 0,
    'static_url' => 0,
    'simpleObj' => 0,
    'o' => 0,
    'public_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f9cc44a1ee2_02074383')) {function content_510f9cc44a1ee2_02074383($_smarty_tpl) {?><div class="fixed" id="go-back-button">
	<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/main');"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/go-back.png" /></a>
</div>
<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['simpleObj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['objects_f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
$_smarty_tpl->tpl_vars['o']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['objects_f']['index']++;
?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']%4==0){?>
		<div class="clear show-in-960"></div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']%3==0){?>
		<div class="clear show-in-767"></div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']!=0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['objects_f']['index']%2==0){?>
		<div class="clear show-in-479"></div>
	<?php }?>
	<div class="element-container left relative" >
		<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/element-bg.png" class="width100" /></a>
		<div class="absolute element-icon" style="display: table; top: 0;">
			<div class="width100" style="display: table-cell; vertical-align: middle;">
				<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['o']->value['objLogo'];?>
" class="category-view-icon"/></a>
			</div>
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
<script>
	activateListButton();
</script><?php }} ?>