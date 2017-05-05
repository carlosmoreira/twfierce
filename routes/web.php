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
    return redirect('/dashboard');
});

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/home', 'HomeController@index');

Route::resource('notebooks', 'NotebookController');

Route::get('notebook/{id}', function ($id) {
    $notebook = \App\Notebook::findOrFail($id);
    return view('notebook', ['notebook' => $notebook]);
});

Route::get('notebooks/create/{project_id}', 'NotebookController@create');

Route::resource('projects', 'ProjectController');

Auth::routes();

Route::get('test', function () {

    return \App\Project::with('projectfile.projectfileversion')->where('projects.id', 87711)->first();
    //return \App\ProjectFile::with('projectfileversion')
});

Route::get('download/{fileId}', function ($fileId) {
    $projectFile = \App\ProjectFile::with(['project', 'projectfileversion'])->findOrFail($fileId);

    $projectDir = $projectFile->project->projectname;

    if (isset($projectFile->projectfileversion[0])) {
        $filePath = "../resources/projectfiles/" .
            $projectDir .
            '/' .
            $projectFile->projectfileversion[0]->projectfileversionFile;
        if (File::exists($filePath))
            return response()->download($filePath);
        else
            return Redirect::to('/projects/' . $projectFile->projectId)->with('error', 'Unfortunately we were unable to find the specified file!');
    }
});

Route::get('template', function () {
    return view('templatetest');
});

Route::get('users', function(){
    $users = \App\User::all();
    return view('user.view', ['users' => $users]);
})->name('users');




















