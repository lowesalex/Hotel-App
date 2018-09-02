@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Clients/Booking</h4>
        <div class="medium-2  columns">BOOKING FOR:</div>
        <div class="medium-2  columns"><b>
        {{$client->title}} 
        {{$client->name}} 
        {{$client->last_name}}
        </b></div>
        <form action="" method="post">
        {{ csrf_field() }}
          <div class="medium-1  columns">FROM:</div>
          <div class="medium-2  columns"><input name="dateFrom" value="{{ $dateFrom }}" type="text" class="datepicker" /></div>
          <div class="medium-1  columns">TO:</div>
          <div class="medium-2  columns"><input name="dateTo" value="{{ $dateTo }}" type="text" class="datepicker" /></div>
          <div class="medium-2  columns"><input class="button" type="submit" value="SEARCH" /></div>
        </form>

        <table class="stack">
          <thead>
            <tr>
              <th width="200">Room</th>
              <th width="200">Availability</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>
          @unless( empty( $dateFrom ) || empty( $dateTo ) )
          @foreach( $rooms as $room )
                      <tr>
              <td>{{$room->name}}</td>
              <td>
                <div class="callout success">
                    <h7>Available</h7>
                </div>
              </td>
              <td>
                <a class="hollow button warning" 
                  href="{{
                    route('book_room',
                      ['client_id' => $client->id,
                        'room_id' => $room->id,
                        'date_in' => $dateFrom,
                        'date_out' => $dateTo
                      ]
                    )
                  }}">BOOK NOW</a>
              </td>
            </tr>
            @endforeach
            @endunless
                    </tbody>
        </table>
      </div>
    </div>
@endsection