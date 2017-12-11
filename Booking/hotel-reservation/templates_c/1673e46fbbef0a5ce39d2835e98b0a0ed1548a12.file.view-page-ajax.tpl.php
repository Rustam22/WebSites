<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:59:30
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/views/content/view-page-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196856231658c20882e19c88-69309875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1673e46fbbef0a5ce39d2835e98b0a0ed1548a12' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/content/view-page-ajax.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196856231658c20882e19c88-69309875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'request_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c20882eb1bc1_64663478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c20882eb1bc1_64663478')) {function content_58c20882eb1bc1_64663478($_smarty_tpl) {?><div class="view-page-content view-page-content-small font16 relative" style="width: 96%;">
	<?php echo $_smarty_tpl->tpl_vars['page']->value->content->value;?>

	<br/>
	<div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['request_url']->value;?>
" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
</div>
<div class="clear"></div><?php }} ?>