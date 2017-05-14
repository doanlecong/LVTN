<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuXuatMoc;
use App\LoaiVai;
use App\Kho;
use App\NhanVien;
use Session;

class PhieuXuatMocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_phieuxuatmoc = PhieuXuatMoc::paginate(10);
        $list_loaivai = LoaiVai::all();
        $list_kho = Kho::all();
        $list_nhanvien = NhanVien::all();
        return view('manageside.kho.manager_kho_phieu_xuat_moc')
            ->withList_phieuxuatmoc($list_phieuxuatmoc)
            ->withList_loaivai($list_loaivai)
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
        return PhieuXuatMoc::count()+1;
    }
    //Lay thong tin cua mot phieu xuat moc cu the
    public function getItemByIdAjax($id){
        return PhieuXuatMoc::findOrFail($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phieuxuatmoc = new PhieuXuatMoc;
        $phieuxuatmoc->loai_vai_id = $request->loai_vai_id;
        $phieuxuatmoc->kho_id = $request->kho_id;
        $phieuxuatmoc->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $phieuxuatmoc->ngay_gio_xuat_kho = $request->ngay_gio_xuat_kho;
        $phieuxuatmoc->tong_so_cay_moc = 0;
        $phieuxuatmoc->tong_so_met = 0;
        
        $phieuxuatmoc->save();

        \Session::flash('success','Thêm Phiếu Xuất Mộc Thành Công');
        return redirect('manage_kho_phieu_xuat_moc');

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
        $phieuxuatmoc = PhieuXuatMoc::findOrFail($id);

        $phieuxuatmoc->loai_vai_id = $request->loai_vai_id;
        $phieuxuatmoc->kho_id = $request->kho_id;
        $phieuxuatmoc->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $phieuxuatmoc->ngay_gio_xuat_kho = $request->ngay_gio_xuat_kho;
        //$phieuxuatmoc->tong_so_cay_moc = 0;
        //$phieuxuatmoc->tong_so_met = 0;
        
        $phieuxuatmoc->save();

        \Session::flash('success','Thêm Phiếu Xuất Mộc Thành Công');
        return redirect('manage_kho_phieu_xuat_moc');
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
