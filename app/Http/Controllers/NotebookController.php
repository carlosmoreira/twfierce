<?php

namespace App\Http\Controllers;

use App\Notebook;
use Illuminate\Http\Request;
use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class NotebookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id, Request $request)
    {
        $notebook = new Notebook();
        $notebook->project_id = $project_id;
        return view('notebook/create_notebook', ['notebook' => $notebook]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notebook = Notebook::create($request->only(['notebookName', 'notebookContents', 'project_id']));
        return redirect('/home?selected=' . $request->get('project_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook = \App\Notebook::findOrFail($id);
        return view('notebook/edit_notebook', ['notebook' => $notebook]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $notebook = Notebook::findOrFail($id);
            $notebook->fill($request->all());
            $notebook->update();
            return redirect("/notebooks/$id/edit")->with(['notebook' => $notebook]);
        }catch (Exception $e){
            dd($e->getMessage());
            //redirect("/notebooks/$id/edit")->z;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
