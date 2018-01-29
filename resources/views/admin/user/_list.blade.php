    <thead>
      <tr>
        <th>
          Id
        </th>
        <th>
          Firstname
        </th>
        <th>
          Lastname
        </th>
        <th>
          Username
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>
          {{$user->id}}
        </td>
        <td>
          {{$user->firstname}}
        </td>
        <td>
          {{$user->lastname}}
        </td>
        <td>
          {{$user->username}}
        </td>
        <td style="text-align: right">
          <a href="{{route('admin::users.show', ['id' => $user->id])}}" class="btn btn-success">Voir/Modifier</a>
        </td>
      </tr>
      @endforeach
    </tbody>