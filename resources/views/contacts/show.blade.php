@extends('layouts.app')

@section('content')
        <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{$contact->full_name}}
            <a href="{{ url('/contacts/') }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-users"></i> All Contacts</a>
        </h1>

    </div>
</div>


<!-- User Details -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            {!! Form::model($contact) !!}
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" value="{{$contact->first_name}}" readonly>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" value="{{$contact->last_name}}" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" value="{{$contact->email}}" readonly>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input class="form-control" value="{{$contact->role}}" readonly>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" value="{{$contact->phone_number}}" readonly>
            </div>
            <div class="form-group">
                <label>Notes</label>
                <textarea class="form-control"readonly>{{$contact->notes}}</textarea>
            </div>
            </form>
        </div>
        <div class="col-lg-6">
            <h3>Tickets Assigned</h3>
            @include('partials.assigned')
        </div>
    </div>
</div>
@stop
