<div class="form-group">
    <label>First Name</label>
    {{Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control', 'maxlength'=>'60', 'placeholder' => 'Enter the first name for the contact'])}}
    @if ($errors->has('first_name'))
        <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('first_name')) }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Last Name</label>
    {{Form::text('last_name', isset($inner) ? null : $contact->last_name, ['id' => 'last_name', 'class' => 'form-control', 'maxlength'=>'60', 'placeholder' => 'Enter the last name for the contact'])}}
    @if ($errors->has('last_name'))
        <span class="help-block">
            <strong>{{ str_replace('.',' ', $errors->first('last_name')) }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>E-Mail Address</label>
    {{Form::email('email', $contact->email, ['id' => 'email', 'class' => 'form-control', 'maxlength'=>'120', 'placeholder' => 'Enter the email for the contact'])}}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ str_replace('.',' ', $errors->first('email')) }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Phone Number</label>
    {{Form::text('phone_number', $contact->phone_number, ['id' => 'phone_number', 'class' => 'form-control', 'maxlength'=>'60', 'placeholder' => 'Enter the phone number for the contact'])}}
    @if ($errors->has('phone_number'))
        <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('phone_number')) }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Notes</label>
    {{Form::textarea('notes', $contact->notes, ['id' => 'notes', 'class' => 'form-control', 'maxlength'=>'500', 'placeholder' => 'Please enter the notes for the contact' ])}}
    @if ($errors->has('notes'))
        <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('notes')) }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <button  type="submit" class="btn btn-primary">Save</button>
</div>

