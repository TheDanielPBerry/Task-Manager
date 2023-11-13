@props(['selected'])

<select name="priority" id="priority" class="form-control">
	<option value="0" {{ $selected==0 ? 'SELECTED' : ''}}>Urgent</option>
	<option value="1" {{ $selected==1 ? 'SELECTED' : ''}}>High</option>
	<option value="2" {{ $selected==2 ? 'SELECTED' : ''}}>Medium</option>
	<option value="3" {{ $selected==3 ? 'SELECTED' : ''}}>Low</option>
	<option value="4" {{ $selected==4 ? 'SELECTED' : ''}}>Backlog</option>
</select>