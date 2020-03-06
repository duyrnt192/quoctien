<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVBanLe extends Model
{
    protected $table = "DVBanLe";
    protected $fillable = ['KhachHangID','XeSuaChuaID','NgayMua','Km','YeuCauKhachHang','TuVanSuaChua','CreatedBy','UpdatedBy'];
    public $timestamps = false;

    public function repair(){
    	return $this->belongsTo('App\XeSuaChua');
    }

    public function customer(){
    	return $this->belongsTo('App\KhacHang');
    }
}
