<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHangNhom extends Model
{
    protected $table = "KhachHangNhom";
    protected $fillable = ['ID','MaKhachHangNhom','TenKhachHangNhom'];

    public function custormers(){
        return $this->hasMany('App\KhachHang','KhachHangNhomID','ID');
    }
}
