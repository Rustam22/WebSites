<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Starhotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{$static_url}/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{$static_url}/css/animate.css">
    <link rel="stylesheet" href="{$static_url}/css/bootstrap.css">
    <link rel="stylesheet" href="{$static_url}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$static_url}/css/owl.carousel.css">
    <link rel="stylesheet" href="{$static_url}/css/owl.theme.css">
    <link rel="stylesheet" href="{$static_url}/css/prettyPhoto.css">
    <link rel="stylesheet" href="{$static_url}/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <link rel="stylesheet" href="{$static_url}/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="{$static_url}/css/theme.css">
    <link rel="stylesheet" href="{$static_url}/css/colors/turquoise.css">
    <link rel="stylesheet" href="{$static_url}/css/responsive.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

    <!-- Javascripts -->
    <script type="text/javascript" src="{$static_url}/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.forms.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="{$static_url}/js/waypoints.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{$static_url}/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{$static_url}/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{$static_url}/js/custom.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script>
        var appData = {
            url: '{$app_url}',
            lang: '{$currentLang}',
            regSubmitUrl: '{$app_url}/{$currentLang}/registration',
            loginSubmitUrl: '{$app_url}/{$currentLang}/login',
            horoscopeSubmitUrl: '{$app_url}/{$currentLang}/horoscope/',
            objectsListUrl: '{$app_url}/{$currentLang}/objects/list/',
            objectsGetDiscountUrl: '{$app_url}/{$currentLang}/objects/getdiscount/',
            addCommentUrl: '{$app_url}/{$currentLang}/news/add/comment/',
            callToBankUrl: '{$app_url}/{$currentLang}/callto/addorder',
            getMapUrl: '{$app_url}/getmap',
            addRatingUrl: '{$app_url}/addrating',
            urls: {
                lostPswUrl: '{$app_url}/{$currentLang}/lostpsw',
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
                            <button class="btn btn-default btn-xs dropdown-toggle js-activated" type="button" data-toggle="dropdown"> {if $currentLang == 'en'}English{elseif $currentLang == 'it'}ITALIAN{/if} <span class="caret"></span> </button>
                            <ul class="dropdown-menu">
                                <li> <a href="{$app_url}/en">ENGLISH</a> </li>
                                <li> <a href="{$app_url}/it">ITALIAN</a> </li>
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
                <a href="{$app_url}/{$currentLang}" class="navbar-brand">
                    <!-- Logo -->
                    <div id="logo"> <img id="default-logo" src="{$static_url}/images/logo.png" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="{$static_url}/images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
                </a> </div>

            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    {foreach from=$menuTreeItems item=treeItem name=menuContent}
                            {if isset($treeItem.items)}
                                <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">{$menuModelItems[$treeItem.id]->menuItemTitle->value}<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        {foreach from=$treeItem.items item=treeSubItem}
                                            <li><a href="{$menuModelItems[$treeSubItem.id]->url}">{$menuModelItems[$treeSubItem.id]->menuItemTitle->value}</a></li>
                                        {/foreach}
                                    </ul>
                                </li>
                            {elseif !isset($treeItem.items)}
                                <li class="dropdown active">
                                    <a href="{$menuModelItems[$treeItem.id]->url}">{$menuModelItems[$treeItem.id]->menuItemTitle->value}</a>
                                </li>
                            {/if}
                    {/foreach}
                </ul>
            </div>

        </div>
    </div>

</header>



{block name="content"}

{/block}


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
</html>