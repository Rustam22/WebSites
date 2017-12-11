<?php /* Smarty version Smarty-3.1.8, created on 2017-03-28 07:22:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/views/service-network/serv-net.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62084871758c1f9628685f3-69532096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0349d05b2ff6027fb9267ee21199a7bee1312932' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/service-network/serv-net.tpl',
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
  'nocache_hash' => '62084871758c1f9628685f3-69532096',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1f962b64193_47613800',
  'variables' => 
  array (
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1f962b64193_47613800')) {function content_58c1f962b64193_47613800($_smarty_tpl) {?>


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