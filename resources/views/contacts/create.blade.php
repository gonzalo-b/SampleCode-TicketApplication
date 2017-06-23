@extends('layouts.sbadmin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Contact
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-fw fa-users"></i>  <a href="{{ url('/contact') }}">Contacts</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Create
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($contact = new \App\Contact, ['action' => 'ContactsController@store']) !!}
                 <div class="col-lg-6">
                      @include('contacts.formContacts')
                 </div>
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
    </div>
@stop