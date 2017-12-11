{extends file="base.tpl"}

{block name="content"}
	
	<script>
		var vacancyId = {$vacancy->id};
	</script>
	
	<div class="layer-right-block-options-content">
		<h2>{$m.view_vacancy}</h2>
		
		<div class="vacancy-view-top">
			<div class="left vacancy-view-left">
				<h3>{$vacancy->title}</h3>
				<p><a href="{$app_url}/company{$vacancy->user}">{$vacancy->userInfo['name']}</a> ({$m.date} {$vacancy->date})</p>
				<p>{$vacancy->location['city']}</p>
			</div>
			<div class="left">
				<p>{$m.salary_range}: {$vacancy->salaryFrom} - {$vacancy->salaryTo} {$vacancy->salaryCurrency}</p>
				<p>{$m.exp_need}: {$vacancy->experience}</p>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="vacancy-bottom">
			<div><span class="bold">{$m.prof_area}: </span> {$vacancy->profArea}</div>
			<div><span class="bold">{$m.b_time}: </span> {$vacancy->busyTime}</div>
			<div><span class="bold">{$m.work_time}: </span> {$vacancy->workTime}</div>
			<div><span class="bold">{$m.description}: </span> {$vacancy->description}</div>
			<div><span class="bold">{$m.contact_user}: </span> {$vacancy->contactUser}</div>
		</div>
		
		{if ($logged_in)}
			<div id="send-resume" class="blue-button">{$m.send_res}</div>
		{/if}
		
		{if count($vacancy->resumes)}
		<div class="vacancy-added-users-title"></div>
		<div class="vacancy-added-users">
			{foreach from=$vacancy->resumes item=u}
			<div class="vacancy-added-user left">
				<div class="vacancy-added-user-avatar left">
					<a href="{$app_url}/user{$u.userId}"><img src="{$app_url}/profile/get/avatar/50/50/{$u.avatar}" /></a>
				</div>
				<div class="vacancy-added-user-name left"><a href="{$app_url}/user{$u.userId}">{$u.name}</a></div>
				<div class="clear"></div>
			</div>
			{/foreach}
			<div class="clear"></div>
		</div>
		{/if}
		
	</div>
	
	<script>
		$('#send-resume').click(function() {
			
			var csrfKey = $('.csrf-token').val();
			
			$.ajax({
				url: app.url + '/vacancy/add/resume/' + vacancyId,
				type: 'post',
				dataType: 'json',
				data: 'csrf_key=' + csrfKey,
				success: function (d) {
					
					if (d.success) {
						showMessage('{$m.info}', '{$m.res_sended}');
					} else {
						if (d.code == 2) {
							location.reload();
						}
						if (d.code == 3) {
							showMessage('{$m.info}', '{$m.res_exists}');
						}
					}
					
					$('.csrf-token').val(d.csrfKey);
				}
			});
			
		});
	</script>
	
{/block}