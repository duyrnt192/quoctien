<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\DVBanLe;
use App\XeSuaChua;
use App\KhachHang;
use  App\NhanVien;
use  Auth,DB;
use Cache;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$key = md5(vsprintf('%s.%s.%s', [
            'ServiceController',
            'index',
            $request->get('page', 1),
        ]));
        $carRepepairs = Cache::remember($key, 180, function () {
            return XeSuaChua::select('ID','BienSo')->paginate();
        });*/
        return view ('services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view ('services.create');
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
        dd($data);
        $service = DVBanLe::create($data);
        return back()->with(['flash_message'=>'Phiếu tiếp nhận được thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPlateNumber(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $services = XeSuaChua::orderby('BienSo','asc')->select('ID','BienSo')->limit(5)->get();
        }else{
            $services = XeSuaChua::orderby('BienSo','asc')->select('ID','BienSo','SoKhung','SoMay')->where('BienSo', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
            foreach($services as $service){
             $response[] = array("value"=>$service->ID,"label"=>$service->BienSo,"SoKhung"=>$service->SoKhung,"SoMay"=>$service->SoMay);
        }
        echo json_encode($response);
        exit;
    }
}
