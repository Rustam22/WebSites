<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:10:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-data-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15262584358c1fd19706fd5-89013604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65ff8c5d336db534762484312ed4e4205754088c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/model-data-list.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15262584358c1fd19706fd5-89013604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_headers' => 0,
    'h' => 0,
    'table_content' => 0,
    'f' => 0,
    'model_id' => 0,
    'field_item' => 0,
    'messages' => 0,
    'app_url' => 0,
    'admin_title' => 0,
    'static_url' => 0,
    'theme_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fd1979b2f6_42199184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fd1979b2f6_42199184')) {function content_58c1fd1979b2f6_42199184($_smarty_tpl) {?><table cellpadding="0" cellspacing="0" class="model-list-table">
	<tr class="model-data-list-tr model-data-list-head-tr">
		<td>
		</td>
		<?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['h']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_headers']->value['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
$_smarty_tpl->tpl_vars['h']->_loop = true;
?>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['h']->value;?>

			</td>
		<?php } ?>
		<td></td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_content']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['table_content']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['table_content']['index']++;
?>
		<tr class="model-data-list-tr <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['table_content']['index']%2==0)){?>model-data-list-tr-bg<?php }?>">
			<?php  $_smarty_tpl->tpl_vars['field_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['field_item']->iteration=0;
 $_smarty_tpl->tpl_vars['field_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['field_item']->key => $_smarty_tpl->tpl_vars['field_item']->value){
$_smarty_tpl->tpl_vars['field_item']->_loop = true;
 $_smarty_tpl->tpl_vars['field_item']->iteration++;
 $_smarty_tpl->tpl_vars['field_item']->index++;
 $_smarty_tpl->tpl_vars['field_item']->first = $_smarty_tpl->tpl_vars['field_item']->index === 0;
 $_smarty_tpl->tpl_vars['field_item']->last = $_smarty_tpl->tpl_vars['field_item']->iteration === $_smarty_tpl->tpl_vars['field_item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['field_item_foreach']['first'] = $_smarty_tpl->tpl_vars['field_item']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['field_item_foreach']['last'] = $_smarty_tpl->tpl_vars['field_item']->last;
?>
			<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['field_item_foreach']['first'])){?>
				<td id="checkbox-container-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['table_content']['index'];?>
-<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
" class="model-data-list-checkbox-td" >
					<div class="checkbox-controller-container" val="1" key="check">
						<div class="checkbox-controller-icon"></div>
						<div class="checkbox-controller-title"></div>
						<div class="clear"></div>
						<input type="checkbox" class="delete-id hide" item-id="<?php echo $_smarty_tpl->tpl_vars['field_item']->value;?>
" />
					</div>
					<script>
						(new CheckBoxController('#checkbox-container-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['table_content']['index'];?>
-<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
')).onCheck(showDeleteButton).onUnCheck(hideDeleteButton);
					</script>
				</td>
			<?php }else{ ?>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['field_item']->value;?>

			</td>
			<?php }?>
			<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['field_item_foreach']['last'])){?>
				<td>
					<a href="javascript:void(0);" class="new-window table-action" title="<?php echo $_smarty_tpl->tpl_vars['messages']->value['interface_common']['edit'];?>
" reload-parent="1" have-parent="1" data-url="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['admin_title']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['model_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" >
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme_folder']->value;?>
/img/edit-icon-dark.png" />
					</a>
				</td>
			<?php }?>
			<?php } ?>
		</tr>
	<?php } ?>
</table>
<?php }} ?>