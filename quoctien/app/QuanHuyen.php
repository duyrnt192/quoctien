<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = "QuanHuyen";
    protected $fillable = ['ID','TinhThanhID','MaQuanHuyen','TenQuanHuyen'];

    public function wards(){
        return $this->hasMany('App\PhuongXa','QuanHuyenID','ID');
    }

    public function city(){
    	return $this->belongsTo('App\TinhThanh');
    }
}
