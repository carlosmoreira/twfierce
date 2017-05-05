@extends('layouts.app')

@section('breadcrumb')
    {{$breadcrumb}}
@endsection

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="pull-left">{{$project->projectname}}</span>
                <span class="pull-right">[{{$project->id}}] </span>
                <div style="clear: both"></div>
            </h3>
        </div>
        <div class="panel-body">
            <a class="btn btn-success" href="/notebooks/create/{{$project->id}}"><i
                        class="fa fa-plus"></i> Create</a>
            <div>
                <h4>Notebooks:</h4>
                <div class="list-group">
                    @if($project->notebook)
                        @foreach($project->notebook as $notebook)
                            <a class="list-group-item"
                               href="/notebook/{{$notebook->id}}">
                                {{$notebook->notebookName}}
                            </a>
                        @endforeach
                    @else
                        <p>No notebooks</p>
                    @endif
                </div>
            </div>
            <div ng-if="selProject.notebook.length == 0">
                <h3>No Notebooks for selected
                    projects.</h3>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{$project->projectname}} Files: [{{$project->totalFiles}}]
            </h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @if($project->projectfile)
                    @foreach($project->projectfile as $file)
                        <a href="/download/{{ $file->projectfileId }}" class="list-group-item">
                            <i class="fa fa-file"> {{$file->fileName}}</i> - File
                        </a>
                    @endforeach
                @else
                    <h3>No Files</h3>
                @endif
            </div>
        </div>
    </div>
@endsection