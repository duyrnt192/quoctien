<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;
use App\KhachHangNhom;
use App\CuaHang;
use App\NhanVien;
use App\TinhThanh;
use Auth,DB,Carbon;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reception = DB::table('receptions')->where('id',Auth::guard('reception')->id())->first();
        $user = NhanVien::select('ID','CuaHangID')->where('ID',$reception->user_id)->first();
        $storeQT = CuaHang::select('ID','MaCuaHang')->where('ID',$user ->CuaHangID)->first();
        $subID = KhachHang::select('ID')->max('ID');
        $date = Carbon::now()->isoFormat('YYDD');
        $customerCode = $storeQT->MaCuaHang."-".$date."-".$subID;
        $custormerGroups =KhachHangNhom::select('ID','MaKhachHangNhom')->get();
        $cities =TinhThanh::select('ID','TenTinhThanh')->get();
        return view ('customers.create',compact('custormerGroups','cities','customerCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data );
        $customer = KhachHang::create( $data );
        return back()->with(['flash_message'=>'Khách hàng được thêm mới thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show(KhachHang $khachHang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit(KhachHang $khachHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KhachHang $khachHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhachHang $khachHang)
    {
        //
    }

    public function getCustomerCode(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $customers = KhachHang::orderby('MaKhachHang','asc')->select('ID','MaKhachHang')->limit(5)->get();
        }else{
            $customers = KhachHang::orderby('MaKhachHang','asc')->select('ID','MaKhachHang','TenKhachHang','DienThoai1','DiaChi')->where('MaKhachHang', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
            foreach($customers as $customer){
             $response[] = array("value"=>$customer->ID,"label"=>$customer->MaKhachHang,"TenKhachHang"=>$customer->TenKhachHang,"DienThoai1"=>$customer->DienThoai1,"DiaChi"=>$customer->DiaChi);
        }
        echo json_encode($response);
        exit;
    }
}
