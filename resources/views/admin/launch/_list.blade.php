    <thead>
      <tr>
        <th>
          Id
        </th>
        <th>
          Score
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($launches as $launch)
      <tr>
        <td>
          {{$launch->id}}
        </td>
        <td>
          {{$launch->score}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::launches.show', ['id' => $launch->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>