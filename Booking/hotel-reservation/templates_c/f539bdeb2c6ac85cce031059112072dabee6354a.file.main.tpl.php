<?php /* Smarty version Smarty-3.1.8, created on 2016-08-24 09:57:24
         compiled from "E:\phpDev\htdocs\toxumculuq\views\main\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1739957bd374436a1f7-27614051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f539bdeb2c6ac85cce031059112072dabee6354a' => 
    array (
      0 => 'E:\\phpDev\\htdocs\\toxumculuq\\views\\main\\main.tpl',
      1 => 1472017950,
      2 => 'file',
    ),
    '8baa98f989fe0634f77fca32b254a0a7c311d8c1' => 
    array (
      0 => 'E:\\phpDev\\htdocs\\toxumculuq\\views\\base.tpl',
      1 => 1472017950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1739957bd374436a1f7-27614051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    'static_url' => 0,
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
    'treeSubItem' => 0,
    'treeSub3Item' => 0,
    'currentLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_57bd374486dcd3_84764247',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bd374486dcd3_84764247')) {function content_57bd374486dcd3_84764247($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BİTKİ VƏ TOXUM Main page</title>

    <!-- Bootstrap -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/owl.theme.css" rel="stylesheet" >
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/ihover.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/js-image-slider.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/ddmenu.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/stylesheets/unite-gallery.css" rel="stylesheet">
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/jssor.slider.mini.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/js-image-slider.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/bootstrap.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/owl.carousel.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/ddmenu.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/plant_seed.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/ug-theme-tiles.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/ug-theme-video.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/js/unitegallery.min.js"></script>
</head>

<body>
<!-- header begin -->

<header>
    <div class="header_footer_inside">

        <div class="header_footer_inside_left">
            <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/logo.png">
                <div class="logo_text">
                    <h4 class="text-bold">AZƏRBAYCAN RESPUBLIKASININ KƏND TƏSƏRRÜFATI NAZİRLİYİ YANINDA</h4>
                    <h4 class="text-white text-spacing">BİTKİ SORTLARININ QEYDİYYATI VƏ TOXUM NƏZARƏTİ ÜZRƏ DÖVLƏT XİDMƏTİ</h4>
                </div>
            </a>
        </div>

        <div class="header_footer_inside_right">
            <div class="lang">
                <a href="">AZE</a>
                <a href="">RUS</a>
                <a href="">ENG</a>
            </div>

            <div class="cagri">
                <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/cagri.png">
            </div>

        </div>
        <div class="clear-both"></div>

        <div class="row">
            <div class="col-lg-9">
                <nav id="ddmenu">
                    <div class="menu-icon"></div>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->r_id->value!=44){?>
                                <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->visible->value>0){?>
                                <li class="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->class->value;?>
">
                                    <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->clickable->value==0){?>
                                        <span class="top-heading"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</span>
                                    <?php }else{ ?>
                                        <a class="top-heading" href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
                                    <i class="caret"></i>
                                    <div class="dropdown <?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->class->value;?>
">
                                        <div class="dd-inner">
                                            <ul class="column">
                                                <?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->visible->value>0){?>
                                                    <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->newColumn->value>0){?>
                                                    </ul>
                                                    <ul class="column">
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->clickable->value>0){?>
                                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->url;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</h4></a></li>
                                                    <?php }else{ ?>
                                                    <li><h4><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</h4>
                                                    <?php }?>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['treeSubItem']->value['items'])){?>
                                                        <ul class="column">
                                                            <?php  $_smarty_tpl->tpl_vars['treeSub3Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSub3Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeSubItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSub3Item']->key => $_smarty_tpl->tpl_vars['treeSub3Item']->value){
$_smarty_tpl->tpl_vars['treeSub3Item']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->visible->value>0){?>
                                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->menuItemTitle->value;?>
</a></li>
                                                            <?php }?>
                                                            <?php } ?>
                                                        </ul>
                                                        <?php }?>
                                                    </li>
                                                <?php }?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php }?>
                                </li>
                                <?php }?>
                            <?php }?>
                        <?php } ?>
                    </ul>


                </nav>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Axtar" name="search_text">
                    <span class="input-group-btn">
                        <button class="btn btn-success glyphicon glyphicon-search" id="search_button" type="button"></button>
                    </span>
                </div>
            </div>
        </div>

    </div>
</header>
<script>
    $("#search_button").click(function(){
        document.location.replace('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/search/' + $("input[name='search_text']").val());
    });
    $("input[name='search_text']").keyup(function (e) {
        if (e.keyCode == 13) {
            document.location.replace('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/search/' + $("input[name='search_text']").val());
        }
    });
</script>


<!-- header end -->

<div id="wrapper">

    
<div id="sliderFrame">
	<div id="slider">
		<?php  $_smarty_tpl->tpl_vars['sliderItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sliderItem']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sliderItem']->key => $_smarty_tpl->tpl_vars['sliderItem']->value){
$_smarty_tpl->tpl_vars['sliderItem']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sliderItem']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>
			<a href="javascript:void(0)" target="_blank">
				<img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['image'];?>
" alt="" />
			</a>
			<?php }else{ ?>
			<a class="lazyImage" href="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['image'];?>
"><?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['title_text'];?>
</a>
			<?php }?>
		<?php } ?>
	</div>
	<!--thumbnails-->
	<div id="thumbs">
		<?php  $_smarty_tpl->tpl_vars['sliderItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sliderItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sliderItem']->key => $_smarty_tpl->tpl_vars['sliderItem']->value){
$_smarty_tpl->tpl_vars['sliderItem']->_loop = true;
?>
		<div class="thumb">
			<div class="thumb-content"><h3><a href="<?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['title_text'];?>
</a></h3><?php echo $_smarty_tpl->tpl_vars['sliderItem']->value['description'];?>
</div>
			<div style="clear:both;"></div>
		</div>
		<?php } ?>

	</div>
	<!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
	<div class="clear-both"></div>
</div>


    
<div class="plants_seeds_block">
	<div class="plants_seeds_block_left">
		<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->r_id->value==15){?>
				<?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
					<?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
					<div class="plants_seeds">
						<h3><?php echo $_smarty_tpl->tpl_vars['mainPageItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</h3>
						<?php if (isset($_smarty_tpl->tpl_vars['treeSubItem']->value['items'])){?>
						<div class="plants_seeds_inside">
							<ul class="list-unstyled">
								<?php  $_smarty_tpl->tpl_vars['treeSub3Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSub3Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeSubItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSub3Item']->key => $_smarty_tpl->tpl_vars['treeSub3Item']->value){
$_smarty_tpl->tpl_vars['treeSub3Item']->_loop = true;
?>
								<li>
									<a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['mainPageItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->menuItemTitle->value;?>
</a>
								</li>
								<?php } ?>
							</ul>
						</div>
						<?php }?>
					</div>
					<?php } ?>
				<?php }?>
			<?php }?>
		<?php } ?>
	</div>
	<div class="plants_seeds_block_right">
		<h3><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[46]->menuItemTitle->value;?>
</h3>
		<div class="plants_seeds_block_right_inside">
			<ul class="list-unstyled">
				<?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->r_id->value==44){?>
						<?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
							<?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->r_id->value==45){?>
									<?php if (isset($_smarty_tpl->tpl_vars['treeSubItem']->value['items'])){?>
										<?php  $_smarty_tpl->tpl_vars['treeSub3Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSub3Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeSubItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSub3Item']->key => $_smarty_tpl->tpl_vars['treeSub3Item']->value){
$_smarty_tpl->tpl_vars['treeSub3Item']->_loop = true;
?>
											<a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->url;?>
"><li><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSub3Item']->value['id']]->menuItemTitle->value;?>
</li></a>
										<?php } ?>
									<?php }?>
								<?php }?>
							<?php } ?>
						<?php }?>
					<?php }?>
				<?php } ?>
			</ul>
		</div>

	</div>
	<div class="clear-both"></div>
</div>

    
	<div class="news_block">
		<div class="news_block_inside">

			<div class="row">
				<div class="col-md-6">
					<a href="http://sorttoxumagro.gov.az/az/news/view/1"><h3>XƏBƏRLƏR</h3></a>
					<hr>
					<?php if (!empty($_smarty_tpl->tpl_vars['news']->value->image->value)){?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['news']->value->image->value;?>
">
					<?php }?>
					<h4><?php echo $_smarty_tpl->tpl_vars['news']->value->itemTitle->value;?>
</h4>
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news/view/<?php echo $_smarty_tpl->tpl_vars['news']->value->r_id->value;?>
"><p><?php echo $_smarty_tpl->tpl_vars['news']->value->description->value;?>
</p></a>
					<p><span><?php echo $_smarty_tpl->tpl_vars['news']->value->date->value;?>
</span></p>
				</div>
				<div class="col-md-6">
					<a href="http://sorttoxumagro.gov.az/az/ads/view/16"><h3>ELANLAR</h3></a>
					<hr>
					<?php if (!empty($_smarty_tpl->tpl_vars['ad']->value->image->value)){?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ad']->value->image->value;?>
">
					<?php }?>
					<h4><?php echo $_smarty_tpl->tpl_vars['ad']->value->itemTitle->value;?>
</h4>
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/ads/view/<?php echo $_smarty_tpl->tpl_vars['ad']->value->r_id->value;?>
"><p><?php echo $_smarty_tpl->tpl_vars['ad']->value->description->value;?>
</p></a>
					<p><span><?php echo $_smarty_tpl->tpl_vars['ad']->value->date->value;?>
</span></p>
				</div>
			</div>
		</div>
	</div>


    
<div class="foto_video">
	<div class="foto_video_inside">
		<div class="row">
			<div class="col-md-6">
				<h3>FOTO</h3>
				<div id="owl-demo-foto">
				<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/gallery/photo/item/<?php echo $_smarty_tpl->tpl_vars['p']->value->id->value;?>
">
						<div class="item img-thumbnail">
							<div style="width:100px; height:60px; overflow:hidden"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value->image->value;?>
"></div>
						</div>
					</a>
				<?php } ?>
				</div>

			</div>

			<div class="col-md-6">
				<h3>VİDEO</h3>

				<div id="owl-demo-video">
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/gallery/video/item/<?php echo $_smarty_tpl->tpl_vars['v']->value->id->value;?>
">
						<div class="item img-thumbnail">
							<div style="width:100px; height:60px; overflow:hidden"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumb->value;?>
"></div>
						</div>
					</a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>



    
	<!--div class="elan_frame">
		<div class="elan_frame_in">
			<ul class="list-unstyled">

				<li>
					<a href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/elektron.png">
						<h4>Elektron xidmətlər</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/bazar.png">
						<h4>Bazar məlumatları</h4>
					</a>
				</li>

				<li>
					<a href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/istifade.png">
						<h4>İstifadə qaydaları</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/agrar.png">
						<h4>Agrar bazar</h4>
					</a>
				</li>
			</ul>
			<div class="clear-both"></div>
		</div>
	</div-->



    <div class="clear-both"></div>



    
	<div class="faydali_linkler">

		<h3 class="text-bold text-center">FAYDALI LİNKLƏR</h3>
		<a href="http://www.agro.gov.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_0.png"></a>
		<a href="http://www.agrolizing.gov.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_1.png"></a>
		<a href="http://www.adau.edu.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_2.png"></a>
		<a href="http://www.dfnx.gov.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_3.png"></a>
		<a href="http://texnaz.gov.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_4.png"></a>
		<a href="http://www.vet.gov.az" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/fl_5.png"></a>

	</div>

    <div class="clear-both"></div>
</div>


<footer>

    <div class="header_footer_inside">
        <div class="footer_above">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/location.png">
                    <p>AZ1000, Bakı, Səbail, Üzeyir Hacıbəyov 80</p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/phone.png">
                    <p>(+99412) 4987351</p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/elektron1.png">
                    <p>
					<a href="mailto:mail@sorttoxumagro.gov.az" style="color:white">mail@sorttoxumagro.gov.az</a>
					</p>
				</div>
            </div>
        </div>
        <div class="footer_below">
            <div class="f-left">
                <span class="text-white">© Azərbaycan Respublikasının Kənd Təsərrüfatı Nazirliyi yanında <br>Bitki Sortlarının Qeydiyyatı və Toxum Nəzarəti üzrə Dövlət Xidməti, 2016</span>
            </div>
            <div class="f-right">
                <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/face.png"></a>
                <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/twit.png"></a>
                <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/instag.png"></a>
                <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/google.png"></a>

            </div>

        </div>
        <div class="clear-both"></div>
    </div>
    <div class="clear-both"></div>
</footer>




</body>

</html><?php }} ?>