<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:07:54
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/fm/fm-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143615351058c1fc6aadca88-86780358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '999fc76ee109a4ccd1ffb357590abbcb20fa015c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/fm/fm-content.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143615351058c1fc6aadca88-86780358',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentDir' => 0,
    'd' => 0,
    'startDir' => 0,
    'app_url' => 0,
    'admin_title' => 0,
    'theme_folder' => 0,
    'entries' => 0,
    'e' => 0,
    'messages' => 0,
    'allowActions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fc6ab8c244_58129977',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fc6ab8c244_58129977')) {function content_58c1fc6ab8c244_58129977($_smarty_tpl) {?><div class="fm-current-dir">
	<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currentDir']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['d']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['d']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['d']->iteration++;
 $_smarty_tpl->tpl_vars['d']->last = $_smarty_tpl->tpl_vars['d']->iteration === $_smarty_tpl->tpl_vars['d']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fm_dirs']['last'] = $_smarty_tpl->tpl_vars['d']->last;
?>
		<div class="fm-item" path="<?php echo $_smarty_tpl->tpl_vars['d']->value['path'];?>
">
			<div class="fm-dir-item fm-folder">
				<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>

			</div>
		</div>
		<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fm_dirs']['last']){?><div class="left" style="color: #fff; margin-top: 2px;">&raquo;</div><?php }?>
	<?php } ?>
	<div class="clear"></div>
</div>

<div class="filemanager-container">
	<?php if ($_smarty_tpl->tpl_vars['d']->value['path']!=$_smarty_tpl->tpl_vars['startDir']->value){?>
		<div class="fm-item current-dir" path="<?php echo $_smarty_tpl->tpl_vars['d']->value['path'];?>
/.." type="0">
			<div class="fm-icon fm-folder">
				<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/modules/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/static/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/folder-icon.png" />
			</div>
			<div class="fm-item-title fm-folder">
				<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>

			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['entries']->value)>1){?>
	<table class="file-manager-table" cellpadding="0" cellspacing="0">
		<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['entries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['e']->value['title']!='..'){?>
			<tr class="<?php if ($_smarty_tpl->tpl_vars['e']->value['is_image']==1){?>fm-image<?php }?> fm-item" path="<?php echo $_smarty_tpl->tpl_vars['e']->value['path'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['e']->value['type'];?>
">
				<td class="<?php if ($_smarty_tpl->tpl_vars['e']->value['type']==1){?>fm-file<?php }?>" <?php if ($_smarty_tpl->tpl_vars['d']->value['path']!=$_smarty_tpl->tpl_vars['startDir']->value){?>style="padding-left: 50px;"<?php }?>>
					<div class="fm-icon <?php if ($_smarty_tpl->tpl_vars['e']->value['type']=='0'){?>fm-folder<?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['e']->value['type']=='1'){?>
							<?php if ($_smarty_tpl->tpl_vars['e']->value['is_image']==1){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/imageresizer/resize/50/50/<?php echo $_smarty_tpl->tpl_vars['e']->value['path'];?>
" />
							<?php }else{ ?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/modules/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/static/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/file-icon.png" />
							<?php }?>
						<?php }else{ ?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/modules/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/static/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/folder-icon.png" />
						<?php }?>
						
					</div>
				</td>
				<td class="fm-item-title <?php if ($_smarty_tpl->tpl_vars['e']->value['type']=='0'){?>fm-folder<?php }?>" style="vertical-align: middle;">
					<?php if ($_smarty_tpl->tpl_vars['e']->value['title']=='..'){?>
						<?php echo $_smarty_tpl->tpl_vars['messages']->value['file_manager']['back'];?>

					<?php }else{ ?>
						<?php echo $_smarty_tpl->tpl_vars['e']->value['title'];?>

					<?php }?>
				</td>
				<td style="vertical-align: middle;">
					<?php if ($_smarty_tpl->tpl_vars['allowActions']->value){?>
						<div class="fm-item-delete rm-item"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/modules/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/static/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/delete-icon-dark.png" /></div>
					<?php }?>
					
				</td>
			</tr>
			<?php }?>
		<?php } ?>
	</table>
	<?php }?>
</div>
<div class="clear"></div><?php }} ?>