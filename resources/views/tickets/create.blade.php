@extends('layouts.sbadmin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Ticket
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-fw fa-asterisk"></i>  <a href="{{ url('/tickets') }}">Tickets</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Create
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($ticket = new \App\Ticket, ['url' => 'tickets']) !!}
                  @include('tickets.formTickets')
            {!! Form::close() !!}

        </div>
        <!-- /.row -->
    </div>
@stop