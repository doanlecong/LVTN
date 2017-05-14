<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSoi;
use Session;
class LoaiSoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_sach_loai_soi = LoaiSoi::all();
        return view('manageside.kho.manager_kho_loai_soi')->withDanh_sach_loai_soi($danh_sach_loai_soi);
        //echo dd($danh_sach_loai_soi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idmax=LoaiSoi::count();
        return $idmax+1;
    }
    // get Item By Id Ajax 
    public function getItemByIdAjax($id){
        //echo dd(LoaiSoi::findOrFail($id));  
        return LoaiSoi::findOrFail($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $maloaisoi = $request->input('ma_loai_soi');
        $this->validate($request ,array(
            'ten_loai_soi'=>'required|max:255|unique:loai_soi,ten',
            'thong_tin_ky_thuat'=> 'required|min:20|max:2000',
        ));
        $loaisoi = new LoaiSoi;
        $loaisoi->ten = $request->input('ten_loai_soi');
        $loaisoi->thong_tin_ky_thuat = $request->input('thong_tin_ky_thuat');
        $loaisoi->kho_id = $request->input('kho_soi');
        $loaisoi->khoi_luong_ton= 0;
        $loaisoi->so_thung_ton=0;

        $loaisoi->save();
        \Session::flash('success','Loại Sợi Đã Được Thêm Thành Công!');
        return redirect('/manage_kho_loai_soi');
        
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
        $maloaisoi = $request->input('ma_loai_soi');
        $this->validate($request ,array(
            'ten_loai_soi'=>'required|max:255|unique:loai_soi,ten',
            'thong_tin_ky_thuat'=> 'required|min:20|max:2000',
        ));
        $loaisoi = LoaiSoi::findOrFail($id);
        $loaisoi->ten = $request->input('ten_loai_soi');
        $loaisoi->thong_tin_ky_thuat = $request->input('thong_tin_ky_thuat');
        $loaisoi->kho_id = $request->input('kho_soi');
        // $loaisoi->khoi_luong_ton= 0;
        // $loaisoi->so_thung_ton=0;

        $loaisoi->save();
        \Session::flash('success','Loại Sợi Đã Được Cập Nhật Thành Công!');
        return redirect('/manage_kho_loai_soi');
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
}
