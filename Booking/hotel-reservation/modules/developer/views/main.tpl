<!DOCTYPE html>
<html>
    <head>
        <title>Developer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="{$static_url}/css/stylesheets.css" />
		<script>
			var devUrl = '{$app_url}/{$developer_title}';
		</script>
    </head>
    <body>
		<div id="left-side" class="left">
			<p class="margin0">Tools</p>
			<ul class="margin0 padding0">
				<li><a class="font12 ajaxLoadable link" content=".content" url="{$app_url}/{$developer_title}/syncdb" state="syncdb" href="javascript:void(0)" >Synchronize db</a></li>
			</ul>
		</div>
		
		<div class="content left" id="content-container"></div>
		
		<!-- JavaScripts -->
		<script src="{$static_url}/js/javascripts.js"></script>
		<!-- JavaScripts end -->		
		
    </body>
</html>