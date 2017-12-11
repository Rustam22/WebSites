<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:10:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/paginator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192017853458c1fd1979fdb0-55741763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aab0958ed7192e05830da78f2f78bdbac06fa381' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/paginator.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192017853458c1fd1979fdb0-55741763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_page' => 0,
    'model_id' => 0,
    'static_url' => 0,
    'theme_folder' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fd1983f082_74586509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd1983f082_74586509')) {function content_58c1fd1983f082_74586509($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['current_page']->value>0){?>
	<a href="javascript:void(0)" url="view/<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
" class="block-reload paginator-item paginator-item-arrow" ><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/paginator-to-left-arrow.png" /></a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['count']->value+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['name'] = 'paginator';
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['paginator']['total']);
?>
	<a href="javascript:void(0)" url="view/<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
/page/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['paginator']['index']-1;?>
" class="block-reload paginator-item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['paginator']['index']==($_smarty_tpl->tpl_vars['current_page']->value+1)){?>paginator-item-active<?php }?>" ><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['paginator']['index'];?>
</a>
<?php endfor; endif; ?>
<?php if ($_smarty_tpl->tpl_vars['current_page']->value<count($_smarty_tpl->tpl_vars['count']->value)){?>
	<a href="javascript:void(0)" url="view/<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" class="block-reload paginator-item paginator-item-arrow" ><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/paginator-to-right-arrow.png" /></a>
<?php }?><?php }} ?>