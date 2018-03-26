<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanhnoibat extends Model
{
    protected $table = "hinhanhnoibat";

    public function user() {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
