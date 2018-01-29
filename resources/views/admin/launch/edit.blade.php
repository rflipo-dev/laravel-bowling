@extends('admin.layouts.page')

@section('page-title', 'Launches')

@section('title')
Launches: {{$launch->id}}
@endsection

@section('breadcrumb')
    @widget('Bowling.Widgets.Admin.Breadcrumb', ['items' => [['text' => 'Launches', 'url' => route('admin::launches.index')], ['text' => $launch->id, 'url' => route('admin::launches.show', ['id' => $launch->id])]]])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          {!! Form::model($launch, ['route' => ['admin::launches.update', $launch->id], 'method' => 'PUT', 'files' => true]) !!}

              @include('admin.launch._form', ['submitText' => 'Modifier'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      {!! Form::open(['method' => 'delete', 'route' => ['admin::launches.destroy', $launch->id], 'data-confirm' => 'Delete']) !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']); !!}
      {!! Form::close() !!}
      </form>
    </div>
  </div>

@endsection
