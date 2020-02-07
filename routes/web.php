<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'TaskController@index')->name('home');


Route::get("/tasks" , 'TaskController@index')->name('tasks');
Route::get("/task/create" , 'TaskController@create')->name('task.create');
Route::post("/tasks" , 'TaskController@store')->name('task.store');

Route::get("/tasks/edit/{task}" , "TaskController@edit")->name('task.edit');
Route::put("/tasks/update/{id}" , "TaskController@update")->name('task.update');

Route::delete("/tasks/delete/{id}" , "TaskController@destroy")->name('task.delete');

///project routing
Route::get('/project/create' , 'ProjectController@create')->name('project.create');
Route::post('/project/store/{user_id}' , 'ProjectController@store')->name('project.store');
Route::get('/project/tasks/{project_id}' , 'ProjectController@tasks')->name('project.tasks');