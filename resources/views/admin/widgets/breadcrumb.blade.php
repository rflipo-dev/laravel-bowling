<ol class="breadcrumb">
  <li><a href="{{route('admin::dashboard')}}"><i class="fa fa-home"></i>Accueil</a></li>
  @foreach ($config['items'] as $item)
    <li>
      @if (isset($item['url']))
        <a href="{{ $item['url'] }}">{{ $item['text'] }}</a>
      @else
        <span>{{ $item['text'] }}</span>
      @endif
    </li>
  @endforeach
</ol>
