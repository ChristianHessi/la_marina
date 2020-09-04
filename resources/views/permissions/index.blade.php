@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-key"></i>Permissions</h1>
        <h1 class="pull-right">
            <a href="{{ route('users.index') }}" style="margin-top: -10px;margin-bottom: 5px" class="btn btn-default pull-right">Users</a>
            <a href="{{ route('roles.index') }}" style="margin-top: -10px;margin-bottom: 5px" class="btn btn-default pull-right">Roles</a>
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('permissions.create') }}">Ajouter</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('permissions.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

