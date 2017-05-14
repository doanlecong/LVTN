<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDonNhap;
use App\DonHangCongTy;
use App\Kho;
use App\NhanVien;
use App\LoaiSoi;
use App\PhieuXuatSoi;
class HoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_sach_hoa_don_nhap = HoaDonNhap::all();
        $list_donhang = DonHangCongTy::where('tinh_trang','='," Chưa Hoàn Thành")->orWhere('tinh_trang','=','Mới')->get();//,['tinhtrang'=>'Chưa Hoàn Thành','tinh_trang'=>'Mới'] / WHERE tinh_trang = :tinhtrang OR tinh_trang = :tinh_trang
        $list_hoa_don_chua_hoan_thanh = DonHangCongTy::with('hoa_don_nhaps')->where('tinh_trang','='," Chưa Hoàn Thành")->orWhere('tinh_trang','=','Mới')->get();
        $list_hoa_don_hoan_thanh = DonHangCongTy::with('hoa_don_nhaps')->where('tinh_trang','=',"Hoàn Thành")->get();
        //echo dd($list_hoa_don_hoan_thanh);
        $list_kho = Kho::all();
        $list_nhanvien = NhanVien::all();
        //echo dd($list_donhang->toJson());
        return view('manageside.kho.manager_kho_hoa_don_nhap')
                ->withDanh_sach_hoa_don_nhap($danh_sach_hoa_don_nhap)
                ->withList_donhang($list_donhang)
                ->withList_hoa_don_chua_hoan_thanh($list_hoa_don_chua_hoan_thanh)
                ->withList_hoa_don_hoan_thanh($list_hoa_don_hoan_thanh)
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
        return HoaDonNhap::count()+1;
    }
    //Get Item By Id Ajax dung cho viec lay data 
    public function getItemByIdAjax($id){
        return HoaDonNhap::findOrFail($id);
    }
    //Lay Thong tin cua don hang voi truong du lieu quan la loai vai va nha cung cap 
    // Cach hien thuc khac la trong select list , ban dau hien thi tat ca cac thong ra 
    // Roi lay tu day ,roi cho vao hai truong nha  cung cap voi loai soi === JavaScript !!!
    public function getDonHangBySelectAjax($id){
        // $donhang = DonHangCongTy::findOrFail($id);
        // $loaisoi= $donhang->loai_soi;
        // $nhacungcap= $donhang->nha_cung_cap;
        // return $don_hang->with('loai_soi','nha_cung_cap');
        $don_hang= DonHangCongTy::with('loai_soi','nha_cung_cap')->findOrFail($id);
        return $don_hang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Update Tinh trang trong bang DonHangCongTy ::chua lam !!!
     */
    public function store(Request $request)
    {
        $hoa_don_nhap = new HoaDonNhap;
        $donhanghientai = DonHangCongTy::findOrFail($request->don_hang_cong_ty_id);
        $loai_soi_thuoc_don_hang = $donhanghientai->loai_soi;
        
        $hoa_don_nhap->don_hang_cong_ty_id = $request->don_hang_cong_ty_id;
        $nhacungcapId = $donhanghientai->nha_cung_cap->id;
        // echo $nhacungcapId;
        $hoa_don_nhap->nha_cung_cap_id = $nhacungcapId;
        $hoa_don_nhap->so_thung=$request->so_thung;
        $hoa_don_nhap->khoi_luong_thung = $request->khoi_luong_thung;
        $hoa_don_nhap->don_gia = $request->don_gia;
        $hoa_don_nhap->kho_id= $request->kho_id;
        $hoa_don_nhap->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $hoa_don_nhap->ngay_gio_xuat_hoa_don = $request->ngay_gio_xuat_hoa_don;

        $hoa_don_nhap->save();
        // Cap nhat lai Don Hang ve tinh trang !!
        $tong_khoi_luong_dat = $donhanghientai->khoi_luong;
        $tongkhoiluongnhap = 0 ;
        $listhoadonnhap = $donhanghientai->hoa_don_nhaps;
        foreach($listhoadonnhap as $hoadonnhap){
            $tongkhoiluongnhap +=$hoadonnhap->khoi_luong_thung*$hoadonnhap->so_thung;
        }
        if($tongkhoiluongnhap>= $tong_khoi_luong_dat) {
            $donhanghientai->tinh_trang = "Hoàn Thành";
            $donhanghientai->save();
        }
        // Cap nhat lai tinh trang ton kho cua loai soi thuoc hoa don trong don hang
        $loai_soi_thuoc_don_hang->so_thung_ton += $request->so_thung;
        $loai_soi_thuoc_don_hang->khoi_luong_ton += $request->khoi_luong_thung*$request->so_thung; 
        $loai_soi_thuoc_don_hang->save();
        \Session::flash('success','Thêm Hóa Đơn Nhập Thành Công Và Cập Nhật Thông tin trong Đơn hàng Công Ty , Thông tin tồn kho của loại vải thuộc đơn hàng');
        return redirect('manage_kho_hoa_don_nhap');
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
     * Update Tinh trang trong bang DonHangCongTy ::chua lam !!!
     */
    public function update(Request $request, $id)
    {
        $hoa_don_nhap = HoaDonNhap::findOrFail($id);
        $so_thung = $hoa_don_nhap->so_thung;
        $khoi_luong_thung = $hoa_don_nhap->khoi_luong_thung;

        $donhanghientai = DonHangCongTy::findOrFail($request->don_hang_cong_ty_id);
        $loai_soi_thuoc_don_hang = $donhanghientai->loai_soi;
        

        $hoa_don_nhap->don_hang_cong_ty_id = $request->don_hang_cong_ty_id;
        $nhacungcapId = $donhanghientai->nha_cung_cap->id;
        // echo $nhacungcapId;
        $hoa_don_nhap->nha_cung_cap_id = $nhacungcapId;
        $hoa_don_nhap->so_thung=$request->so_thung;
        $hoa_don_nhap->khoi_luong_thung = $request->khoi_luong_thung;
        $hoa_don_nhap->don_gia = $request->don_gia;
        $hoa_don_nhap->kho_id= $request->kho_id;
        $hoa_don_nhap->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $hoa_don_nhap->ngay_gio_xuat_hoa_don = $request->ngay_gio_xuat_hoa_don;

        $hoa_don_nhap->save();
        /// Cap nhat thong tin tinh trang cho don hang hiẹn tai 
        $tong_khoi_luong_dat = $donhanghientai->khoi_luong;
        $tongkhoiluongnhap = 0 ;
        $listhoadonnhap = $donhanghientai->hoa_don_nhaps;
        foreach($listhoadonnhap as $hoadonnhap){
            $tongkhoiluongnhap +=$hoadonnhap->khoi_luong_thung*$hoadonnhap->so_thung;
        }
        if($tongkhoiluongnhap>= $tong_khoi_luong_dat) {
            $donhanghientai->tinh_trang = "Hoàn Thành";
            $donhanghientai->save();
        }
        // Cap nhat lai tinh trang ton kho cua loai soi ///
        $kq_sothung = $loai_soi_thuoc_don_hang->so_thung_ton-$request->so_thung +$so_thung;
        if($kq_sothung < 0){$loai_soi_thuoc_don_hang->so_thung_ton = 0 ;}
        else $loai_soi_thuoc_don_hang->so_thung_ton = $kq_sothung;
        $kq_khoiluongton = $loai_soi_thuoc_don_hang->khoi_luong_ton-($request->so_thung*$request->khoi_luong_thung)+($so_thung*$khoi_luong_thung);
        if($kq_khoiluongton <0){$loai_soi_thuoc_don_hang->khoi_luong_ton = 0;}
        else $loai_soi_thuoc_don_hang->khoi_luong_ton= $kq_khoiluongton;

        $loai_soi_thuoc_don_hang->save();
        \Session::flash('success','Cập Nhật Hóa Đơn Nhập Thành Công Và Cập Nhật Thông tin trong Đơn hàng Công Ty, Tình Trạng Tồn Kho Của Loại Sợi Liên Quan');
        return redirect('manage_kho_hoa_don_nhap');
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
