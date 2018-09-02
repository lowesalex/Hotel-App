@if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        @if(count($errors)>0)

            <ul>
                @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
<table class="stack">
          <thead>
            <tr>
        <th width="200">Name</th><th width="200">Email</th><th width="200">Action</th>
            </tr>
          </thead>
          <tbody>

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