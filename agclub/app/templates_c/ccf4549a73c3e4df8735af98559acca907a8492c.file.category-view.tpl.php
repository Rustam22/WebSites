<?php /* Smarty version Smarty-3.1.8, created on 2013-02-02 10:01:44
         compiled from "/var/www/mbapp.az/app/views/category/category-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1351984085510cabc862b397-25596299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccf4549a73c3e4df8735af98559acca907a8492c' => 
    array (
      0 => '/var/www/mbapp.az/app/views/category/category-view.tpl',
      1 => 1359716284,
      2 => 'file',
    ),
    '8755f8e1891ddcd31ceb8dffce5f48beeb82ded8' => 
    array (
      0 => '/var/www/mbapp.az/app/views/base.tpl',
      1 => 1359714962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351984085510cabc862b397-25596299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'app_url' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510cabc87c32d1_29488341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510cabc87c32d1_29488341')) {function content_510cabc87c32d1_29488341($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
	<?php echo $_smarty_tpl->tpl_vars['category']->value->categoryItemTitle->value;?>

</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/stylesheets.css" />
	</head>
	<body>
		
		<div id="header-container" class="width100">
			<div class="center-container">
				<div class="left map-button header-button button-inactive">
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/map" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/map-icon.png" class="width100" /></div>
							<div class="left txt-color-red font24 button-text bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['mbapp_map'];?>
</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="left list-button header-button button-active">
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/info-icon.png" class="width100" /></div>
							<div class="left txt-color-red font24 button-text bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['mbapp_tour'];?>
</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
			<div id="content-container" class="width100">
				<div class="center-container">
				
		<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
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
				<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/element-bg.png" class="width100" /></a>
				<div class="absolute element-icon">
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['o']->value['objLogo'];?>
" class="width100" /></a>
				</div>
				<div class="element-title">
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/object/<?php echo $_smarty_tpl->tpl_vars['o']->value['r_id'];?>
" class="txt-color-dark no-decoration font20 bold"><?php echo $_smarty_tpl->tpl_vars['o']->value['objTitle'];?>
</a>
				</div>
			</div>
		<?php } ?>
	<div class="clear"></div>
	
	<div class="show-more-point hide"></div>
	
	<div class="show-more" page-number="1" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/category/view/<?php echo $_smarty_tpl->tpl_vars['category']->value->id->value;?>
/page/" <?php if (!$_smarty_tpl->tpl_vars['enable_more']->value){?>style="display: none;"<?php }?>><a href="javascript:showMore();" class="show-more-a" style="text-decoration: none; color: #fff;">Daha artıq göstər</a></div>
	

				</div>
			</div>
		
		<!-- scripts -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/actions.js"></script>
		<!-- scripts end -->
		
	</body>
</html><?php }} ?>