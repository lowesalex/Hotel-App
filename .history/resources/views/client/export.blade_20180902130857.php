Name,Email,Action
          @foreach( $clients as $client )
                {{ $client->title }}. {{ $client->name }} {{ $client->last_name }}</td>
                {{ $client->email }}</td>
                
                  <a class="hollow button" href="{{ route('show_client', ['client_id' => $client->id ]) }}">EDIT</a>
                  <a class="hollow button warning" href="{{ route('check_room', ['client_id' => $client->id ]) }}">BOOK A ROOM</a>
                </td>
              </tr>
          @endforeach

              
                      </tbody>
        </table>