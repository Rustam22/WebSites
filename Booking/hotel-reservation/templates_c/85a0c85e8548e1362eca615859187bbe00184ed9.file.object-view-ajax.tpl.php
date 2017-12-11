<?php /* Smarty version Smarty-3.1.8, created on 2017-03-10 05:40:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/agclub/views/objects/object-view-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78645457558c2040715f592-98384479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85a0c85e8548e1362eca615859187bbe00184ed9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/agclub/views/objects/object-view-ajax.tpl',
      1 => 1397816820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78645457558c2040715f592-98384479',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'childs' => 0,
    'd' => 0,
    'messages' => 0,
    'static_url' => 0,
    'object' => 0,
    'public_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58c204072b28a5_54950706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c204072b28a5_54950706')) {function content_58c204072b28a5_54950706($_smarty_tpl) {?><div class="view-page-content view-page-content-small font16" style="width: 96%;">
	<div class="object-list-item">
		<div class="object-left-info">
			<?php if (isset($_smarty_tpl->tpl_vars['childs']->value)&&count($_smarty_tpl->tpl_vars['childs']->value)){?>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>	
					<div class="object-data-container">
						<?php if ($_smarty_tpl->tpl_vars['d']->value['address']){?>
						<div class="object-data-record">
							<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['address'];?>
:</div>
							<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
</div>
							<div class="clear"></div>
						</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['d']->value['phone']){?>
						<div class="object-data-record">
							<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['phone_number'];?>
:</div>
							<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
</div>
							<div class="clear"></div>
						</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['d']->value['webSite']){?>
						<div class="object-data-record">
							<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['site'];?>
:</div>
							<div class="data-own font13"><a href="http://<?php echo $_smarty_tpl->tpl_vars['d']->value['webSite'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['webSite'];?>
</a></div>
							<div class="clear"></div>
						</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['d']->value['description']){?>
						<div class="object-data-record">
							<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['more_info'];?>
:</div>
							<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['d']->value['description'];?>
</div>
							<div class="clear"></div>
						</div>
						<?php }?>
					</div>
					<div class="object-links relative">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/show-map-tr-bg.png" class="width100" />
						<div class="object-links-top-layer">
							<div class="object-link-left">
								<a href="javascript:void(0);" class="font13 show-map" object-id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['map'];?>
</a>
							</div>
							<div class="object-link-right"><a href="javascript:void(0);" class="font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['rating'];?>
</a>: <span class="rating-value font13"><?php if (($_smarty_tpl->tpl_vars['d']->value['ratesCount']&&intval($_smarty_tpl->tpl_vars['d']->value['rating']/$_smarty_tpl->tpl_vars['d']->value['ratesCount']))){?><?php echo intval($_smarty_tpl->tpl_vars['d']->value['rating']/$_smarty_tpl->tpl_vars['d']->value['ratesCount']);?>
<?php }else{ ?>0<?php }?></span></div>
							<div class="clear"></div>
						</div>
						<div class="object-links-bottom-layer">
							<div class="object-rating-container relative">
								<div class="object-rating-ribbon" object-id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
									<div class="object-rating-icon">
										<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
										<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
										<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
										<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
										<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
									</div>
									<div class="object-rating-icon">
										<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
										<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php }else{ ?>
				<div class="object-data-container">
					<?php if ($_smarty_tpl->tpl_vars['object']->value->address->value){?>
					<div class="object-data-record">
						<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['address'];?>
:</div>
						<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['object']->value->address->value;?>
</div>
						<div class="clear"></div>
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['object']->value->phone->value){?>
					<div class="object-data-record">
						<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['phone_number'];?>
:</div>
						<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['object']->value->phone->value;?>
</div>
						<div class="clear"></div>
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['object']->value->webSite->value){?>
					<div class="object-data-record">
						<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['site'];?>
:</div>
						<div class="data-own font13"><a href="http://<?php echo $_smarty_tpl->tpl_vars['object']->value->webSite->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['object']->value->webSite->value;?>
</a></div>
						<div class="clear"></div>
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['object']->value->description->value){?>
					<div class="object-data-record">
						<div class="data-title font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['category']['more_info'];?>
:</div>
						<div class="data-own font13"><?php echo $_smarty_tpl->tpl_vars['object']->value->description->value;?>
</div>
						<div class="clear"></div>
					</div>
					<?php }?>
				</div>
				<div class="object-links relative">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/show-map-tr-bg.png" class="width100" />
					<div class="object-links-top-layer">
						<div class="object-link-left">
							<a href="javascript:void(0);" class="font13 show-map" object-id="<?php echo $_smarty_tpl->tpl_vars['object']->value->id->value;?>
"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['map'];?>
</a>
						</div>
						<div class="object-link-right"><a href="javascript:void(0);" class="font13"><?php echo $_smarty_tpl->tpl_vars['messages']->value['common']['rating'];?>
</a>: <span class="rating-value font13"><?php if (($_smarty_tpl->tpl_vars['object']->value->ratesCount->value&&intval($_smarty_tpl->tpl_vars['object']->value->rating->value/$_smarty_tpl->tpl_vars['object']->value->ratesCount->value))){?><?php echo intval($_smarty_tpl->tpl_vars['object']->value->rating->value/$_smarty_tpl->tpl_vars['object']->value->ratesCount->value);?>
<?php }else{ ?>0<?php }?></span></div>
						<div class="clear"></div>
					</div>
					<div class="object-links-bottom-layer">
						<div class="object-rating-container relative">
							<div class="object-rating-ribbon" object-id="<?php echo $_smarty_tpl->tpl_vars['object']->value->id->value;?>
">
								<div class="object-rating-icon">
									<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
									<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
								</div>
								<div class="object-rating-icon">
									<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
									<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
								</div>
								<div class="object-rating-icon">
									<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
									<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
								</div>
								<div class="object-rating-icon">
									<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
									<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
								</div>
								<div class="object-rating-icon">
									<img class="inactive" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-inactive.png" />
									<img class="active hide" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/img/star-active.png" />
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
		<div class="object-discount font25"><?php echo $_smarty_tpl->tpl_vars['object']->value->discount->value;?>
</div>
		<div class="object-logo"><?php if ($_smarty_tpl->tpl_vars['object']->value->objLogo->value){?><img src="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['object']->value->objLogo->value;?>
" /><?php }?></div>
		<div class="clear"></div>
	</div>
	
	
	<div class="clear"></div>
	
	
</div>

<div class="clear"></div><?php }} ?>