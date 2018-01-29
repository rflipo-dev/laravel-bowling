    <thead>
      <tr>
        <th>
          Id
        </th>
        <th>
          Statut
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($games as $game)
      <tr>
        <td>
          {{$game->id}}
        </td>
        <td>
          {{$game->status}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::games.show', ['id' => $game->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>