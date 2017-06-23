<div class="col-lg-6">
    <div class="form-group">
        {!! Form::label('subject', 'Subject') !!}
        {!! Form::text('subject', $ticket->subject, ['class' => 'form-control', 'maxlength'=>'150', 'placeholder' => 'Enter a subject or title for this ticket']) !!}
        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('subject')) }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('assigned_to', 'Assigned To') !!}
        {!! Form::select('assigned_to', $users , $ticket->assigned_to, ['id' => 'assigned_to','class' => 'form-control' ]) !!}
        @if ($errors->has('assigned_to'))
            <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('assigned_to')) }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('priority', 'Priority') !!}
        {!! Form::select('priority', config('settings.priority'), $ticket->priority, ['class' => 'form-control']) !!}
        @if ($errors->has('priority'))
            <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('priority')) }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('summary', 'Summary') !!}
        {!! Form::textarea('summary', $ticket->summary, ['class' => 'form-control', 'placeholder' => 'Please enter a summary for this ticket']) !!}
        @if ($errors->has('summary'))
            <span class="help-block">
                <strong>{{ str_replace('.',' ', $errors->first('summary')) }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" id="save" class="btn btn-primary">Save</button>
    </div>
</div>
