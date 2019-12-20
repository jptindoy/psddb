<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //Table Name
    Protected $table = 'owners';
    //Primary Key
    Public $primaryKey = 'id';

    public function sticker(){
        return $this->hasMany('App\Sticker');
    }

    public function vehicle(){
        return $this->hasMany('App\Vehicle');
    }
}
