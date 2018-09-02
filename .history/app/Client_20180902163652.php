<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    //
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function 
}
