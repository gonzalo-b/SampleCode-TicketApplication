<div class="col-lg-12">
    <div class="table-responsive">
        <table id="ticketsTable" class="table table-bordered table-hover table-id table-striped table-actions table-actions-view">
            <thead>
            <tr>
                <th>#</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Assigned</th>
                <th>Contact</th>
                <th>Subject</th>
                <th class="center">Priority</th>
                <th class="center">State</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td align="center"><a href="{{ url('tickets', $ticket->id) }}">{{$ticket->id}}</a></td>
                    <td title="Click To Toggle Format" data-date="{{ $ticket->getCreatedAtFormatted() }}">{{ $ticket->created_at }}</td>
                    <td title="Click To Toggle Format" data-date="{{ $ticket->getUpdatedAtFormatted() }}">{{ $ticket->updated_at }}</td>
                    <td>
                        @unless(is_null($ticket->assigned))
                            <a href="{{ url('users/'.$ticket->assigned->id ) }}">{{ $ticket->assigned->full_name }}</a>
                        @else
                            <em>None Set</em>
                        @endif
                    </td>
                    <td>
                        @unless(is_null($ticket->contact))
                            <a href="{{ url('contacts/'.$ticket->contact->id ) }}">{{ $ticket->contact->full_name }}</a>
                        @else
                            <em>None Set</em>
                        @endif
                    </td>
                    <td>{{ $ticket->subject }}</td>
                    <td align="center"><span class="label {{ $ticket->getPriorityLabel() }}">{{ $ticket->priority }}</span></td>
                    <td align="center">
                        <span class="label label-{{  $ticket->state->style }}"> {{  $ticket->state->title }}</span>
                    </td>
                    <td align="center">
                        <a href="{{ url('tickets/'.$ticket->id ) }}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                    </td>
                    <td align="center">
                        <a href="{{ url('tickets/'.$ticket->id).'/edit' }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"> </i></a>
                    </td>
                    <td align="center">
                        <button class="delBot btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" data-id ="{{ $ticket->id }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        {!! Form::open(array('url' => 'tickets/' . $ticket->id, 'id' => 'submit'.$ticket->id, 'class' => 'pull-right'))  !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">No Tickets Were Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@if(method_exists($tickets,'links'))
    @include('partials.pagination', ['render' =>  $tickets->appends(\Request::except('page'))->links()] )
@endif
