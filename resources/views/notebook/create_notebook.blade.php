@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger" href="/home/?selected={{$notebook->project_id}}"> <i class="fa fa-arrow-left"></i>. Back</a>
                <hr>
                {!! Form::model($notebook, ['action' => ['NotebookController@store', $notebook->id]]) !!}
                <input type="hidden" name="project_id" value="{{$notebook->project_id}}">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Creating Notebook {{$notebook->project_id}}</strong></h3>
                    </div>
                    @include('notebook.partials._form',['btnName' => 'Create Notebook'])
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('notebook.partials._tinyMce')
@endsection