<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Room;

class RoomsController extends Controller
{
    //
    public function checkAvailableRooms($client_id, Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $client = new Client();
        $room = new Room();

        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo'] = $dateTo;
        $data['rooms']= $room->getAvailableRooms($dateFrom, $dateTo);
        $data['client'] = $client->find($client_id);

        return view('rooms/checkAvailableRooms', $data);
    }
}
