@extends('layouts.app')

@section('breadcrumb')
    User Management
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th class="hidden-xs">First Name</th>
                    <th class="hidden-xs">Last Name</th>
                    <th>Email</th>
                    <th class="hidden-xs">Username</th>
                    <th>Actions</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="hidden-xs">{{$user->userFirstName}}</td>
                        <td class="hidden-xs">{{$user->userLastName}}</td>
                        <td>{{$user->email}}</td>
                        <td class="hidden-xs">{{$user->name}}</td>
                        <th> <i class="fa fa-edit" onclick="alert('no action yet')" style="cursor: pointer"></i> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection