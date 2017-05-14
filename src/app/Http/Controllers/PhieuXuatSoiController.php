<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuXuatSoi;
use App\LoaiSoi;
use App\Kho;
use App\NhanVien;
class PhieuXuatSoiController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_sach_phieu_xuat_soi = PhieuXuatSoi::all();
        $list_loaisoi = LoaiSoi::where('khoi_luong_ton','>',0)->get();
        $list_kho = Kho::all();
        $list_nhan_vien = NhanVien::all();
        //echo dd($list_loaisoi);
        return view('manageside.kho.manager_kho_phieu_xuat_soi')
            ->withDanh_sach_phieu_xuat_soi($danh_sach_phieu_xuat_soi)
            ->withList_loaisoi($list_loaisoi)
            ->withList_kho($list_kho)
            ->withList_nhan_vien($list_nhan_vien);
    }
    //Lay thong tin du lieu ve mot Loai Soi cu the
    public function getItemByIdAjax($id){
        return PhieuXuatSoi::with('loai_soi')->findOrFail($id);
    }

    //lay thong tin trong list lua chon cua loai soi 
     public function getLoaiSoiBySelectAjax($id){
         return  LoaiSoi::findOrFail($id);
         
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return PhieuXuatSoi::count()+1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phieuxuatsoi = new PhieuXuatSoi;
        $loaisoi = LoaiSoi::findOrFail($request->loai_soi_id);

        $phieuxuatsoi->loai_soi_id = $request->loai_soi_id;
        $phieuxuatsoi->so_thung = $request->so_thung_xuat;
        $phieuxuatsoi->khoi_luong_thung = $request->khoi_luong_thung;
        $phieuxuatsoi->tong_khoi_luong_xuat= $request->tong_khoi_luong_xuat;
        $phieuxuatsoi->kho_id = $request->kho_id;
        $phieuxuatsoi->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $phieuxuatsoi->ngay_gio_xuat_kho = $request->ngay_gio_xuat_kho;

        $phieuxuatsoi->save();
        // Cap nhat lai thong tin trang thai cua loai soi dang duoc xuat !

        $loaisoi->so_thung_ton -= $request->so_thung_xuat;
        $loaisoi->khoi_luong_ton = $loaisoi->khoi_luong_ton -($request->so_thung_xuat * $request->khoi_luong_thung);
        $loaisoi->save();


        \Session::flash('success','Thêm Phiếu Xuất Sợi Thành Công và Cập Nhật Tình trạng Loại Sợi ');
        return redirect('manage_kho_phieu_xuat_soi');
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
        $phieuxuatsoi = PhieuXuatSoi::findOrFail($id);
        $sothung = $phieuxuatsoi->so_thung;
        $khoiluongthung = $phieuxuatsoi->khoi_luong_thung;

        $loaisoi = LoaiSoi::findOrFail($request->loai_soi_id);
        
        $phieuxuatsoi->loai_soi_id = $request->loai_soi_id;
        $phieuxuatsoi->so_thung = $request->so_thung_xuat;
        $phieuxuatsoi->khoi_luong_thung = $request->khoi_luong_thung;
        $phieuxuatsoi->tong_khoi_luong_xuat= $request->tong_khoi_luong_xuat;
        $phieuxuatsoi->kho_id = $request->kho_id;
        $phieuxuatsoi->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $phieuxuatsoi->ngay_gio_xuat_kho = $request->ngay_gio_xuat_kho;

        $phieuxuatsoi->save();
        // Cap nhat lai thong tin trang thai cua loai soi dang duoc xuat !

        $kq_sothung= $loaisoi->so_thung_ton -$request->so_thung_xuat+$sothung;
        //echo $kq_sothung;
        if($kq_sothung<0) $loaisoi->so_thung_ton = 0;
        else $loaisoi->so_thung_ton = $kq_sothung;

        $kq_khoiluongton = $loaisoi->khoi_luong_ton -($request->so_thung_xuat * $request->khoi_luong_thung)+$khoiluongthung*$sothung;
        if($kq_khoiluongton < 0) $loaisoi->khoi_luong_ton = 0;
        else $loaisoi->khoi_luong_ton= $kq_khoiluongton;
        
        $loaisoi->save();


        \Session::flash('success','Thêm Phiếu Xuất Sợi Thành Công và Cập Nhật Tình trạng Loại Sợi ');
        return redirect('manage_kho_phieu_xuat_soi');
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
