@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Staff
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-users"></i> Users
                </li>
            </ol>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="row top-buffer">
        @include('auth.userList')
    </div>

@stop