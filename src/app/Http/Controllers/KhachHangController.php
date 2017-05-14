<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_khachhang= KhachHang::all();
        return view('manageside.banhang.khachhang')->withList_khachhang($list_khachhang);
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
        return KhachHang::findOrFail($id);
    }

    public function getKhachHangSelectListAjax() {
        $KhachHangSelectList = KhachHang::pluck('ten', 'id');
        return compact('id', 'KhachHangSelectList');
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
            'ten'=>'required|max:191',
            'ten_dang_nhap'=> 'max:50',
        ));
        $khachhang = new KhachHang;
        $inputs = $request->all();
        $khachhang->fill($inputs);
        $khachhang->save();

        \Session::flash('success', 'Khách hàng '.$request->input('ten').' đã được thêm thành công!');
        return redirect('/manage_ban_hang_khach_hang');
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
        //Cập nhật khách hàng
        $this->validate($request ,array(
            'ten'=>'required|max:191',
            'ten_dang_nhap'=> 'max:50',
        ));
        $khachhang = KhachHang::findOrFail($id);
        $inputs = $request->all();
        $khachhang->fill($inputs);
        $khachhang->save();

        \Session::flash('success', 'Khách hàng '.$request->input('ten').' đã được cập nhật thành công!');
        return redirect('/manage_ban_hang_khach_hang');
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
