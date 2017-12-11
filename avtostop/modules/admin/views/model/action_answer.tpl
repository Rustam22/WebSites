<span id="span-{$randId}"></span>
<script>
    $(document).ready(function() {
	
	    var email = $('input[name="email[az]"]').val().trim();
		var model_id = "{$model_id}";
		var model_item_id = "{$model_item_id}";
		
	    document.getElementById("send_message").onclick = function() {
	        var message = document.getElementById("message").value.trim();
			if(message.length > 0) {
			    $.ajax({
					type: 'post',
					url: app['url'] + '/answering',
					data: "model_id=" + model_id + "&model_item_id=" + model_item_id + "&email=" + email + "&message=" + message,
					success: function(data) {
						if(data == "true") {
						    alert("Məlumat Göndərildi");
							removeCurrentBlock();
						} else if(data == "false") {
						    alert("Məlumat Göndərilmədi");
						}
					}
				});
			}
        }

        function removeCurrentBlock() {
		    var curent_blockId = $(".active-window");
		    var curent_blockId = curent_blockId.attr("id");
            $('#' + curent_blockId).remove();
        }		
    });
</script>
<script>
	{if isset($success)}
		var success = '{$success}',
		errors = {$errors},
		winId = $('#span-{$randId}').parents('.window').attr('id'),
		multiLang = '{$multilang}';
		if (success) {
			closeWindow(winId);
			showMessage(Lang['info'], Lang['saved']);
		} else {
			var errorsText = '';
			if (multiLang) {
				for (var i in errors) {
					errorsText += Lang[i] + ' ' + Lang['in_lang'] + ':<br/>';
					for (var j in errors[i]) {
						errorsText += errors[i][j] + ' ' + Lang['filled_not_correct'] + '; <br/> ';
					}
				}
			} else {
				// 
			}
			//getWindow(winId).setErrors(errorsText);
			showMessage(Lang['error'], errorsText, 15000);
		}
	{/if}
</script>
<form action="{$url}" target="submitForm" method="post" enctype="multipart/form-data">
	<div class="window-inner-content">
		<div style="display: none;">{$modelForm}</div>
		<textarea placeholder="Cavab" style="width: 99%; height: 200px;" id="message"></textarea>
	</div>
	<br/>
	<div class="button-std" style="padding-right: 0px; width: 70px;" id="send_message">Göndər</div>
	<!--<input type="submit" value="Göndər" name="saveItem" class="button-std input-std" />-->
</form>
<iframe src="" name="submitForm" style="display: none;" ></iframe>