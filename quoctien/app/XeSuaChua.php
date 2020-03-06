<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XeSuaChua extends Model
{
    protected $table = "XeSuaChua";
    protected $fillable = ['ID','BienSo','SoKhung','SoMay','NgayMua','XeID','SoSoBaoHanh','Model2','CreatedBy','UpdatedBy'];
    public $timestamps = false;
    
    public function retailServices(){
        return $this->hasMany('App\DVBanLe','XeSuaChuaID','ID');
    }
}
