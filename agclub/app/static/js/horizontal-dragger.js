var DragMaster = (function() {

	var dragObject;
	var mouseOffset;
	var elementOffsetLeft;

	// получить сдвиг target относительно курсора мыши
	function getMouseOffset(target, e) {
		var docPos = getPosition(target)
		return {x:e.pageX - docPos.x, y:e.pageY - docPos.y}
	}

	function mouseUp(e){
		dragObject = null
		// очистить обработчики, т.к перенос закончен
		document.onmousemove = null
		document.onmouseup = null
		document.ondragstart = null
		document.body.onselectstart = null
	}

	function mouseMove(e){
		e = fixEvent(e)
		//dragObject.css('top', e.pageY - mouseOffset.y + 'px');
		dragObject.css('left', (parseInt(e.pageX) - parseInt(elementOffsetLeft) - mouseOffset.x) + 'px');
		document.ondragstart();
		return false
	}

	function mouseDown(e) {
		dragObject  = $(this);
		elementOffsetLeft = dragObject.parent().offset().left;
		mouseOffset = getMouseOffset(this, e)
		document.onmousemove = mouseMove
		document.onmouseup = mouseUp
		document.ondragstart = function() { return false }
		document.body.onselectstart = function() { return false }
		return false
	}

	return {
		makeDraggable: function(element) {
			$(element).mousedown(mouseDown);
			return this;
		},
		onDrag: function (f) {
			document.ondragstart = f;
			return this;
		}
		
	}

}())

function getPosition(e){
	var left = 0
	var top  = 0

	while (e.offsetParent){
		left += e.offsetLeft
		top  += e.offsetTop
		e	 = e.offsetParent
	}

	left += e.offsetLeft
	top  += e.offsetTop

	return {x:left, y:top}
}

function fixEvent(e) {
	e = e || window.event
	if ( e.pageX == null && e.clientX != null ) {
		var html = document.documentElement
		var body = document.body
		e.pageX = e.clientX + (html && html.scrollLeft || body && body.scrollLeft || 0) - (html.clientLeft || 0)
		e.pageY = e.clientY + (html && html.scrollTop || body && body.scrollTop || 0) - (html.clientTop || 0)
	}
	if (!e.which && e.button) {
		e.which = e.button & 1 ? 1 : ( e.button & 2 ? 3 : ( e.button & 4 ? 2 : 0 ) )
	}
	return e
}
