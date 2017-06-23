@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Tickets Activity
            <a href="{{ url('/tickets/create') }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> New Ticket</a>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-fw fa-asterisk"></i> Tickets
            </li>

        </ol>
    </div>
</div>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-id">
                <thead>
                <tr>
                    <th>@sortablelink ('ticket_id', 'Ticket')</th>
                    <!-- <th>User</th> -->
                    <th class="center">@sortablelink ('state_id', 'State')</th>
                    <th>@sortablelink ('action', 'Action')</th>
                    <th>@sortablelink ('summary', 'Summary')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        @if(is_null($activity->ticket))
                            <td align="center">{{ $activity->ticket_id }} </td>
                        @else
                            <td align="center"><a href="{{ route('tickets.show', $activity->ticket_id) }}">{{ $activity->ticket->id }}  |  {{ $activity->ticket->subject }}</a></td>
                        @endif
                        <!-- <td><a href="{{URL::to('users/'.$activity->user->id ) }}"> {{ $activity->user->full_name }}</a></td> -->
                        <td align="center"><span class="label label-{{ $activity->state->style }}">{{ $activity->state->title }}</span></td>
                        <td>{{ $activity->action }}</td>
                        <td>{{ $activity->summary }} {{ $activity->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('partials.pagination', ['render' =>  $activities->render()] )
</div>

@stop