@props(['selected'])

<select name="status" id="status" class="form-control">
	<option value="0" {{ $selected==0 ? 'SELECTED' : ''}}>Unstarted</option>
	<option value="1" {{ $selected==1 ? 'SELECTED' : ''}}>Stuck</option>
	<option value="2" {{ $selected==2 ? 'SELECTED' : ''}}>In Progress</option>
	<option value="3" {{ $selected==3 ? 'SELECTED' : ''}}>Complete</option>
</select>