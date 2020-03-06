<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table = "PhuongXa";
    protected $fillable = ['ID','QuanHuyenID','MaPhuongXa','TenPhuongXa'];

    public function district(){
    	return $this->belongsTo('App\QuanHuyen');
    }
}
