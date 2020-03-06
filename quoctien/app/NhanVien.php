<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
	use Notifiable;
    protected $table = "NhanVien";
    protected $fillable = ['HoTen','DienThoai','DiaChi','SoMayLe','Email','PW','CuaHangID','ChucVuID','IsActive','IsEditLock','ChuKy','Anh','IDQT'];

    public function reception()
    {
    	return $this->hasOne('App\Reception','user_id');
    }

    public function storeQT(){
    	return $this->belongsTo('App\CuaHang','CuaHangID');
    }
}
