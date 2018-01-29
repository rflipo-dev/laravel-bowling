<div class="form-group{{ $errors->has('frameId') ? ' has-error' : '' }}">
    {!! Form::label('frameId', 'Frames') !!}
    {!! Form::select('frameId', \Bowling\Entity\Frame::pluck('id','id'), null, ['id' => 'frameId', 'class' => 'form-control', 'placeholder' => 'Choisissez un élément (optionnel)']) !!}
    <small class="text-danger">{{ $errors->first('frameId') }}</small>
</div>
<div class="form-group{{ $errors->has('score') ? ' has-error' : '' }}">
    {!! Form::label('score', 'Score') !!}
    {!! Form::number('score', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('score') }}</small>
</div>

{!! Form::submit($submitText, ['class' => 'btn btn-success pull-right']) !!}