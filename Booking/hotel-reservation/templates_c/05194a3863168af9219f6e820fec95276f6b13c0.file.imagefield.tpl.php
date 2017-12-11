<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:13:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/imagefield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120328622958c1fdcb3b2859-77133715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05194a3863168af9219f6e820fec95276f6b13c0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/modules/admin/views/model/fields/imagefield.tpl',
      1 => 1397816818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120328622958c1fdcb3b2859-77133715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'htmlCss' => 0,
    'title' => 0,
    'lang' => 0,
    'forContent' => 0,
    'randId' => 0,
    'id' => 0,
    'type' => 0,
    'messages' => 0,
    'value' => 0,
    'public_url' => 0,
    'app_url' => 0,
    'public_folder' => 0,
    'elementId' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c1fdcb4000f2_31046031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c1fdcb4000f2_31046031')) {function content_58c1fdcb4000f2_31046031($_smarty_tpl) {?><div class="field-container filefield-div  <?php if (isset($_smarty_tpl->tpl_vars['htmlCss']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['htmlCss']->value['class'];?>
<?php }?>">	<div class="left field-title">		<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['lang']->value)&&!empty($_smarty_tpl->tpl_vars['lang']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
]<?php }?>	</div>	<div class="right">		<?php if (isset($_smarty_tpl->tpl_vars['forContent']->value)){?>			<input type="hidden" name="fieldLang[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
" />			<input type="hidden" name="fieldId[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />			<input type="hidden" name="fieldType[<?php echo $_smarty_tpl->tpl_vars['randId']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />		<?php }?>		<div class="file-field-data">			<div class="selected-file-container">				<!--<div class="selected-file-label"><?php echo $_smarty_tpl->tpl_vars['messages']->value['fields_image_field']['exist_image'];?>
</div>-->				<div class="selected-file">					<?php if ($_smarty_tpl->tpl_vars['value']->value){?>					<a href="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" target="_blank">						<?php echo $_smarty_tpl->tpl_vars['messages']->value['fields_image_field']['exist_image'];?>
						<!--<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/imageresizer/resize/50/50/<?php echo $_smarty_tpl->tpl_vars['public_folder']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />-->					</a>					<?php }?>				</div>				<div class="show-file-manager-container">					<a href="javascript:void(0)" class="show-file-manager" id="show-image-field-container-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['messages']->value['fields_image_field']['select_image'];?>
</a>				</div>				<div class="clear"></div>			</div>		</div>		<div class="image-field-block-ui-container hide" id="image-field-block-ui-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
">			<div class="block-ui-window">				<div class="block-ui-window-header">					<div class="block-ui-window-title"><?php echo $_smarty_tpl->tpl_vars['messages']->value['fields_image_field']['select_image'];?>
</div>					<div class="block-ui-window-close-button"></div>					<div class="clear"></div>				</div>				<div class="block-ui-window-content">					<div class="fm-main-container">						<div class="filemanager-container">							<div class="fm-main-container">								<div class="filemanager-container" id="<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
">									<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="image-field-value" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />									<div class="fm-entry">																		</div>								</div>							</div>						</div>												<script>							new FileManager({								item: '.fm-image',								action: function() {									$('#<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
').find('.image-field-value').val($(this).attr('path'));								},								container: $('#<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
'),								allowActions: 0,								onItemClick: function(){																	}							});						</script>											</div>				</div>			</div>		</div>		<script>			$('#show-image-field-container-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
').click(function(){				$('#image-field-block-ui-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
').toggleClass('hide');			});			$('#image-field-block-ui-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
').find('.block-ui-window-close-button').click(function(){				$('#image-field-block-ui-<?php echo $_smarty_tpl->tpl_vars['elementId']->value;?>
').toggleClass('hide');			});		</script>	</div>	<div class="clear"></div></div><?php }} ?>