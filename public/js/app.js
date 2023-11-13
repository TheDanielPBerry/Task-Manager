var $currentDragDropTarget = null;
var originalDragPosition = { x: 0, y: 0 };
var currentDragPosition = { x: 0, y: 0 };

var reSort = (dragDropRow, positionDiff) => {
	let $next = dragDropRow.next('.task-card');
	let $prev = dragDropRow.prev('.task-card');
	
	if(positionDiff < 0 && $prev.length > 0) { 
		dragDropRow.remove();
		$currentDragDropTarget.insertBefore($prev);
	} 
	else if(positionDiff > 0 && $next.length > 0) { 
		dragDropRow.remove();
		$currentDragDropTarget.insertAfter($next);
	}
	$currentDragDropTarget.removeClass('drag-drop');
	$currentDragDropTarget = null;

	setTimeout(() => { 
		if($currentDragDropTarget == null) {
			updateSortOrders();
		}
	}, 2000);

};

var updateSortOrders = () => {
	let payload = Array.from(document.getElementsByClassName('task-card')).map((card, index) => $(card).attr('data-task-id'));

	$.ajax({
		url: '/tasks/resort/',
		type: 'post',
		data: { tasks: payload },
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		dataType: 'application/json',
		success: function (data) {
			console.info(data);
		}
	});
}


$(document).on('mousedown', '.drag-action', (e) => {
	$currentDragDropTarget = $(e.target).parents('.task-card');
	$currentDragDropTarget.addClass('drag-drop');
	originalDragPosition = { x: e.pageX, y: e.pageY };
})
.on('mousemove', (e) => {
		if($currentDragDropTarget != null) {
		currentDragPosition = { x: e.pageX, y: e.pageY };
		if(currentDragPosition.y > (originalDragPosition.y + 80)) {
			reSort($currentDragDropTarget, 1);
		}
		else if(currentDragPosition.y < (originalDragPosition.y - 80)) {
			reSort($currentDragDropTarget, -1);
		}
	}
})
.on('mouseup', () => {
	if($currentDragDropTarget != null) {
		$currentDragDropTarget.removeClass('drag-drop');
		$currentDragDropTarget = null;
	}
});
