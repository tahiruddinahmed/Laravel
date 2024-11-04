<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/**
 * Redirect the '/' page to the tasks.index page
 */
Route::get('/', function() {
    return redirect()->route('tasks.index');
});

/**
 * Home page
 */
Route::get( '/tasks', function ()  {
    $tasks = Task::latest()->paginate(10);
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

/**
 * Show to Task Form
 */
Route::view('/tasks/create', 'create')->name('tasks.create');


Route::get('/tasks/{task}/edit', function(Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

/**
 * Show single Task page using Task $id
 */
Route::get('/tasks/{task}', function(Task $task)  {
    return view('show', [
        'task' => $task
    ]);
    
})->name('tasks.show');


/**
 * Submit Add Task Form 
 */
Route::post('/tasks', function(TaskRequest $request) {
    $data = $request->validated();
    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

/**
 * Update existing Task
 */
Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
   $data = $request->validated();
   $task->update($data);

   return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');
 
/**
 * Delete Task Route
 */
Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle=complete', function(Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully');
})->name('tasks.toggle');

