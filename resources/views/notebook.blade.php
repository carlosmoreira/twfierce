@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger" href="/home?selected={{$notebook->project_id}}"><i class="fa fa-arrow-left"></i> Back To Projects</a>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Note Book: <strong>{{$notebook->notebookName}}</strong></h3>
                    </div>
                    <div class="panel-body">
                        {!! $notebook->notebookContents !!}
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-warning" href="/notebooks/{{$notebook->id}}/edit">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection