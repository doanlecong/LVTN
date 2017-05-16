<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use App\ThanhToan;
use Session;
class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listkhachhang = KhachHang::all();
        return view('manageside.banhang.thanhtoan')->withListkhachhang($listkhachhang);
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
    // Lay tat ca don hang lien quan den khach hang  //

    public function getListDonHangLienQuan($id){
        $listdonhang = KhachHang::findOrFail($id)->don_hang_khach_hangs;
        foreach($listdonhang as $donhang){
            $loaivai= $donhang->loai_vai;
            $donhang->mau;
        }
        return $listdonhang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thanhtoanrecord = new ThanhToan;
        $thanhtoanrecord->khach_hang_id = $request->khachhang;
        $thanhtoanrecord->so_tien = $request->sotien;
        $thanhtoanrecord->ngay_gio= (new \DateTime())->format('Y-m-d H:i:s');
        $thanhtoanrecord->save();

        \Session::flash('success','Thêm Thanh Công Thông Tin Thanh Toán');
        return redirect('/manage_ban_hang_thanh_toan');
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
}
