<div class="col-lg-12">
    <div class="table-responsive">
        <table class=" table table-bordered table-hover table-striped table-actions  table-actions-view">
            <thead>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Phone Number</th>
                <th>Notes</th>
                <th>Tickets</th>
                <th>Created At</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td><a href="{{ url('contacts/'.$contact->id ) }}">{{ $contact->full_name }}</a></td>
                    <td><a href="mailto:{{$contact->email}}" target="_blank">{{$contact->email}}</a></td>
                    <td>{{$contact->phone_number}}</td>
                    <td>{{ str_limit($contact->notes, 50) }}</td>
                    <td>{{$contact->tickets->count()}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td align="center">
                        <a href="{{ url('contacts/'.$contact->id ) }}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{ URL::to('contacts/'.$contact->id).'/edit' }}">
                            <button class="btn btn-xs btn-warning"  data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-pencil-square-o"> </i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <button class="delBot btn btn-xs btn-danger" data-id ="{{$contact->id}}"  data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        {!! Form::open(array('url' => 'contacts/' . $contact->id, 'id' => 'submit'.$contact->id, 'class' => 'pull-right'))  !!}
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
@if(method_exists($contacts,'links'))
    @include('partials.pagination', ['render' =>  $contacts->appends(\Request::except('page'))->render()] )
@endif