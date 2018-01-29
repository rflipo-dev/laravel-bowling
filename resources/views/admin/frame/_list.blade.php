    <thead>
      <tr>
        <th>
          Id
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($frames as $frame)
      <tr>
        <td>
          {{$frame->id}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::frames.show', ['id' => $frame->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>