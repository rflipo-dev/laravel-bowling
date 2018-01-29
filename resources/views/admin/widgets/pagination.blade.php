<div class="clearfix">
    <div class="pull-left">
        <form method="get" class="form-inline">

          <span class="input-group">
            @if ($collection->currentPage() > 1)
              <span class="input-group-btn">
                <a class="btn btn-default" type="button" href="{{$collection->previousPageUrl()}}"><</a>
              </span>
            @endif
            <input type="text" name="page" value="{{$collection->currentPage()}}" class="form-control" style="width: 60px; text-align: right">
            <span class="input-group-addon">
              / {{$collection->lastPage()}}
            </span>
            @if ($collection->currentPage() < $collection->lastPage())
              <span class="input-group-btn">
                <a class="btn btn-default" type="button" href="{{$collection->nextPageUrl()}}">></a>
              </span>
            @endif
          </span><!-- /input-group -->
        </form>
    </div>
    {!! Form::open(array('url' => Request::url(), 'method' => 'get')) !!}
        <div class="input-group" style='max-width: 200px'>
          {!! Form::text('s', '', ['class' => 'form-control', 'placeholder' => 'Search']); !!}
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-search"></i>
              <span class="sr-only">Search</span>
            </button>
          </span>
        </div>
      {!! Form::close() !!}
</div>
<br/>
