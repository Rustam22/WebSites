<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 04:19:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/newActuary/views/main/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64851990058c1f10be1fd57-29209949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50327f5978264653c39c356b67c00e5d89a683c2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/newActuary/views/main/main.tpl',
      1 => 1472388492,
      2 => 'file',
    ),
    'f59534bc5fc8a2df5ff965f380c709ca8bd01740' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/newActuary/views/base.tpl',
      1 => 1472583472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64851990058c1f10be1fd57-29209949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    'currentLang' => 0,
    'menuTreeItems' => 0,
    'treeItem' => 0,
    'menuModelItems' => 0,
    'treeSubItem' => 0,
    'useful_links' => 0,
    'link' => 0,
    'flash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1f10c624fa0_74859659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1f10c624fa0_74859659')) {function content_58c1f10c624fa0_74859659($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Main page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/font/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/font/font.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/bootstrap/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/css/responsive.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/css/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/css/skins/dhtmlxmessage_dhx_terrace.css" media="screen" />
</head>
<body>
<div class="body_wrapper">
    <div class="center">
        <div class="header_area">
            <div class="logo floatleft logo-text"><h2 class="title">ACTUARY.AZ</h2></div>
            <div class="top_menu floatleft">
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
">Ana səhifə</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/faq">Suallar və cavablar</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/contact">Əlaqə</a></li>
                </ul>
            </div>
            <div class="social_plus_search floatright">
                <div class="social">
                    <ul>
                        <li>
                            <a hreflang="en" style="text-decoration: underline;" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/en/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHzSURBVHjaYkxOP8IAB//+Mfz7w8Dwi4HhP5CcJb/n/7evb16/APL/gRFQDiAAw3JuAgAIBEDQ/iswEERjGzBQLEru97ll0g0+3HvqMn1SpqlqGsZMsZsIe0SICA5gt5a/AGIEarCPtFh+6N/ffwxA9OvP/7//QYwff/6fZahmePeB4dNHhi+fGb59Y4zyvHHmCEAAAW3YDzQYaJJ93a+vX79aVf58//69fvEPlpIfnz59+vDhw7t37968efP3b/SXL59OnjwIEEAsDP+YgY53b2b89++/awvLn98MDi2cVxl+/vl6mituCtBghi9f/v/48e/XL86krj9XzwEEEENy8g6gu22rfn78+NGs5Ofr16+ZC58+fvyYwX8rxOxXr169fPny+fPn1//93bJlBUAAsQADZMEBxj9/GBxb2P/9+S/R8u3vzxuyaX8ZHv3j8/YGms3w8ycQARmi2eE37t4ACCDGR4/uSkrKAS35B3TT////wADOgLOBIaXIyjBlwxKAAGKRXjCB0SOEaeu+/y9fMnz4AHQxCP348R/o+l+//sMZQBNLEvif3AcIIMZbty7Ly6t9ZmXl+fXj/38GoHH/UcGfP79//BBiYHjy9+8/oUkNAAHEwt1V/vI/KBY/QSISFqM/GBg+MzB8A6PfYC5EFiDAABqgW776MP0rAAAAAElFTkSuQmCC" title="English" alt="English">&nbsp;ENG</a>
                        </li>
                        <li>
                            <a hreflang="ru" style="text-decoration: underline;" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ru/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69T8DAvz79w9CQVj/0MCffwwAAcQClObiAin6/x+okxHMgPCAbOb//5n+I4EXL74ABBALxGSwagTjPzbAyMgItAQggBg9Pf9nZPx//x7kjL9////9C2QAyf9//qCQQCQkxFhY+BEggFi2b/+nq8v46BEDSPQ3w+8//3//BqFfv9BJeXmQEwACCOSkP38YgHy4Bog0RN0vIOMXVOTPH6Cv/gEEEEgDxFKgHEgDXCmGDUAE1AAQQCybGZg1f/d8//XsH0jTn3+///z79RtE/v4NZfz68xfI/vOX+4/0ZoZFAAHE4gYMvD+3/v2+h91wCANo9Z+/jH9VxBkYAAKIBRg9TL//MEhKAuWAogxgZzGC2CCfgUggAoYdGAEVAwQQ41egu5AQAyoXTQoIAAIMAD+JZR7YOGEWAAAAAElFTkSuQmCC" title="Русский" alt="Русский">&nbsp;RUS</a>
                        </li>
                        <li>
                            <a hreflang="az" style="text-decoration: underline;" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/az/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHfSURBVHjaYmSYeJzhxx8GCPjHwPDnH8O/PwxAgT9/QGwI+QvM+PWHgYUJIIBYGL78qXZVBCn+D0T///7/D1Tw99+/PyDGPyD7918g+e/3v/+///7fNPMYQACxMHBxMTCzPPkKFGcAqv7979/fv0C5v7//M4AU/fv/6++/X0ANf//JcrMxsPEABBDjYUZGpUmTfr14+f/fX4a/QNP+/P/z5x8Y/f/9G8QAkr9/AwXZJCQOzZwJEEAsDExMIPcBTfz7l+H3n78/votFRbFKSX/cf4BVXvbj4cPfrl79/xuo//f/37+YGBgAAogJ6AKQ64HEn79///xhV1RmVVB83NPDZWTILqfAqav3FywOJP8BlTAwAAQQUA8DIyQEfv1h/P3355VrP+/el0xLe79m7Y+7d7+eOMX48w8jUOonSAEwFAECiOUXA9Dlf0Ce/Auy9x/T/2dzZv3/9fvf3z8frl4BeQAi9e8P878/XxgYAAKIxbWWIc3m773Pf3//BSr/++vvn19/f/0GQqC3/v35BTID5KA///6q8P+7+JABIIBYGD4x/P79R5JN5PdfcNCAtP35zfoHbB3Y/SDPAYP679+ffxneMQAEECNDKQNQDyhqf8HQHyTGHxjjH5jkYQAIMACu3GUPfyOdVwAAAABJRU5ErkJggg==" title="Azərbaycan" alt="Azərbaycan">&nbsp;AZE</a>
                        </li>
                    </ul>
                </div>
                <div class="search">
                    <form action="#" method="post" id="search_form">
                        <input type="text" placeholder="Axtarış" id="s" />
                        <input type="submit" id="searchform" value="search" />
                        <input type="hidden" value="post" name="post_type" />
                    </form>
                </div>
            </div>
        </div>

        <div class="main_menu_area">
            <ul id="nav">

                <?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->visible->value>0){?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value, 'UTF-8');?>
</a>
                            <?php if (isset($_smarty_tpl->tpl_vars['treeItem']->value['items'])){?>
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['treeSubItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeSubItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treeItem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeSubItem']->key => $_smarty_tpl->tpl_vars['treeSubItem']->value){
$_smarty_tpl->tpl_vars['treeSubItem']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->visible->value>0){?>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->url;?>
"><?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeSubItem']->value['id']]->menuItemTitle->value;?>
</a></li>
                                        <?php }?>
                                    <?php } ?>
                                </ul>
                            <?php }?>
                        </li>
                    <?php }?>
                <?php } ?>

            </ul>
        </div><br><br>

        
	<div id="slider" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php  $_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slider']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sliders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->key => $_smarty_tpl->tpl_vars['slider']->value){
$_smarty_tpl->tpl_vars['slider']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['slider']->key;
?>
				<li data-target="#slider" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>class="active"<?php }?>></li>
			<?php } ?>

		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php  $_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slider']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sliders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->key => $_smarty_tpl->tpl_vars['slider']->value){
$_smarty_tpl->tpl_vars['slider']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['slider']->key;
?>
			<div class="item <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>active<?php }?>">
				<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/public/<?php echo $_smarty_tpl->tpl_vars['slider']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['slider']->value['title_text'];?>
">
				<div class="carousel-caption">
					<h3><?php echo $_smarty_tpl->tpl_vars['slider']->value['title_text'];?>
</h3>
					<p><?php echo $_smarty_tpl->tpl_vars['slider']->value['description'];?>
</p>
				</div>
			</div>
			<?php } ?>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


        <div class="content_area">
            <div class="main_content floatleft">
                
	<div class="content_area">
		<div class="main_content floatleft">
			<div class="right_coloum floatleft">
				<div class="single_right_coloum">
					<h2 class="title">Son xəbərlər</h2>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>

						<li>
							<div class="single_cat_right_content">
								<h3><?php echo $_smarty_tpl->tpl_vars['n']->value['itemTitle'];?>
</h3>
								<p><?php echo $_smarty_tpl->tpl_vars['n']->value['description'];?>
</p>
								<p class="single_cat_right_content_meta"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/news/view/<?php echo $_smarty_tpl->tpl_vars['n']->value['r_id'];?>
"><span>read more</span></a> <?php echo $_smarty_tpl->tpl_vars['n']->value['date'];?>
</p>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

            </div>
            <div class="sidebar floatright">
                <div class="single_sidebar">
                    <div class="news-letter">
                        <h2>İstifadəçi Girişi</h2>
                        <p></p>
                        <form action="#" method="post">
                            <input type="text" placeholder="Email" id="name" />
                            <input type="text" placeholder="Şifrə" id="email" />
                            <input type="submit" value="DAXİL OL" id="form-submit" />
                        </form><br>
                        <p><a href="" style="text-decoration: underline;color: #CF0000;">Giriş Yeni istifadəçi.</a></p>
                        <p><a href="" style="text-decoration: underline;color: #CF0000;">Şifrəni e-mailə göndər.</a></p>
                    </div>
                </div>
                <div class="single_sidebar">
                    <div class="popular">
                        <h2 class="title">Faydalı Linklər</h2>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['useful_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
                            <li>
                                <div class="single_popular">
                                    <h3><?php echo $_smarty_tpl->tpl_vars['link']->value['itemTitle'];?>
 <br><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['link'];?>
" class="readmore">Keçid</a></h3>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer_bottom_area">
            <div class="footer_menu">
                <ul id="f_menu">
                    <?php  $_smarty_tpl->tpl_vars['treeItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['treeItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuTreeItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['treeItem']->key => $_smarty_tpl->tpl_vars['treeItem']->value){
$_smarty_tpl->tpl_vars['treeItem']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->visible->value>0){?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->url;?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['menuModelItems']->value[$_smarty_tpl->tpl_vars['treeItem']->value['id']]->menuItemTitle->value, 'UTF-8');?>
</a>
                            </li>
                        <?php }?>
                    <?php } ?>
                </ul>
            </div>
            <hr>
            <div class="copyright_text">
                <p>Copyright &copy; 2016 TrimR LLC | Actuary Association of Azerbaijan</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/js/jquery-min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/js/dhtmlxmessage.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/static/assets/js/scripts.js"></script>
<script type="text/javascript">
    selectnav('nav', {
        label: '-Navigation-',
        nested: true,
        indent: '-'
    });
    selectnav('f_menu', {
        label: '-Navigation-',
        nested: true,
        indent: '-'
    });
    $('.bxslider').bxSlider({
        mode: 'fade',
        captions: true
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //search events
        $("#searchform").click(function() {
            var key = document.getElementById("s").value;
            if(key.length > 1)  {
                location.href = "<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['currentLang']->value;?>
/search/" + key;
            }
            return false;
        });
    })
</script>

<?php if (isset($_smarty_tpl->tpl_vars['flash']->value)&&$_smarty_tpl->tpl_vars['flash']->value!=null){?>
    <script>
        showMessage(<?php echo json_encode($_smarty_tpl->tpl_vars['flash']->value);?>
);
    </script>
<?php }?>
</body>
</html><?php }} ?>