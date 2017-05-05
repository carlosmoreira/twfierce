@extends('layouts.app')

@section('breadcrumb', 'Projects - Add');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Can be added :)</h4>
                <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('notebook.partials._tinyMce')
@endsection