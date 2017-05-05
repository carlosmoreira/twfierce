<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        $totalProjects = \App\Project::all()->count();
        $totalFiles = \App\ProjectFile::all()->count();
        $totalNotebooks = \App\Notebook::all()->count();
        $totalUsers = \App\User::all()->count();
        return view('dashboard.view', [
            'totalProjects' => $totalProjects,
            'totalFiles' => $totalFiles,
            'totalNotebooks' => $totalNotebooks,
            'totalUsers' => $totalUsers
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return view('home',
           ['selected' => ($request->has('selected')) ?  $request->get('selected') : false]);
    }
}
