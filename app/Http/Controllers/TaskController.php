<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	//Home page - Lists all tasks
	public function index(Request $request) {
		return view('tasks.index', [
			'tasks' => Task::latest()
				->filter(request(['search', 'project_id']))
				->orderBy('created_at')
				->orderBy('priority')
				->orderBy('sortOrder')
				->get(), 
			'projects' => Project::latest()->orderBy('title')->get(),
			'q' => [
				'search' => $request->search ?? '',
				'project_id' => $request->project_id ?? ''
			]
		]);
	}

	public function store(Request $request) {
		$formFields = $request->validate([
			'title' => 'required|max:127',
			'description' => 'max:511',
			'status' => 'required',
			'priority' => 'required',
			'project_id' => ''
		]);

		if(empty($formFields['$description'])) {
			$formFields['$description'] = '';
		}
		Task::create($formFields);

		return redirect('/')->with('message', 'Task Created');
	}

	public function reSort(Request $request) {
		if(is_array($request->tasks)) {
			foreach($request->tasks as $sortOrder => $taskId) {
				Task::find($taskId)->update(['sortOrder' => $sortOrder]);
			}
		}
		
		return ['success' => 1];
	}

	public function update(Request $request, Task $task) {

		$formFields = $request->validate([
			'title' => 'required|max:127',
			'description' => 'max:511',
			'status' => 'required',
			'priority' => 'required',
			'project_id' => ''
		]);

		$task->update($formFields);

		return redirect('/')->with('message', 'Task Updated');
	}

	public function destroy(Task $task) {
		$task->delete();

		return redirect('/')->with('message', 'Task Deleted');
	}

	public function create() {
		return view('tasks.create', ['projects' => Project::latest()->orderBy('title')->get()]);
	}

	public function edit(Task $task) {
		return view('tasks.edit', [
			'task' => $task,
			'projects' => Project::latest()->orderBy('title')->get()
		]);
	}
}
