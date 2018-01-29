@extends('admin.layouts.page')

@section('page-title', 'Frames')

@section('title')
Frames: {{$frame->id}}
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Frames', 'url' => route('admin::frames.index')], ['text' => $frame->id, 'url' => route('admin::frames.show', ['id' => $frame->id])]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($frame, ['route' => ['admin::frames.update', $frame->id], 'method' => 'PUT', 'files' => true]) !!}

              @include('admin.frame._form', ['submitText' => 'Modifier'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      {!! Form::open(['method' => 'delete', 'route' => ['admin::frames.destroy', $frame->id], 'data-confirm' => 'Delete']) !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']); !!}
      {!! Form::close() !!}
      </form>
    </div>
  </div>

@endsection
