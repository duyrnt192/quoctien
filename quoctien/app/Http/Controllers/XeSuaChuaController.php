<?php

namespace App\Http\Controllers;

use App\XeSuaChua;
use App\Xe;
use App\NhanVien;
use Illuminate\Http\Request;
use DB,Auth;


class XeSuaChuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('repairs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('repairs.create');
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
        $carRepepair = XeSuaChua::create( $data );
        return back()->with(['flash_message'=>'Thêm sửa chữa thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\XeSuaChua  $xeSuaChua
     * @return \Illuminate\Http\Response
     */
    public function show(XeSuaChua $xeSuaChua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\XeSuaChua  $xeSuaChua
     * @return \Illuminate\Http\Response
     */
    public function edit(XeSuaChua $xeSuaChua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\XeSuaChua  $xeSuaChua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, XeSuaChua $xeSuaChua)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\XeSuaChua  $xeSuaChua
     * @return \Illuminate\Http\Response
     */
    public function destroy(XeSuaChua $xeSuaChua)
    {
        //
    }


    public function getModelType(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $modelCars = Xe::orderby('Model2','asc')->distinct()->select('ID','Model2')->limit(5)->get();
        }else{
            $modelCars = Xe::orderby('Model2','asc')->select('ID','Model2')->where('Model2', 'like', '%' .$search . '%')->limit(3)->get();
        }

        $response = array();
            foreach($modelCars as $modelCar){
             $response[] = array("value"=>$modelCar->ID,"label"=>$modelCar->Model2);
        }
        echo json_encode($response);
        exit;
    }
}
