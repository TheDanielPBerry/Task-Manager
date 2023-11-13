
@props(['projects', 'selected'])

<select name="project_id" id="project_id" class="form-control">
	<option value="">-- Select Project --</option>
	@foreach($projects as $project)
		<option value="{{ $project->id }}"{{ $project->id==$selected ? ' SELECTED' : '' }}>{{ $project->title }}</option>
	@endforeach
</select>