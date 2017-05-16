<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHangKhachHang;
use App\KhachHang;
use App\LoaiVai;
use App\Mau;

class DonHangKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dhkhs = DonHangKhachHang::all();
        foreach ($dhkhs as $dh) {
            $tong_so_met = 0;
            foreach ($dh->hoa_don_xuats as $hdx) {
                foreach ($hdx->cay_vai_thanh_phams as $cvtp) {
                    $tong_so_met += $cvtp->so_met;
                }
            }
            $dh->so_met_da_giao = $tong_so_met;
            $dh->so_met_con_lai = max(0, $dh->tong_so_met - $tong_so_met);
        }

        $khachHangs = KhachHang::pluck('ten', 'id');
        $loaiVais = LoaiVai::pluck('ten', 'id');
        $maus = Mau::pluck('ten', 'id');
        return view('manageside.banhang.donhangkhachhang')->withDhkhs($dhkhs)
        ->with(compact('id', 'khachHangs'))
        ->with(compact('id', 'loaiVais'))
        ->with(compact('id', 'maus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createItemAjax() {
        return '';
    }

    public function getItemByIdAjax($id) {
        return DonHangKhachHang::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tạo khách hàng
        $this->validate($request, array(
        ));
        $donhang = new DonHangKhachHang;
        $inputs = $request->all();
        $donhang->fill($inputs);
        $donhang->save();

        \Session::flash('success', 'Đơn hàng khách hàng đã được thêm thành công!');
        return redirect('/manage_ban_hang_don_hang');
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
        //Cập nhật đơn hàng khách hàng
        $this->validate($request ,array(
        ));
        $donhang = DonHangKhachHang::findOrFail($id);
        $inputs = $request->all();
        $donhang->fill($inputs);
        $donhang->save();
        \Session::flash('success', 'Đơn hàng khách hàng đã được cập nhật thành công!');
        return redirect('/manage_ban_hang_don_hang');
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
