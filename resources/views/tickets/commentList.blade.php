<div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
            <thead>
            <tr>
                <th>@sortablelink ('ticket_id', 'Ticket #')</th>
                <th>@sortablelink ('user_id', 'User')</th>
                <th>@sortablelink ('content', 'Content')</th>
                <th>@sortablelink ('created_at', 'Created At')</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->ticket->id}}</td>
                    <td>{{$comment->user->full_name}}</td>
                    <td>{{$comment->content}}</td>
                    <td title="Click To Toggle Format" data-date="{{ $comment->getCreatedAtFormatted() }}">{{ $comment->created_at }}</td>

                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
@if(method_exists($users,'links'))
    @include('partials.pagination', ['render' =>  $users->appends(\Request::except('page'))->render()] )
@endif