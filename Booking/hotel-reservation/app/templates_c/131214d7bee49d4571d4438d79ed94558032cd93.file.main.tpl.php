<?php /* Smarty version Smarty-3.1.8, created on 2014-06-02 15:02:13
         compiled from "/home/agclub/public_html/app/views/main/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:325202905510f9cba812f54-40443655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '131214d7bee49d4571d4438d79ed94558032cd93' => 
    array (
      0 => '/home/agclub/public_html/app/views/main/main.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
    'e7f6ed1cc6116efe615963a8772d4147c0684d99' => 
    array (
      0 => '/home/agclub/public_html/app/views/base.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325202905510f9cba812f54-40443655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510f9cba8de5b8_70969739',
  'variables' => 
  array (
    'static_url' => 0,
    'app_url' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510f9cba8de5b8_70969739')) {function content_510f9cba8de5b8_70969739($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
	AGClub - app
</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--<link type="text/css" href="http://code.jquery.com/mobile/latest/jquery.mobile.min.css" rel="stylesheet" />-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/stylesheets.css" />
		<script>
			var app = [];
			app['url'] = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
			app['search_url'] = 'search/object';
			app['not_found'] = '<p align="center" class="font20 txt-green">Sorgunuza uyğun ticarət obyekti tapılmadı. <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
" class="font24 txt-color-red">Bələdçi.</a></a>';
		</script>
	</head>
	<body>
		
		<div id="top-container" class="fixed width100">
			<div id="top-center" class="relative">
				<div id="top-title" class="left font36 relative">
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/title.png" style="width: 100px;" /></a>
					<div class="absolute hide" id="ajax-preloader">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/loading.gif" class="width100" />
					</div>
				</div>
				<div id="top-search-cnt" class="left absolute">
					<div class="width100">
						<input type="text" id="search-text" class="width100" />
						<div class="search-icon-cnt absolute">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/search-icon.png" class="width100" />
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="top-line"></div>
		</div>
		
		
		<div id="header-container" class="width100 fixed">
			<div class="center-container">
				<div class="left map-button header-button">
					<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/map')" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/map-icon.png" class="width100" /></div>
							<div class="left font20 button-text bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['mbapp_map'];?>
</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="left list-button header-button">
					<a href="javascript:loadUrl('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/main');" style="text-decoration: none;">
						<div class="button-container">
							<div class="left button-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/info-icon.png" class="width100" /></div>
							<div class="left font20 button-text bold"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['mbapp_tour'];?>
</div>
							<div class="clear"></div>
						</div>
					</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="width100" id="top-margin"></div>
		
		<div id="content-container" class="width100">
			<div class="center-container-big">
			
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
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

			</div>
		</div>
		
		<!-- scripts -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.js"></script>
		<!--<script src="http://code.jquery.com/mobile/latest/jquery.mobile.min.js"></script>-->
		<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/actions.js"></script>
		<!-- scripts end -->
		
	</body>
</html><?php }} ?>