function inArray(val, arr) {
	for (var i in arr) {
		if (val == arr[i]) return true;
	}
	return false;
}

function showMessage(title, message) {
	var messageTpl = $('#message-tpl').html(),
	id = 'message-' + Math.floor(Math.random()*9999);
	var t, closeInterval = 5000;
	if (typeof arguments[2] != 'undefined') closeInterval = arguments[2];
	
	t = tmpl(messageTpl, {title: title, content: message, id: id});
	init();
	
	function init() {
		$(t).appendTo('body');
		$('#' + id).find('.close-message').click(hide);
		setData($('#' + id));
	}
	
	function hide() {
		$('#' + id).remove();
	}
	
	function setData(el) {
		el.find('.show-message-title').html(title);
		el.find('.show-message-content').html(message);
	}
	
}