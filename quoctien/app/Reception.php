<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reception extends Authenticatable
{
	use Notifiable;
    protected $fillable = ['email','password','user_id'];

    public function user(){
    	return $this->belongsTo('App\NhanVien','user_id');
    }
}
