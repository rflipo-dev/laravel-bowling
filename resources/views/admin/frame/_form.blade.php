<div class="form-group{{ $errors->has('gameId') ? ' has-error' : '' }}">
    {!! Form::label('gameId', 'Games') !!}
    {!! Form::select('gameId', \Bowling\Entity\Game::pluck('id','id'), null, ['id' => 'gameId', 'class' => 'form-control', 'placeholder' => 'Choisissez un élément (optionnel)']) !!}
    <small class="text-danger">{{ $errors->first('gameId') }}</small>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success pull-right']) !!}