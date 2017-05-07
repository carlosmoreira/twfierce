@extends('layouts.app')

@section('breadcrumb', 'Search')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="/search">
                <div class="input-group">
                    <input name="q" type="text" class="form-control" placeholder="Search for..."
                           value="{{$searchString}}">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            @if(count($notebooks) > 0)
                <p>
                    <i>Notebooks with <strong>'{{$searchString}}'</strong></i>
                </p>
                <div class="list-group">
                    @foreach($notebooks as $notebook)
                        <a class="list-group-item" href="/notebook/{{$notebook->id}}">
                            @if($notebook->projects)
                                <i>{{$notebook->projects->projectname}}</i>
                            @else
                                <i>NA</i>
                            @endif
                            | <strong>{{$notebook->notebookName}}</strong>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="alert alert-danger"><i class="fa fa-exclamation-circle">
                    </i> No search results with '<strong>{{$searchString}}</strong>' was found.
                </p>
            @endif
        </div>
    </div>


@endsection