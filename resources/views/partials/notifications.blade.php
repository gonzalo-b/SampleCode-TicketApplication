@if ($message = session()->get('success'))
  <div class="animated fadeIn alert alert-success alert-dismissable top-buffer">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Exito:</strong> {!! $message !!}
  </div>
  {{ session()->forget('success') }}
@endif
@if ($message = session()->get('error'))
  <div class="animated fadeIn alert alert-danger alert-dismissable top-buffer">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> {!! $message !!}
  </div>
  {{ session()->forget('error') }}
@endif
@if (isset($errors) && count($errors) > 0)
  <div class="animated fadeIn alert alert-danger alert-dismissable top-buffer">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{--<strong>Whoops! Something went wrong!</strong>--}}
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ str_replace('-',' ',$error) }}</li>
      @endforeach
    </ul>
  </div>
@endif
@if ($message = session()->get('warning'))
  <div class="animated fadeIn alert alert-warning alert-dismissable top-buffer">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Precaución:</strong> {!! $message !!}
  </div>
  {{ session()->forget('warning') }}
@endif
@if ($message = session()->get('info'))
  <div class="animated fadeIn alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Info:</strong> {!! $message !!}
  </div>
  {{ session()->forget('info') }}
@endif
