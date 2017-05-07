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

Route::get('template', function () {
    return view('templatetest');
});

Route::get('users', function(){
    $users = \App\User::all();
    return view('user.view', ['users' => $users]);
})->name('users');

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

Route::get('administration/files/check', function (){
    //->where('projectid',103502)
   $serverFiles =  \App\ProjectFile::with('projectfileversion')->get();
    $missing = [];
    $success = 0;
    $fails = 0;
    $missingCategories = [];
    /**
     * @var \App\ProjectFile $file
     */
   foreach($serverFiles as $file){
       $directory = $file->project->projectname;
       $fileName = $file->projectfileversion[0]->projectfileversionFile;

       $containsSubDirectory = str_contains($fileName,"Teamwork Files");

       if($containsSubDirectory){
           $pathArray = explode('/', $fileName);
           unset($pathArray[0]);
           unset($pathArray[1]);
           unset($pathArray[2]);
           $fileName = implode("/",$pathArray);
       }

       $path = "../resources/projectfiles/" . $directory . "/" . $fileName;

       if(!File::exists($path)){
           $tmpFile = new stdClass();
           $tmpFile->file = $fileName;
           $tmpFile->project = $directory;
           $missing[] = $tmpFile;
           $fails++;
           if(isset($missingCategories[$directory]))
               $missingCategories[$directory]++;
           else
               $missingCategories[$directory] = 1;
       }else
           $success++;
   }

   //dd($missingCategories);

   return view('administration.files-check', ['files' => $missing, 'success' => $success, 'fails' => $fails, 'categories' => $missingCategories]);

})->name('administration.files.check');

Route::get('/search', 'SgearchController@globalSearch');

















