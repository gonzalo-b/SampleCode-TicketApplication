@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Ticket State
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-info-circle"></i>  <a href="{{ url('/ticket-states') }}">Ticket States</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($state, ['role' => 'form','method' => 'PATCH', 'action' => ['TicketStatesController@update',$state->id ]]) !!}
                  @include('states.formStates')
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
    </div>
@stop