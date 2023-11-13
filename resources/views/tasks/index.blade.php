<x-layout>

	<form action="/" method="GET" class="row search">
		@csrf
		<div class="col-md-7 text-center">
			<input type="text" 
				placeholder="Search..." 
				class="form-control inline"
				name="search"
				value="{{ $q['search'] }}"
			/>
		</div>
		<div class="col-md-3 text-center">
			<x-project-select :projects="$projects" selected="{{ $q['project_id'] }}" />
		</div>
		<div class="col-md-2 text-center">
			<button class="btn btn-light inline">
				Filter
			</button>
		</div>
	</form>

	@foreach($tasks as $task)
		<x-task :task="$task" />
	@endforeach

</x-layout>