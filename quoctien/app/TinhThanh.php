<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model
{
    protected $table = "TinhThanh";
    protected $fillable = ['ID','MaTinhThanh','TenTinhThanh'];

    public function districts(){
        return $this->hasMany('App\QuanHuyen','TinhThanhID','ID');
    }

}
