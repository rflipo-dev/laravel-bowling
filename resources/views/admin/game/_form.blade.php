<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'Statut') !!}
    {!! Form::select('status', ['pendingPlayers' => 'pendingPlayers','running' => 'running','finished' => 'finished'], null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('status') }}</small>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success pull-right']) !!}