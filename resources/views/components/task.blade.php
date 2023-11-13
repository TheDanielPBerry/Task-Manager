@props(['task'])

<div class="task-card row" data-task-id="{{ $task->id }}">
	<div class="col-md-6">
		<h4>{{ $task->title }}</h4>
		<p>{{ $task->description }}</p>
		<span class="faded">
			<strong>Created: </strong>
		{{ $task->created_at->format('F j, Y, g:i a') }}</span>
	</div>
	<div class="col-md-3 mt-1">
		<h6>
			<strong>Status:</strong>
			{{ ['Unstarted', 'Stuck', 'In Progress', 'Complete'][$task->status] }}
		</h6>
		<h6>
			<strong>Priority:</strong>
			{{ ['Urgent', 'High', 'Medium', 'Low', 'Backlog'][$task->priority] }}
		</h6>
		<h6>
			<strong>Project:</strong>
			{{ $task->project->title }}
		</h6>
	</div>
	<div class="col-md-3 task-card-actions">
		<a class="btn btn-secondary drag-action">
			&#x2B7F;	
		</a>
		<a href="/tasks/{{ $task->id }}/edit" class="btn btn-success">
			<i class="bi bi-pencil"></i>
		</a>
		<form action="/tasks/{{ $task->id }}" method="POST" class="inline">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-danger">
				<i class="bi bi-trash"></i>
			</button>
		</form>
	</div>
</div>