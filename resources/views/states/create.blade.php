@extends('layouts.sbadmin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Ticket State
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-info-circle"></i>  <a href="{{ url('/ticket-states') }}">Ticket States</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Create
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($state = new \App\TicketState, ['url' => 'ticket-states']) !!}
                  @include('states.formStates')
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
    </div>
@stop