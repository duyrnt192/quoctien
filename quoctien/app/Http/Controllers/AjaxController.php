<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XeSuaChua;
use App\KhachHang;
use App\QuanHuyen;
use App\PhuongXa;
use App\NhanVien;


class AjaxController extends Controller
{
    public function getCustomerAddress($customerID)
    {
    	$custormer = KhachHang::where('ID',$customerID)->first();
    	echo "<textarea name='DiaChi'  rows='5'   class='form-control form-control-line'>".$custormer->DiaChi."</textarea>";
    }

    public function getDistrict($city)
    {
        $districts = QuanHuyen::where('TinhThanhID',$city)->get();
        foreach ($districts as $district) 
        {
           echo  "<option  value='".$district->MaQuanHuyen."'>".$district->TenQuanHuyen."</option>"."\n";
        }
    }

    public function getWard($district)
    {
        $wards = PhuongXa::where('QuanHuyenID',$district)->get();
        foreach ($wards as $ward) 
        {
           echo  "<option  value='".$ward->MaPhuongXa."'>".$ward->TenPhuongXa."</option>"."\n";
        }
    }

    public function getUserEmail($email)
    {
        $user = NhanVien::select('ID')->where('Email',$email)->first();
        echo  "<input  type='hidden' name='user_id' value='$user->ID'>";
    }
}
