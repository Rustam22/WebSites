<?php /* Smarty version Smarty-3.1.8, created on 2017-03-28 07:22:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/views/companies/companies-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17547594558d9d713b42862-97949712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4004cf5bc954db3cd398e6a4bf7f5e3036596278' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/companies/companies-list.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
    'c76b54d4520074328f808ebb57d5035fb0f95968' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/base.tpl',
      1 => 1490671369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17547594558d9d713b42862-97949712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58d9d713bb80f0_54846989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d9d713bb80f0_54846989')) {function content_58d9d713bb80f0_54846989($_smarty_tpl) {?>


					<div class="menu-content hide">
						<div class="content-left-side">
							<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']++;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu767Left']['index']%2!=0){?>
									<div class="menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
" class="font15"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a></div>
								<?php }?>
							<?php } ?>
						</div>
						<div class="content-right-side">
							<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu767Left']['index']++;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu767Left']['index']%2==0){?>
									<div class="menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
" class="font15"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a></div>
								<?php }?>
							<?php } ?>
						</div>
						<div class="clear"></div>
					</div>


				<?php }} ?>