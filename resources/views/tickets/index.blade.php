@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tickets
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
    <div class="row top-buffer">
        @include('tickets.ticketList')
    </div>
@stop
@push('scripts')
    <script>
        function callFormSearch($value) {
            $('#state').val($value);
            $('#indexForm').submit();
        }
        $('#allticketsBtn').click(function () {
            if( $('#alltickets').val()){
                $('#alltickets').val('');
            }else{
                $('#alltickets').val(true);
            }
            $('#indexForm').submit();
        })
    </script>
@endpush