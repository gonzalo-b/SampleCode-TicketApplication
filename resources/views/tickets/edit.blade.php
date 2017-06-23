@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Ticket
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-fw fa-asterisk"></i>  <a href="{{ url('/tickets') }}">Tickets</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            {!! Form::model($ticket, ['role' => 'form','method' => 'PATCH', 'action' => ['TicketsController@update',$ticket->id ]]) !!}
                  @include('tickets.formTickets')
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label>State</label>
                        {{Form::select('ticket[state_id]', $states,$ticket->state->id,  ['class' => 'form-control' ])}}
                        @if ($errors->has('ticket.state_id'))
                            <span class="help-block">
                                <strong>{{ str_replace('.',' ', $errors->first('ticket.state_id')) }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
    </div>
@stop
