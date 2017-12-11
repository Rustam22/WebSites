<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 23:58:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/tinymce.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171468494158f66fe5c1a6f9-69456747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd45796033ac595a7fc4ab47524f06658967d3f24' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/hotel-reservation/modules/admin/views/model/fields/tinymce.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171468494158f66fe5c1a6f9-69456747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'name' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f66fe5c32586_06001029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f66fe5c32586_06001029')) {function content_58f66fe5c32586_06001029($_smarty_tpl) {?><div class="field-container tinymce-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">	<div style="margin-bottom: 5px;" class="field-title">		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>	</div>	<div>		<textarea name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="tinymce field"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</textarea>	</div>	<div class="clear"></div></div><script>var editorName = '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
';mcImageManager.init({	relative_urls : false,	remember_last_path : false});	tinyMCE.init({		// General options		width : "10",		mode : "exact",		theme : "advanced",		file_browser_callback : "mcImageManager.filebrowserCallBack",		theme_advanced_resizing : true,		relative_urls : false,		convert_urls : false,		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",		elements : editorName,		// Theme options		theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,code",		theme_advanced_buttons2 : "tablecontrols,|,media,|,print,|,cite,|,forecolor,backcolor,|,cut,copy,paste,pastetext,pasteword,|,fullscreen",		theme_advanced_buttons3 : "",		theme_advanced_buttons4 : "",		theme_advanced_toolbar_location : "top",		theme_advanced_toolbar_align : "left",		theme_advanced_statusbar_location : "bottom",		theme_advanced_resizing : true,		// Example content CSS (should be your site CSS)		content_css : "css/content.css",		// Drop lists for link/image/media/template dialogs		template_external_list_url : "lists/template_list.js",		external_link_list_url : "lists/link_list.js",		external_image_list_url : "lists/image_list.js",		media_external_list_url : "lists/media_list.js",		// Style formats		style_formats : [			{title : 'Bold text', inline : 'b'},			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},			{title : 'Example 1', inline : 'span', classes : 'example1'},			{title : 'Example 2', inline : 'span', classes : 'example2'},			{title : 'Table styles'},			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}		],		// Replace values for the template plugin		template_replace_values : {			username : "Some User",			staffid : "991234"		}	});</script><?php }} ?>