@extends('layouts.app')

@section('content')
     <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Ticket # {{ $ticket->id }}
                <a href="{{ url('tickets/') }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-asterisk"></i> All Tickets</a>
                <a href="{{ url('tickets/'.$ticket->id).'/edit' }}" class="btn btn-sm btn-warning pull-right"><i class="fa fa-pencil-square-o"></i> Edit</a>
            </h1>

        </div>
    </div>


    <!-- Ticket Details -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6">
                <form class="form">
                    <div class="form-group">
                        <label>School</label>
                        @if ($ticket->school)
                            <br><a href="{{ url('schools', $ticket->school->id) }}">{{ $ticket->school->getTitleAsSpecial() }}</a>
                        @else
                            <br><em>Ticket Submitted Via Website</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Created By</label>
                        @if ($ticket->user)
                            <br><a href="{{ url('users', $ticket->user->id) }}">{{ $ticket->user->full_name }}</a>
                        @else
                            <br><em>Ticket Submitted Via Website</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Assigned To</label>
                        @if ($ticket->assigned)
                            <br><a href="{{ url('users', $ticket->assigned->id) }}">{{ $ticket->assigned->full_name }}</a>
                        @else
                            <input class="form-control" value="{{ $ticket->assigned ? $ticket->assigned->full_name : '' }}" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        @if ($ticket->contact)
                            <br><a href="{{ url('contacts/'.$ticket->contact->id ) }}">{{ $ticket->contact->full_name }}</a>
                        @else
                            <input class="form-control" value="{{ $ticket->contact ? $ticket->contact->full_name : '' }}" readonly>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control" value="{{ $ticket->subject }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Student Name</label>
                        <input class="form-control" value="{{ $ticket->student_name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input class="form-control" value="{{ $ticket->category }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Priority</label>
                        <input class="form-control" value="{{ $ticket->priority }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <textarea class="form-control" rows="10" readonly>{{ $ticket->summary}}</textarea>
                    </div>
                </form>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>State</label>
                        {{Form::select('state_id', $states, $ticket->state->id,  ['id' => 'state-change', 'data-url' => route('tickets.update-state', $ticket->id), 'class' => 'form-control' ])}}
                    </div>
                    <h3>Comments</h3>
                    @forelse($comments as $comment)
                        <div class="panel panel-default" id="comment-{{ $comment->id }}">
                            <div class="panel-heading">
                                <strong><a href="{{ url('users/'.$comment->user->id ) }}">{{ $comment->user->full_name }}</a></strong>
                                @if ($comment->wasEdited())
                                    <span class="text-muted" title="{{ $comment->getUpdatedAtFormatted() }}">{{ $comment->CreatedDiffForHumans() }} </span>
                                    <em title="This Comment Has Been Edited" class="pull-right text-success"><small><i class="fa fa-pencil"></i></small></em>
                                @else
                                    <span class="text-muted" title="{{ $comment->getCreatedAtFormatted() }}">{{ $comment->UpdatedDiffForHumans() }} </span>
                                @endif
                            </div>
                            <div class="panel-body">
                                {{$comment->content}}
                                <div class="comment-actions">
                                    <button data="comment-box-{{$comment->id}}" class="btn btn-xs btn-edit stylish"  data-toggle="tooltip" data-placement="top" title="Edit">&#xf044;</button>
                                    <button data-id="{{$comment->id}}" class="btn btn-xs delBot stylish"  data-toggle="tooltip" data-placement="top" title="Delete">&#xf00d;</button>
                                </div>
                                <div class="edit-comment" id="comment-box-{{$comment->id}}">
                                    {!! Form::model($comment, ['method' => 'PATCH', 'action' => ['TicketCommentsController@update',$ticket->id,$comment->id ]]) !!}
                                    <div class="input-group top-buffer">
                                        {!! Form::textarea('content', null, ['class' => 'form-control smaller-box', 'placeholder' => 'Add a comment']) !!}
                                        <span class="input-group-addon">
                                          <button type="submit" class="stylish" > &#xf044;</button>
                                       </span>
                                    </div>
                                    {!! Form::close() !!}
                                    {!! Form::open(array('action' => ['TicketCommentsController@destroy',$ticket->id,$comment->id ], 'id' => 'submit'.$comment->id, 'class' => 'pull-right'))  !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        No Comments Were Found
                    @endforelse
                    {!! Form::open(array('url' => 'tickets/' . $ticket->id . '/comments'))  !!}
                        <div class="input-group top-buffer">
                            {!! Form::textarea('content', null, ['class' => 'form-control comment-box', 'placeholder' => 'Add a comment']) !!}
                            <span class="input-group-addon">
                            <button type="submit" class="stylish" id="saveComment">&#xf044;</button>
                        </span>
                        </div>
                    {!! Form::close() !!}
                </div>

        </div>
    </div>
@stop