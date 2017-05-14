<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CayVaiMoc;
use App\LoaiVai;
use App\LoaiSoi;
use App\Kho;
use App\NhanVien;
use Session;
class KhoCayMocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_caymoc= CayVaiMoc::paginate(20);
        $list_loaivai = LoaiVai::all();
        $list_loaisoi = LoaiSoi::all();
        $list_kho = Kho::all();
        $list_nhanvien = NhanVien::all();
        return view('manageside.kho.manager_kho_kho_moc')
            ->withList_caymoc($list_caymoc)
            ->withList_loaivai($list_loaivai)
            ->withList_loaisoi($list_loaisoi)
            ->withList_kho($list_kho)
            ->withList_nhanvien($list_nhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return CayVaiMoc::count()+1;
    }
    //lAY THONG TIN CUA MOT CAY VAI MOC CU THE
    public function getItemByIdAjax($id){
        return CayVaiMoc::findOrFail($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caymoc =  new CayVaiMoc;
        $caymoc->loai_vai_id =$request->loai_vai_id;
        $caymoc->loai_soi_id=$request->loai_soi_id;
        $caymoc->so_met=$request->so_met;
        $caymoc->nhan_vien_det_id=$request->nhan_vien_det_id;
        $caymoc->ma_may_det=$request->ma_may_det_id;
        $caymoc->ngay_gio_det=$request->ngay_gio_det;
        $caymoc->kho_id=$request->kho_id;
        $caymoc->ngay_gio_nhap_kho=$request->ngay_gio_nhap_kho;
        $caymoc->tinh_trang = 'Chưa Xuất';
        $caymoc->save();
        
        \Session::flash('success','Thêm Cây Mộc Thành Công');
        return redirect('manage_kho_kho_cay_moc');
        
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
        $caymoc =  CayVaiMoc::findOrFail($id);
        $caymoc->loai_vai_id =$request->loai_vai_id;
        $caymoc->loai_soi_id=$request->loai_soi_id;
        $caymoc->so_met=$request->so_met;
        $caymoc->nhan_vien_det_id=$request->nhan_vien_det_id;
        $caymoc->ma_may_det=$request->ma_may_det_id;
        $caymoc->ngay_gio_det=$request->ngay_gio_det;
        $caymoc->kho_id=$request->kho_id;
        $caymoc->ngay_gio_nhap_kho=$request->ngay_gio_nhap_kho;
        
        $caymoc->save();
        
        \Session::flash('success','Cập Nhật Cây Mộc Thành Công');
        return redirect('manage_kho_kho_cay_moc');
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
