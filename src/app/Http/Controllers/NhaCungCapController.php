<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;
use Session;
class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_sach_nha_cung_cap = NhaCungCap::all();
        return view('manageside.kho.manager_kho_nha_cung_cap')->withDanh_sach_nha_cung_cap($danh_sach_nha_cung_cap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idmax= NhaCungCap::count();
        return $idmax+1;
    }
    public function getItemByIdAjax($id){
        return NhaCungCap::findOrFail($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, array(
        //     'ten_nha_cung_cap' =>'required|max:255|unique:nha_cung_cap,ten',
        //     'dia_chi' => 'required|min:20|max:2000',
        //     'email'=> 'required|email|unique:nha_cung_cap,email',
        //     'so_dien_thoai'=>'required|min:8|max:11|unique:nha_cung_cap,so_dien_thoai',
        //     'fax'=> 'min:8|max:11|unique:nha_cung_cap,fax',
        // ));
        $nhacungcap = new NhaCungCap;
        $nhacungcap->ten= $request->ten_nha_cung_cap;
        $nhacungcap->dia_chi= $request->dia_chi;
        $nhacungcap->email = $request->email;
        $nhacungcap->so_dien_thoai = $request->so_dien_thoai;
        $nhacungcap->fax = $request->fax;

        $nhacungcap->save();
        echo "SAVED";
        \Session::flash('success','Thêm Nhà Cung Cấp Thành Công');
        return redirect('/manage_kho_nha_cung_cap');
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
        // $this->validate($request, array(
        //     'ten_nha_cung_cap' =>'required|max:255|unique:nha_cung_cap,ten',
        //     'dia_chi' => 'required|min:20|max:2000',
        //     'email'=> 'required|email|unique:nha_cung_cap,email',
        //     'so_dien_thoai'=>'required|min:8|max:11|unique:nha_cung_cap,so_dien_thoai',
        //     'fax'=> 'min:8|max:11|unique:nha_cung_cap,fax',
        // ));
        $nhacungcap = NhaCungCap::findOrFail($id);
        $nhacungcap->ten= $request->ten_nha_cung_cap;
        $nhacungcap->dia_chi= $request->dia_chi;
        $nhacungcap->email = $request->email;
        $nhacungcap->so_dien_thoai = $request->so_dien_thoai;
        $nhacungcap->fax = $request->fax;

        $nhacungcap->save();
        echo "SAVED";
        \Session::flash('success','Cập Nhật Nhà Cung Cấp Thành Công');
        return redirect('/manage_kho_nha_cung_cap');
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
