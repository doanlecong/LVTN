<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\KhachHang;
use App\DonHangKhachHang;
use App\HoaDonXuat;
class KhachHangUIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(\Session::has('khachhang_id') && \Session::has('khachhang_ip')){
            $khachhang = KhachHang::findOrFail(\Session::get('khachhang_id'));
            $donhangs = $khachhang->don_hang_khach_hangs;
            $thanhtoan = $khachhang->thanh_toan;
            foreach($donhangs as $donhang){
                $donhang->mau;
                $donhang->loai_vai;
                $hoadonxuats = $donhang->hoa_don_xuats;
                foreach($hoadonxuats as $hoadon){
                    $hoadon->cay_vai_thanh_phams;
                }
            }
            return view('khachhangUI.LoggedKhachHang')->withKhachhang($khachhang);
        }else {
            return view('khachhangUI.khachhangHomepage');
        }
            
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
    public function changeCustomerInfo(){
        $khachhang = $khachhang = KhachHang::findOrFail(\Session::get('khachhang_id'));
        return view('khachhangUI.changeCustomerInfo')->withKhachhang($khachhang);
    }


    public function changeCustomUserOrPass(Request $request){
         $oldusername =  $request->tendangnhapcu;
         $khachhang = KhachHang::findOrFail(\Session::get('khachhang_id'));
         // return $oldusername . ' - ' . $khachhang->ten_dang_nhap;
         if($oldusername == $khachhang->ten_dang_nhap){
            if($request->has('tendangnhapmoi')){
                $khachhang->ten_dang_nhap = $request->tendangnhapmoi;
            }
            if($request->has("matkhaumoi")){
                $khachhang->mat_khau = Hash::make($request->matkhaumoi);
            }
            if(!$request->has('tendangnhapmoi') && !$request->has('matkhaumoi')){
                \Session::flash('fail','Không Thay Đổi Được Thông Tin');
                return redirect('changeCustomerInfo');
            }
            $khachhang->save();
            \Session::flash('success','Thay Đổi Thông Tin Đăng Nhập Thành Công');
            return redirect('khachhangUI');
            
         }else {
             \Session::flash('fail','Không Thay Đổi Được Thông Tin');
             return redirect('changeCustomerInfo');
         }
    }


    public function changeCustomInfoDetail(Request $request){
        \Session::flash('warning','Chức năng Chưa Được Cập Nhật');
        return redirect('khachhangUI');
    }


    public function getKhAnDH($id){
        $khachhang = KhachHang::findOrFail($id);
        $donhangs = $khachhang->don_hang_khach_hangs;
        $thanhtoan = $khachhang->thanh_toan;
        foreach($donhangs as $donhang){
            $donhang->mau;
            $donhang->loai_vai;
            $hoadonxuats = $donhang->hoa_don_xuats;
            foreach($hoadonxuats as $hoadon){
                $hoadon->cay_vai_thanh_phams;
            }
        }
        return $khachhang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
