<?php

namespace App\Http\Controllers;

use App\Notebook;
use Illuminate\Http\Request;
use Mockery\Exception;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //First version we will only search for notebooks.
    public function globalSearch(Request $request)
    {
        try {
            if (!$request->has('q'))
                throw new Exception('Please submit search with a value');

            $searchString = $request->get('q');
            $notebooks = Notebook::with('projects')->where('notebookContents', 'like', "%$searchString%")
                ->orWhere('notebookName', 'like', "%$searchString%")
                ->get();
            //return $notebooks;
            return view('search.global', ['notebooks' => $notebooks, 'searchString' => $searchString]);
        } catch (Exception $e) {
            return view('search.global',['searchString' => ''])->with('error', $e->getMessage());
        }
    }
}
