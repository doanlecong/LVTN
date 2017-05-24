<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\KhachHang;
use Session;
class LoginKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Session::has('khachhang_id')||\Session::has('khachhang_ip')){
            \Session::flush();
        }
        return view('khachhangUI.login');
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
    // Logout User ra khoi he thong 
    public function getLogout(){
        if(\Session::has('khachhang_id')||\Session::has('khachhang_ip')){
            \Session::flush();
        }
        return redirect('khachhangUI');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khachhang = KhachHang::where('ten_dang_nhap',$request->tendangnhap)->first();
        if($khachhang!=NULL){
            if(Hash::check($request->matkhau,$khachhang->mat_khau)){
                Session::put('khachhang_id',$khachhang->id);
                Session::put('khachhang_ip',$request->ip());
                return redirect('khachhangUI');
            }else{
                \Session::flash('fail','Thông tin đâng nhập không chính xác');
                return redirect('loginKhachHang');  
            }
        }else{
            \Session::flash('fail','Thông tin đăng nhập không chính xác');
            return redirect('loginKhachHang');
        }
        
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
