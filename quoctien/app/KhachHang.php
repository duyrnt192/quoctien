<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = "KhachHang";
    protected $fillable = ['ID','TenKhachHang','MaKhachHang','KhachHangNhomID','Email','DienThoai1','DiaChi','DienThoai2','NgaySinh','GioiTinh','SoCMND','NgayCap','NoiCap','NgheNgiepID','HK_TinhThanhID','HK_QuanHuyenID','HK_PhuongXaID','CreatedBy','UpdatedBy'];
    public $timestamps = false;

  
    public function retailServices(){
        return $this->hasMany('App\DVBanLe','KhachHangID','ID');
    }

    public function customerGroup(){
    	return $this->belongsTo('App\KhachHangNhom');
    }
}
