<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";

    public function user() {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }

    public function khoahoc_luyenthi() {
    	return $this->belongsTo('App\khoahoc_luyenthi', 'idKhoaHoc_LuyenThi', 'id');
    }
}
