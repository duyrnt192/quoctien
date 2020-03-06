<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuaHang extends Model
{
    protected $table = "CuaHang";
    protected $fillable = ['ID','MaCuaHang','Code','TenCuaHang','DiaChi','DienThoai'];

    public function users(){
        return $this->hasMany('App\NhanVien');
    }
}
