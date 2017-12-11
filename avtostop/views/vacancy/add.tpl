{extends file="base.tpl"}

{block name="content"}
	
	<div>
		<h2>Add vacancy</h2>
	</div>
	<form method="post" action="">
	<div class="vacancy-prof-area">
		
		<div class="choose-specn" id="choose-specialization-container">
			<div class="left prof-area-title">{$m.prof_area}</div>
			<div class="left prof-area-choosed"><span>{$m.empty}</span></div>
			<div class="left"><input type="button" class="blue-button-input" id="choose-spec" value="{$m.choose}" /></div>
			<div class="clear"></div>
			<input type="hidden" name="profArea" id="prof-area-value" />
		</div>
		
		<div class="field-container vac-field-container">
			<div class="field-title vac-field-title"><span>{$m.title}</span></div>
			<div class="field-own vac-field-own">
				<input type="text" name="title" />
			</div>
		</div>
		
		<div class="vac-left-side left">
			<div class="vac-city-container">
				<div id="vac-country" >
					<span class="c-pointer value-element tx-green">{$m.city}</span>
					<input type="hidden" name="cityId" id="vac_city_id" class="select-input" value="0" />
					<input type="hidden" name="countryId" id="vac_country_id" class="select-input" value="0" />
				</div>
				<script>
					new SelectCityController("#vac-country", "#vac_country_id", "#vac_city_id");
				</script>
			</div>
			
			<div class="vac-salary-container">
				<div class="salary-from left">
					<input type="text" name="salaryFrom" />
				</div>
				<div class="salary-splitter left">-</div>
				<div class="salary-to left">
					<input type="text" name="salaryTo" />
				</div>
				<div class="salary-currency left">
					<div id="select-currency" class="select-container p-relative" >
						<div class="selected-option p-relative c-pointer">
							<div class="selected-option-html"></div>
							<div class="select-icon select-options-icon p-absolute sprite"></div>
						</div>
						<div class="options-container hide p-absolute">
							{foreach from=$currency item=v key=k}
								<div class="option-item c-pointer" opt-val="{$k}">{$v}</div>
							{/foreach}
						</div>
						<input type="hidden" name="salaryCurrency" class="select-input" value="1"/>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="vac-work-container">
				<div class="left vac-work-time">
					<div class="afc-field-container radio-field">
						<div class="afc-field-label vac-title">{$m.w_experience}: </div>
						<div class="afc-field-input afc-field-own">
							<div class="radio-button-container" id="radio-experience" data-name="experience" >
								{foreach from=$experiences item=v key=k}
									<div class="afc-radio-container radio-button-item-container" data-value="{$k}" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span>{$v}</span>
										</div>
										<div class="clear"></div>
									</div>
								{/foreach}
							</div>
						</div>
					</div>
					<script>
						new RadioController('#radio-experience');
					</script>
				</div>
				<div class="left vac-work-time vac-work-time-busy">
					<div class="afc-field-container radio-field">
						<div class="afc-field-label vac-title">{$m.work_time}: </div>
						<div class="afc-field-input afc-field-own">
							<div class="radio-button-container" id="radio-work-time" data-name="workTime" >
								{foreach from=$workTimes item=v key=k}
									<div class="afc-radio-container radio-button-item-container" data-value="{$k}" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span>{$v}</span>
										</div>
										<div class="clear"></div>
									</div>
								{/foreach}
							</div>
						</div>
					</div>
					<script>
						new RadioController('#radio-work-time');
					</script>
				</div>
				<div class="clear"></div>
			</div>
			
			
			
		</div>
		<div class="vac-right-side left">
			<div class="vac-contact-user">
				<div class="vcu-title vac-title">{$m.contact_user}</div>
				<div class="vcu-input"><input type="text" class="vac-input" name="contactUser"/></div>
			</div>
			
			<div class="vac-busy-times">
				<div class="afc-field-container radio-field vac-busy-time-field">
					<div class="afc-field-label vac-title">{$m.b_time}: </div>
					<div class="afc-field-input afc-field-own">
						<div class="radio-button-container" id="radio-busy-time" data-name="busyTime" >
							{foreach from=$busyTimes item=v key=k}
								<div class="afc-radio-container radio-button-item-container" data-value="{$k}" >
									<div class="div left radio-button-own">
										<div class="sprite radio-sprite"></div>
									</div>
									<div class="left radio-button-title">
										<span>{$v}</span>
									</div>
									<div class="clear"></div>
								</div>
							{/foreach}
						</div>
					</div>
				</div>
				<script>
					new RadioController('#radio-busy-time');
				</script>
			</div>
			
		</div>
		<div class="clear"></div>
		
	</div>
	<div class="vac-description-container">
		<div class="vac-description-title">{$m.description}</div>
		<textarea name="description"></textarea>
	</div>
	
	<div class="vac-submit">
		<input type="submit" name="add_vac" class="blue-button-input" value="{$m.add}" />
	</div>
	<input type="hidden" name="csrf_key" value="{$csrf_token}" class="csrf-token" />
	</form>
	
	<script>
		new SelectController('select-currency');
	</script>
	
	<script>
		var specializations = [
			{foreach from=$profArea item=p key=k}
			{
				title: '{$p}',
				id: {$k}
			}
			{if (!$smarty.foreach.profArea.last)},{/if}
			{/foreach}
		];
		
		var spTitle = '{$m.choose}';
		
	</script>
	{literal}
	<script type="html/template" id="t-specialization">
		
		<div class="afc-field-container select-field choose-specialization-select">
			<div class="afc-field-input afc-field-own">
				<div id="select-specialization" class="select-container p-relative" >
					<div class="selected-option p-relative c-pointer">
						<div class="selected-option-html"></div>
						<div class="select-icon select-options-icon p-absolute sprite"></div>
					</div>
					<div class="options-container hide p-absolute">
						<div class="options-content p-relative">
						<% for (var i in sp) { %>
							<div class="option-item c-pointer" opt-val="<%=sp[i].id%>"><%=sp[i].title%></div>
						<% } %>
						</div>
					</div>
					<input type="hidden" name="specialization" class="select-input" />
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<script>
			new SelectController("select-specialization", null, function(v, p, title) {
				$("#prof-area-value").val(v);
				$(".prof-area-choosed span").html(title);
				hideMessage();
				
			});
		</script>
		
	</script>
	
	<script>
		
		$('#choose-spec').click(function() {
			
			showMessage(spTitle, tmpl($('#t-specialization').html(), {sp: specializations}))
			
		});
	</script>
	{/literal}
{/block}