<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHangCongTy;
use App\LoaiSoi;
use App\NhaCungCap;

use Session;
class DonHangCongTyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $danh_sach_don_hang = DonHangCongTy::paginate(15);
        $danh_sach_loai_soi = LoaiSoi::all();
        $danh_sach_nha_cung_cap = NhaCungCap::all();
        return view('manageside.kho.manager_kho_don_hang_cong_ty')
            ->withDanh_sach_don_hang($danh_sach_don_hang)
            ->withDanh_sach_loai_soi($danh_sach_loai_soi)
            ->withDanh_sach_nha_cung_cap($danh_sach_nha_cung_cap);
    }
    public function getItemByIdAjax($id){
        return DonHangCongTy::findOrFail($id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return DonHangCongTy::count()+1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donhangcongty = new DonHangCongTy;
        $donhangcongty->nha_cung_cap_id = $request->nha_cung_cap_id;
        $donhangcongty->loai_soi_id= $request->loai_soi_id;
        $donhangcongty->khoi_luong= $request->khoi_luong;
        $donhangcongty->han_chot= $request->han_chot;
        $donhangcongty->ngay_gio_dat_hang = $request->ngay_gio_dat_hang;

        $donhangcongty->save();

        \Session::flash('success','Thêm Đơn Hàng Thành Công');
        return redirect('/manage_kho_don_hang_cong_ty');
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
        $donhangcongty = DonHangCongTy::findOrFail($id);
        $donhangcongty->nha_cung_cap_id = $request->nha_cung_cap_id;
        $donhangcongty->loai_soi_id= $request->loai_soi_id;
        $donhangcongty->khoi_luong= $request->khoi_luong;
        $donhangcongty->han_chot= $request->han_chot;
        $donhangcongty->ngay_gio_dat_hang = $request->ngay_gio_dat_hang;

        $donhangcongty->save();

        \Session::flash('success','Cập Nhật Đơn Hàng Thành Công');
        return redirect('/manage_kho_don_hang_cong_ty');
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
