<x-layout>
	<h4 class="mt-1">Create a Task</h4>
	<form action="/tasks/{{ $task->id }}" method="POST">
		@csrf
		@method('PUT')

		<fieldset>
			<label for="project_id">
				Project
			</label>
			<x-project-select :projects="$projects" selected="{{ $task->project_id }}" />
			@error('project')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="title">
				Title
			</label>
			<input type="text" 
				name="title" 
				value="{{ $task->title }}" 
				maxlength="127" 
				class="form-control"
			/>
			@error('title')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="description">
				Description
			</label>
			<textarea name="description" 
				maxlength="511"
				class="form-control"
			>{{ $task->description }}</textarea>
			@error('description')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="status">
				Status
			</label>
			<x-status-select selected="{{ $task->status }}" />
			@error('priority')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="priority">
				Priority
			</label>
			<x-priority-select selected="{{ $task->priority }}" />
			@error('priority')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<button class="btn btn-secondary mt-1">
			Save Task
		</button>
	</form>
</x-layout>