<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email*') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
    {!! Form::label('firstname', 'Firstname') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('firstname') }}</small>
</div>
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
    {!! Form::label('lastname', 'Lastname') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('lastname') }}</small>
</div>
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    {!! Form::label('username', 'Username*') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('username') }}</small>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success pull-right']) !!}