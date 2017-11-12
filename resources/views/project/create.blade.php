@extends('layouts.app')

@section('breadcrumb', 'Projects - Add');

@section('content')
        <div class="row">
            <div class="col-md-12">
                <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
                <hr>
                {!! Form::model($project, ['action' => ['ProjectController@store', $project->id]]) !!}

                <input type="hidden" name="project_id" value="{{$project->project_id}}">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Creating project {{$project->project_id}}</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="projectname">Project Name</label>
                            <input type="text" id="projectname"
                                   class="form-control" name="projectname">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection

@section('footer')
    @include('notebook.partials._tinyMce')
@endsection