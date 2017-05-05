<ul class="nav navbar-nav side-nav">
    {{--<li>--}}
        {{--<input type="text" class="form-control" placeholder="Filter Projects..." ng-model="filterProject"/>--}}
    {{--</li>--}}
    @foreach($projects as $project)
        <li>
            <a href="/projects/{{ $project->id }}"><i class="fa fa-fw fa-dashboard"></i> {{$project->projectname}}</a>
        </li>
    @endforeach
</ul>