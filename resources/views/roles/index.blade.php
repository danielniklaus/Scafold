@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right">
            <!-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> -->
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<section class="content-header">
        <h1 class="pull-left">Roles</h1>
        <h1 class="pull-right">
        @can('role-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">Add New</a>
        @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('roles.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

@endsection