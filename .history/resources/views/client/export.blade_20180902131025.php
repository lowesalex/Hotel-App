Name,Email,Action
          @foreach( $clients as $client )
        {{ $client->title }}.{{ $client->name }},{{ $client->last_name }},{{ $client->email }}
          @endforeach