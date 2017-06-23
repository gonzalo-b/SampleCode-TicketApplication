@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Contact
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-fw fa-users"></i>  <a href="{{ url('/contacts') }}">Contacts</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($contact, ['role' => 'form','method' => 'PATCH', 'action' => ['ContactsController@update',$contact->id ]]) !!}
                <div class="col-lg-6">
                    @include('contacts.formContacts')
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
@stop