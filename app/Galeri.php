<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    public function albums(){
        return $this->belongsTo('App\Album', 'id_album', 'id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
