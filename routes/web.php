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
    return redirect('/home');
});

Route::get('/home', 'HomeController@index');

Route::resource('notebooks', 'NotebookController');

Route::get('notebook/{id}', function ($id) {
    $notebook = \App\Notebook::findOrFail($id);
    return view('notebook', ['notebook' => $notebook]);
});

Route::get('notebooks/create/{project_id}', 'NotebookController@create');

Route::resource('projects', 'ProjectController');

Auth::routes();

Route::get('test', function(){

    return \App\Project::with('projectfile.projectfileversion')->where('projects.id', 87711)->first();
    //return \App\ProjectFile::with('projectfileversion')
});
























