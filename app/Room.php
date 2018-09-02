<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    //
    public function getAvailablerooms($start_date, $end_date)
    {
        $available_rooms = DB::table('rooms as r')
                                    ->select('r.id', 'r.name')
                                    ->whereRaw("
                                    r.id NOT IN(
                                        SELECT b.room_id FROM reservations b
                                        WHERE NOT(
                                            b.date_out < '{$start_date}' OR
                                            b.date_in > '{$end_date}'
                                        )
                                    )
                                    ")
                                    ->orderBy('r.id')
                                    ->get()
        ;
        return $available_rooms;
    }

    public function isRoomBooked( $room_id, $start_date, $end_date )
    {

        $available_rooms = DB::table('reservations')
                        ->whereRaw("
                            NOT(
                                date_out < '{$start_date}' OR
                                date_in > '{$end_date}'
                                )
                        ")
                        ->where('room_id', $room_id)
                        ->count()
        ;
        return $available_rooms;

    }

}
