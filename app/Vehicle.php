<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //Table Name
    Protected $table = 'vehicles';
    //Primary Key
    Public $primaryKey = 'id';

    public function owner_vehicle(){
        return $this->belongsTo('App\Owner');
    }
}
