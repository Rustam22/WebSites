<?php /* Smarty version Smarty-3.1.8, created on 2017-06-27 02:56:04
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/views/content/view-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22612438658ffaccb7deb44-86166644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f996df883b7160470f9a7d1890b1a83270eba024' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/views/content/view-page.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
    'ca47e7caa61577a813c38f2ca7a0ec63e281f5a3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/views/base.tpl',
      1 => 1498517672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22612438658ffaccb7deb44-86166644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58ffaccb905788_76720600',
  'variables' => 
  array (
    'static_url' => 0,
    'app_url' => 0,
    'currentLang' => 0,
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
    'treeSubItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ffaccb905788_76720600')) {function content_58ffaccb905788_76720600($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Starhotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/animate.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/prettyPhoto.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/theme.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/colors/turquoise.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/responsive.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

    <!-- Javascripts -->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.forms.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/custom.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script>
        var appData = {
            url: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
',
            lang: '<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
',
            regSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/registration',
            loginSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/login',
            horoscopeSubmitUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/horoscope/',
            objectsListUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/objects/list/',
            objectsGetDiscountUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/objects/getdiscount/',
            addCommentUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news/add/comment/',
            callToBankUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/callto/addorder',
            getMapUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/getmap',
            addRatingUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/addrating',
            urls: {
                lostPswUrl: '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/lostpsw',
            }
        }
    </script>
    <![endif]-->
</head>

<body>

<!-- Top header -->
<div id="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="th-text pull-left">
                    <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> +39 331-205-83-98</a> </div>
                    <div class="th-item"> <a href="mailto:rustam.atakishiyev@gmail.com"><i class="fa fa-envelope"></i> rustam.atakishiyev@gmail.com </a></div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="th-text pull-right">
                    <div class="th-item">
                        <div class="btn-group">
                            <button class="btn btn-default btn-xs dropdown-toggle js-activated" type="button" data-toggle="dropdown"> <?php if ($_smarty_tpl->tpl_vars['currentLang']->value=='en'){?>English<?php }elseif($_smarty_tpl->tpl_vars['currentLang']->value=='it'){?>ITALIAN<?php }?> <span class="caret"></span> </button>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/en">ENGLISH</a> </li>
                                <li> <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/it">ITALIAN</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="th-item">
                        <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header>

    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
" class="navbar-brand">
                    <!-- Logo -->
                    <div id="logo"> <img id="default-logo" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/images/logo.png" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
                </a> </div>

            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
                            <?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
                                <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php }elseif(!isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
                                <li class="dropdown active">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value;?>
</a>
                                </li>
                            <?php }?>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>

</header>




	<div class="fixed show-in-767 content-child-elements">
		<div class="content-child-elements-left">
			<?php if (count($_smarty_tpl->tpl_vars['childPages']->value)){?>
				<div class="view-page-childs">
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childPages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						<div class="child-menu">
							<div class="child-menu-pointer">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/child-page-pointer.png" />
							</div>
							<div class="child-menu-text">
								<?php if ($_smarty_tpl->tpl_vars['page']->value->r_id->value==$_smarty_tpl->tpl_vars['p']->value->r_id->value){?>
									<span class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</span>
								<?php }else{ ?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url->value;?>
" class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</a>
								<?php }?>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
				</div>
			<?php }?>
		</div>
		<div class="content-child-elements-right">
			<div class="content-child-elements-pointer" id="show-content-childs-menu">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/arrow-to-right.png" class="to-right" />
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/arrow-to-left.png" class="to-left hide" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php if (count($_smarty_tpl->tpl_vars['childPages']->value)){?>
		<div class="view-page-childs hide-in-767">
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childPages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
				<div class="child-menu">
					<div class="child-menu-pointer">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/child-page-pointer.png" />
					</div>
					<div class="child-menu-text">
						<?php if ($_smarty_tpl->tpl_vars['page']->value->r_id->value==$_smarty_tpl->tpl_vars['p']->value->r_id->value){?>
							<span class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</span>
						<?php }else{ ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url->value;?>
" class="font15" ><?php echo $_smarty_tpl->tpl_vars['p']->value->menuItemTitle->value;?>
</a>
						<?php }?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
		</div>
	<?php }?>
	<div class="clear show-in-767"></div>
	<div class="view-page-content view-page-content-small font16 relative" <?php if (!count($_smarty_tpl->tpl_vars['childPages']->value)){?>style="width: 96%;"<?php }?>>
		<div class="page-title font25"><?php echo $_smarty_tpl->tpl_vars['page']->value->menuItemTitle->value;?>
</div>
		<?php echo $_smarty_tpl->tpl_vars['page']->value->content->value;?>

		<br/>
		<div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['request_url']->value;?>
" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
	</div>
	<div class="clear"></div>
	



<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h4>About Starhotel</h4>
                <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpat. <br>
                    <br>
                    Nunc ut fringilla urna. Cras vel adipiscing ipsum. Integer dignissim nisl eu lacus interdum facilisis. Aliquam erat volutpat. Nulla semper vitae felis vitae dapibus. </p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Recieve our newsletter</h4>
                <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpa!</p>
                <form role="form">
                    <div class="form-group">
                        <input name="newsletter" type="text" id="newsletter" value="" class="form-control" placeholder="Please enter your E-mailaddress">
                    </div>
                    <button type="submit" class="btn btn-lg btn-black btn-block">Submit</button>
                </form>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>From our blog</h4>
                <ul>
                    <li><a href="#">Amazing post with all the goodies<br>
                            January 23, 2014</a></li>
                    <li><a href="#">Integer dignissim nisl eu lacus<br>
                            January 21, 2014</a></li>
                    <li><a href="#">Aliquam erat volutpat. Nulla semper<br>
                            January 14, 2014</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Address</h4>
                <address>
                    <strong>Twitter, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> <a href="#">(123) 456-7890</a><br>
                    <abbr title="Email">E:</abbr> <a href="#">mail@example.com</a><br>
                    <abbr title="Website">W:</abbr> <a href="#">www.slashdown.nl</a><br>
                </address>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6"> &copy; 2014 Starhotel All Rights Reserved </div>
                <div class="col-xs-6 text-right">
                    <ul>
                        <li><a href="contact-01.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
</html><?php }} ?>