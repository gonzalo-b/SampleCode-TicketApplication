    <div class="col-lg-12">
    <div class="table-responsive">
        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
@if(method_exists($users,'links'))
    @include('partials.pagination', ['render' =>  $users->appends(\Request::except('page'))->render()] )
@endif