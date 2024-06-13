<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Response;

Route::get('/sample', function () {
    return view('welcome');
});

Route::get('/greet', function () {
    return view('index', [
        'name' => 'Juan'
    ]);
});

// Route::get('/tasks/{id}', function ($id) {
//     return view('show', [
//         'task' => \App\Models\Task::find($id)
//     ]);
// })->name('tasks.show');

Route::delete('users/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Deleted Successfully!');
})->name('tasks.destroy');

Route::post('tasks', function(Task $task,TaskRequest $request){

    $data= $request->validated();


    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_desc = $data['long_desc'];
    $task->save();

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Created Successfully!');
})->name('tasks.store'); 

Route::put('tasks/{task}', function(Task $task, TaskRequest $request){
    
    $data= $request->validated();

    
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_desc = $data['long_desc'];
    $task->save();

    return redirect()->route('tasks.show',['task' => $task->id])->with('success', 'Updated Sucessfully!');

})->name('tasks.update'); 

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'tasks'=> $task 
    ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'tasks' => $task
    ]);
})->name('tasks.edit');



Route::get('/sample2', function () {
    return redirect()->route('hello');
});
 
Route::get('/sample3', function () {
    return 'This is a new Routes';
})-> name('hello');

Route::fallback(function () {
    return 'Not Existing Route!';
});

