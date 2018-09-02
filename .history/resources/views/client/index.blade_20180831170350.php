@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Clients</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('new_client') }}">ADD NEW CLIENT</a></div>

        
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
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

        
      </div>
    </div>
@endsection