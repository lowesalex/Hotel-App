Name,Email</th><th width="200">Action</th>
          @foreach( $clients as $client )
              <tr>
                <td>{{ $client->title }}. {{ $client->name }} {{ $client->last_name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                  <a class="hollow button" href="{{ route('show_client', ['client_id' => $client->id ]) }}">EDIT</a>
                  <a class="hollow button warning" href="{{ route('check_room', ['client_id' => $client->id ]) }}">BOOK A ROOM</a>
                </td>
              </tr>
          @endforeach

              
                      </tbody>
        </table>