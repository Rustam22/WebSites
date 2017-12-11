{extends file="base.tpl"}

{block name="content"}
	<div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="resume-fieldset">
			
				<div class="left resume-info-container">
					<fieldset>
						<legend>{$m.common_info}</legend>
						{$infoForm}
					</fieldset>
				</div>
				<div class="right">
					infosdsd
				</div>
				<div class="clear"></div>
			
			</div>
			
			<div id="resume-multiple-images">
				<div class="load-resume-file-left left">
					<p>{$m.resume_files}</p>
					<div class="afc-upload-multiple">
						<div class="blue-button">{$m.add_file}</div>
					</div>
				</div>
				<div class="load-resume-file-right left">
					<div class="afc-images-list">
						<ol>
							
						</ol>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<script>
				var parent = '#resume-multiple-images';
				var field = '<input type="file" class="hide" name="files[]" value="" />';
				var addButton = '.afc-upload-multiple';
				var queueContainer = '.afc-images-list ol';
				new MultipleFileUpload(parent, field, addButton, queueContainer, ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'doc', 'docx', 'pdf', 'djvu', 'txt', 'rtf']);
			</script>
			
			<div class="resume-fieldset">
				<fieldset>
					<legend>{$m.contact_info}</legend>
					
					{$contactForm}
					
				</fieldset>
			</div>
			
			<div class="resume-fieldset">
				<fieldset>
					<legend>{$m.main_info}</legend>
					
					{$mainForm}
					
				</fieldset>
			</div>
			
			<div class="resume-fieldset">
				
				<fieldset>
					<legend>{$m.last_works}</legend>
					
					<div id="last-work-container">
						<div class="lw-item-container p-relative">
							<div class="last-work-left left">
								<div class="lw-field">
									<div class="lw-field-title">{$m.company}</div>
									<div class="lw-field-own">
										<input type="text" name="lwCompany[]" />
									</div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title">{$m.country}</div>
									<div class="lw-field-own">
										<input type="text" name="lwCountry[]" />
									</div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title">{$m.city}</div>
									<div class="lw-field-own">
										<input type="text" name="lwCity[]" />
									</div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title">{$m.address}</div>
									<div class="lw-field-own">
										<input type="text" name="lwAddress[]" />
									</div>
								</div>
								<div class="lw-field">
									<div class="lw-field-title">{$m.phone}</div>
									<div class="lw-field-own">
										<input type="text" name="lwPhone[]" />
									</div>
								</div>
							</div>
							<div class="last-work-right right">
								<div class="lw-field lw-field-long">
									<div class="lw-field-title">{$m.sphere}</div>
									<div class="lw-field-own">
										<input type="text" name="lwOrgSphere[]" />
									</div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-title">{$m.profession}</div>
									<div class="lw-field-own">
										<input type="text" name="lwOrgProfession[]" />
									</div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="lw-field-title">{$m.work_period}</div>
										<div class="left lw-date">
											<div class="lw-field-title">{$m.work_period_start}</div>
											<input type="text" class="date-field" name="lwWorkStart[]" />
										</div>
										<div class="left lw-date">
											<div class="lw-field-title">{$m.work_period_end}</div>
											<input type="text" class="date-field" name="lwWorkEnd[]" />
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="left lw-date">
											<div class="lw-field-title">{$m.dis_reason}</div>
											<input type="text" name="lwDismissal[]" />
										</div>
										<div class="left lw-date">
											<div class="lw-field-title">{$m.prof_resp}</div>
											<input type="text" name="lwLastProf[]" />
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="lw-field lw-field-long">
									<div class="lw-field-own">
										<div class="left lw-date">
											<div class="lw-field-title">{$m.work_result}</div>
											<input type="text" name="lwWorkResult[]" />
										</div>
										<div class="left lw-date">
											<div class="lw-field-title">{$m.core_skills}</div>
											<input type="text" name="lwWorkResultMain[]" />
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
							<div class="lw-item-remove blue-button p-absolute">{$m.remove}</div>
						</div>
					</div>
					<div class="resume-add-lw"><input type="button" class="blue-button-input" id="resume-add-lw" value="{$m.add}" /></div>
				</fieldset>
			</div>
			<div>
				<div class="save-resume"><input type="submit" name="add_resume" class="blue-button-input" value="{$m.save}" /></div>
			</div>
			
			<input type="hidden" name="csrf_key" value="{$csrf_token}" />
		</form>
	</div>
	
	<script id="t-lw-template" type="html/template">
		<div class="lw-item-container p-relative">
			<div class="last-work-left left">
				<div class="lw-field">
					<div class="lw-field-title">{$m.company}</div>
					<div class="lw-field-own">
						<input type="text" name="lwCompany[]" />
					</div>
				</div>
				<div class="lw-field">
					<div class="lw-field-title">{$m.country}</div>
					<div class="lw-field-own">
						<input type="text" name="lwCountry[]" />
					</div>
				</div>
				<div class="lw-field">
					<div class="lw-field-title">{$m.city}</div>
					<div class="lw-field-own">
						<input type="text" name="lwCity[]" />
					</div>
				</div>
				<div class="lw-field">
					<div class="lw-field-title">{$m.address}</div>
					<div class="lw-field-own">
						<input type="text" name="lwAddress[]" />
					</div>
				</div>
				<div class="lw-field">
					<div class="lw-field-title">{$m.phone}</div>
					<div class="lw-field-own">
						<input type="text" name="lwPhone[]" />
					</div>
				</div>
			</div>
			<div class="last-work-right right">
				<div class="lw-field lw-field-long">
					<div class="lw-field-title">{$m.sphere}</div>
					<div class="lw-field-own">
						<input type="text" name="lwOrgSphere[]" />
					</div>
				</div>
				<div class="lw-field lw-field-long">
					<div class="lw-field-title">{$m.profession}</div>
					<div class="lw-field-own">
						<input type="text" name="lwOrgProfession[]" />
					</div>
				</div>
				<div class="lw-field lw-field-long">
					<div class="lw-field-title">{$m.work_period}</div>
					<div class="lw-field-own">
						<div class="left lw-date">
							<div class="lw-field-title">{$m.work_period_start}</div>
							<input type="text" class="date-field" name="lwWorkStart[]" />
						</div>
						<div class="left lw-date">
							<div class="lw-field-title">{$m.work_period_end}</div>
							<input type="text" class="date-field" name="lwWorkEnd[]" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="lw-field lw-field-long">
					<div class="lw-field-own">
						<div class="left lw-date">
							<div class="lw-field-title">{$m.dis_reason}</div>
							<input type="text" name="lwDismissal[]" />
						</div>
						<div class="left lw-date">
							<div class="lw-field-title">{$m.prof_resp}</div>
							<input type="text" name="lwLastProf[]" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="lw-field lw-field-long">
					<div class="lw-field-own">
						<div class="left lw-date">
							<div class="lw-field-title">{$m.work_result}</div>
							<input type="text" name="lwWorkResult[]" />
						</div>
						<div class="left lw-date">
							<div class="lw-field-title">{$m.core_skills}</div>
							<input type="text" name="lwWorkResultMain[]" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="lw-item-remove blue-button p-absolute">{$m.remove}</div>
		</div>
		
		<script>
			initDatePicker();
		</script>
		
	</script>
	
	<script>
		$('#resume-add-lw').click(function() {
			$('#last-work-container').append(tmpl($('#t-lw-template').html(), {}));
		});
		
		$('.lw-item-remove').live('click', function() {
			$(this).parents('.lw-item-container').remove();
		});
	</script>
	
{/block}