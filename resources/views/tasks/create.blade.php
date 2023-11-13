<x-layout>
	
	<form action="/tasks" method="POST">
		@csrf

		<fieldset>
			<label>
				Project
			</label>
			<x-project-select :projects="$projects" selected="" />
			@error('project')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label>
				Title
			</label>
			<input type="text" 
				name="title" 
				value="{{old('title')}}" 
				maxlength="127" 
				class="form-control"
			/>
			@error('title')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label>
				Description
			</label>
			<textarea name="description" 
				maxlength="511"
				class="form-control"
			>{{ old('description') }}</textarea>
			@error('description')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="priority">
				Priority
			</label>
			<x-status-select selected="0" />
			@error('priority')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<fieldset>
			<label for="priority">
				Priority
			</label>
			<x-priority-select selected="2" />
			@error('priority')
				<p class="danger">{{ $message }}</p>
			@enderror
		</fieldset>

		<button class="btn btn-secondary mt-1">
			Create Task
		</button>
	</form>
</x-layout>