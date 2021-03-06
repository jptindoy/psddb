<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    //Table Name
    Protected $table = 'stickers';
    //Primary Key
    Public $primaryKey = 'id';

    public function owner_sticker(){
        return $this->belongsTo('App\Owner');
    }
    
}
