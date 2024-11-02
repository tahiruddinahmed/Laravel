<?php
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Models\Task;

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::get( '/tasks', function ()  {
    $tasks = \App\Models\Task::latest()->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id)  {
    $task = \App\Models\Task::findOrFail($id);

    // Instead this you can use findOrFail()
    // if(!$task) {
    //     abort(404, 'Task not found');
    // }

    return view('show', [
        'task' => $task
    ]);
    
})->name('tasks.show');

// Task Form Submission 
Route::post('/tasks', function(Request $request) {
    // dd - dump and die
    dd($request->all());
})->name('tasks.store');

// Route Fallback
Route::fallback(function() {
    return 'Still got somewhere';
});

// GET - read data, fetch documents
// POST - Store new data, send forms. POST will generally create something on the server. 
// PUT - modify an existing thing
// DELETE - delete data

