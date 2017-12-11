<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:44:18
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/utils/get-link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137157283758c204f29d1445-88821713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71493132d5ec7fe8114eb49bca1974747e922ec0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/utils/get-link.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137157283758c204f29d1445-88821713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'p' => 0,
    'app_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c204f2a0a556_06402402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c204f2a0a556_06402402')) {function content_58c204f2a0a556_06402402($_smarty_tpl) {?><div style="background-color: #eee; border-radius: 10px; overflow: hidden;">	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>		<div style="width: 600px; margin-top: 10px; background-color: #eee; padding: 5px; border-bottom: 1px solid #ccc;">			<div class="left" style="width: 40%;">				<?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
<?php if (!$_smarty_tpl->tpl_vars['p']->value->visible->value){?> - <b>!in</b><?php }?>			</div>			<div class="right" style="width: 55%; margin-left: 5%;">				<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<lang>/view-page/<?php echo $_smarty_tpl->tpl_vars['p']->value->r_id->value;?>
" style="width: 90%; height: 25px; border: 1px solid #ccc;" />			</div>			<div class="clear"></div>		</div>	<?php } ?></div><?php }} ?>