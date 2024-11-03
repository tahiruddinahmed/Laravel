<?php
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
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

/**
 * Show to Task Form
 */
Route::view('/tasks/create', 'create')->name('tasks.create');


Route::get('/tasks/{id}/edit', function($id) {
    $task = Task::findOrFail($id);

    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

/**
 * Show single Task page using Task $id
 */
Route::get('/tasks/{id}', function($id)  {
    $task = Task::findOrFail($id);

    return view('show', [
        'task' => $task
    ]);
    
})->name('tasks.show');


/**
 * Submit Add Task Form 
 */
Route::post('/tasks', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

/**
 * Update existing Task
 */
Route::put('/tasks/{id}', function($id, Request $request) {
   $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
   ]);

   $task = Task::findOrFail($id);
   $task->title = $data['title'];
   $task->description = $data['description'];
   $task->long_description = $data['long_description'];

   $task->save();

   return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');
 
// Route Fallback
Route::fallback(function() {
    return 'Still got somewhere';
});

