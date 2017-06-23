@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Ticket States
                @if(Auth::user()->isAdmin())
                    <a href="{{ url('/ticket-states/create') }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> New Ticket State</a>
                @endif
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-info-circle"></i> Ticket State
                </li>

            </ol>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class=" table table-bordered table-hover table-striped  {{ Auth::user()->isAdmin() ? 'table-actions' : ''  }}">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
                        @if( Auth::user()->isAdmin())
                            <th colspan="2"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td>{{$state->title}}</td>
                            <td>{{$state->created_at}}</td>
                            @if( Auth::user()->isAdmin())
                                <td>
                                    <a href="{{ URL::to('ticket-states/'.$state->id).'/edit' }}" >
                                        <button class="btn btn-xs btn-warning"  data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-square-o"> </i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button class="delBot btn btn-xs btn-danger" data-id ="{{$state->id}}"  data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    {!! Form::open(array('url' => 'ticket-states/' . $state->id, 'id' => 'submit'.$state->id, 'class' => 'pull-right'))  !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::close() !!}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('partials.pagination', ['render' =>  $states->render()] )
    </div>

@stop