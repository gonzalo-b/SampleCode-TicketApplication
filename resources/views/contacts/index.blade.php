@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contacts
                <a href="{{ url('/contacts/create') }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> New Contact</a>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-users"></i> Contacts
                </li>
            </ol>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="row top-buffer">
        @include('contacts.contactList')
    </div>

@stop