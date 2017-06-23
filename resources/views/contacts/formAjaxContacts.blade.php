<div class="form-group">
    <label>School</label>
    <input id="contact_school" class="form-control">
    {{Form::select('' , $schools, null, ['id' => 'contact_school', 'class' => 'form-control' ])}}
    @if ($errors->has('school_id'))
        <span class="help-block">
                <strong>{{ $errors->first('school_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>First Name</label>
    {{Form::text('', null, ['id' => 'first_name', 'class' => 'form-control', 'maxlength'=>'60'])}}
    @if ($errors->has('first_name'))
        <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Last Name</label>
    {{Form::text('', null, ['id' => 'last_name', 'class' => 'form-control', 'maxlength'=>'60'])}}
    @if ($errors->has('last_name'))
        <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>E-Mail Address</label>
    {{Form::email('', null, ['id' => 'email', 'class' => 'form-control', 'maxlength'=>'120'])}}
    @if ($errors->has('email'))
        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Role</label>
    {{Form::select('', config('mybigyellowbus.contact-roles'), null, ['id' => 'role', 'class' => 'form-control'])}}
    @if ($errors->has('role'))
        <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Phone Number</label>
    {{Form::text('', null, ['id' => 'phone_number', 'class' => 'form-control', 'maxlength'=>'60'])}}
    @if ($errors->has('phone_number'))
        <span class="help-block">
                <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Notes</label>
    {{Form::textarea('', null, ['id' => 'notes', 'class' => 'form-control', 'maxlength'=>'500' ])}}
    @if ($errors->has('notes'))
        <span class="help-block">
                <strong>{{ $errors->first('notes') }}</strong>
        </span>
    @endif
</div>

<div class="form-group center">
    <button  type="button" id="close-contactbox"  class="btn btn-danger right-buffer">Cancel</button>
    <button  type="button" id="ajaxSaveContact" class="btn btn-primary ">Save</button>
</div>

