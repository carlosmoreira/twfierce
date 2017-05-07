@extends('layouts.app')

@section('breadcrumb', 'Administration File Validator')

@section('content')
    <p class="alert alert-warning">
        <i class="fa fa-exclamation-circle"></i>
        <i> The following files were not found in the projects directory file.</i>
    </p>
    <div class="row">
        <div class=" col-md-offset-2 col-md-4">
            <p class="alert alert-success">
                <strong>Successfully Found: </strong>{{$success}}
            </p>
        </div>
        <div class="col-md-4">
            <p class="alert alert-danger">
                <strong>Unable to Find: </strong>{{$fails}}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills" role="tablist">
                @foreach($categories as $categoryName => $categoryTotal)
                    <li role="presentation">
                       <button class="btn btn-default">{{$categoryName}} <span class="badge">{{$categoryTotal}}</span></button>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>File</th>
                    <th>Project</th>
                </tr>
                @foreach($files as $file)
                    <tr>
                        <td>{{$file->file}}</td>
                        <td>{{$file->project}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection