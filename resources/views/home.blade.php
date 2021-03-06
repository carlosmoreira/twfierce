@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="dashboardCtrl" ng-init="init({{$selected}})">
        <div class="row" ng-show="running">
            <div class="col-md-12">
                Fetching....
            </div>
        </div>
        <div class="row" ng-show="!running">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Filter Projects..." ng-model="filterProject">
                <div class="list-group" style="max-height: 500px; overflow: scroll">
                    <a href="" class="list-group-item"
                       ng-repeat="project in projects | filter:filterProject"
                       ng-click="selectProject(project)"
                       ng-class="(isSelected(project) ? 'active' :  '')">
                        @{{project.projectname}}
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div ng-if="!selProject">
                    <h3>Please select a project.</h3>
                </div>
                <div class="panel panel-primary" ng-if="selProject">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="pull-left">@{{selProject.projectname}}</span>
                            <span class="pull-right">[@{{ selProject.id }}] </span>
                            <div style="clear: both"></div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-success" href="/notebooks/create/@{{selProject.id}}"><i
                                    class="fa fa-plus"></i> Create</a>
                        <div ng-if="selProject.notebook.length > 0">
                            <h4>Notebooks:</h4>
                            <div class="list-group">
                                <a class="list-group-item"
                                   ng-repeat="notebook in selProject.notebook"
                                   href="/notebook/@{{notebook.id}}">
                                    @{{ notebook.notebookName }}
                                </a>
                            </div>
                        </div>
                        <div ng-if="selProject.notebook.length == 0">
                            <h3>No Notebooks for selected
                                projects.</h3>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary" ng-if="selProject">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @{{ selProject.projectname }} Files:
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="download/@{{ file.projectfileId }}" class="list-group-item" ng-repeat="file in selProject.projectfile" ng-click="d(file)">
                               <i class="fa fa-file"></i> @{{ getLastVersionProjectName(file) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        app.controller('dashboardCtrl', function ($scope, $http) {
            $scope.running = true;
            $scope.d = function (f) {
                console.log(f);
            };
            $scope.init = function (selected) {
                $scope.running = true;
                $http.get('/projects')
                    .then(function (response) {
                        console.log('resp', response);
                        $scope.running = false;
                        $scope.projects = response.data;
                        if (selected)
                            $scope.selProject = $scope.setSelectedById(selected);
                    });
            };

            $scope.selectProject = function (project) {
                $scope.selProject = project;
            }

            $scope.setSelectedById = function (id) {
                var selected = $scope.projects.filter(function (proj) {
                    return proj.id == id;
                });

                if (angular.isArray(selected) && selected.length > 0)
                    return selected[0];
            };

            $scope.isSelected = function (project) {
                if (!$scope.selProject)
                    return false;
                return project.id == $scope.selProject.id;
            };

            $scope.getLastVersionProjectName = function(file)
            {
                try {
                    return file.projectfileversion[file.projectfileversion.length - 1].projectfileversionFile;
                } catch (exception) {
                    return null
                }
            }
        });

    </script>
@endsection