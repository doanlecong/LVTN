<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHangKhachHang;
use App\KhachHang;
use App\NhanVien;
use App\HoaDonXuat;
use App\CayVaiThanhPham;
use App\LoNhuom;

class HoaDonXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$donHangKhachHangs = DonHangKhachHang::pluck('id', 'id');
        //$khachHangs = KhachHang::pluck('ten', 'id');
        $nhanViens = NhanVien::pluck('ten', 'id');
        return view('manageside.banhang.hoadonxuat')->withHdxs(HoaDonXuat::all())
        ->withDhkhs(DonHangKhachHang::all())
        //->with(compact('id', 'donHangKhachHangs'))
        //->with(compact('id', 'khachHangs'))
        ->with(compact('id', 'nhanViens'))
        ->withCvtps(CayVaiThanhPham::where('hoa_don_xuat_id', null)->get());
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
        $hdx = HoaDonXuat::findOrFail($id);
        // trả về hóa đơn xuất kèm danh sách cây vải đã xuất của hóa đơn đó
        $cay_vai_thanh_phams = $hdx->cay_vai_thanh_phams;
        return $hdx;
    }

    public function DanhSachCayVaiUngVoiDonHangAjax($id)
    {
        $dhkh = DonHangKhachHang::findOrFail($id);
        $kho_vai = $dhkh->kich_co;
        $loai_vai_id = $dhkh->loai_vai_id;
        $listLoNhuom = LoNhuom::where('mau_id', $dhkh->mau_id)->select('id')->get();
        //return $listLoNhuom;
        $listCayVai = CayVaiThanhPham::where('loai_vai_id', $loai_vai_id)
        ->whereIn('lo_nhuom_id', $listLoNhuom)
        ->where('tinh_trang', 'Chưa Xuất')->where('kich_co',$kho_vai)
        //->select('id')
        ->get();
        return $listCayVai;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tạo hóa đơn xuất
        $this->validate($request, array(
            'don_hang_khach_hang_id' => 'required',
            'ngay_gio_xuat_hoa_don' => 'required',
            'nhan_vien_xuat_id' => 'required',
            'danh_sach_cay_vai' => 'required',
        ));
        $hoadonxuat = new HoaDonXuat;
        $inputs = $request->except('danh_sach_cay_vai');
        $hoadonxuat->fill($inputs);
        $hoadonxuat->save();

        //update khach_hang_id
        $hoadonxuat->khach_hang_id = $hoadonxuat->don_hang_khach_hang->khach_hang_id;
        $hoadonxuat->save();


        //update Những cây vải thành phẩm đã xuất
        foreach ($request->danh_sach_cay_vai as $key => $cvtp_id) {
            $cvtp = CayVaiThanhPham::where('hoa_don_xuat_id', null)->find($cvtp_id);
            $cvtp->hoa_don_xuat_id = $hoadonxuat->id;
            $cvtp->tinh_trang = 'Chờ Xuất';
            $cvtp->save();
        }

        // update tình trạng đơn hàng khách hàng
        $tong_so_met = 0;
        $tong_tien = 0;
        foreach ($hoadonxuat->don_hang_khach_hang->hoa_don_xuats as $hdx) {
            foreach ($hdx->cay_vai_thanh_phams as $cvtp) {
                $tong_so_met += $cvtp->so_met;
                $tong_tien += ($cvtp->so_met * $cvtp->don_gia);
            }
        }
        if ($hoadonxuat->don_hang_khach_hang->tong_so_met > $tong_so_met) {
            $hoadonxuat->don_hang_khach_hang->tinh_trang = 'Đang giao';
        }
        if ($hoadonxuat->don_hang_khach_hang->tong_so_met <= $tong_so_met) {
            $hoadonxuat->don_hang_khach_hang->tinh_trang = 'Hoàn thành';
        }

        $hoadonxuat->don_hang_khach_hang->save();
        $tong_tien_sau_chiet_khau = $tong_tien*(100-($hoadonxuat->don_hang_khach_hang->chiet_khau))/100;
        //update công nợ khách hàng sau khi giao vải
        if($hoadonxuat->khach_hang->ghi_chu !=NULL){
            $duno = intval($hoadonxuat->khach_hang->ghi_chu);
            $kq = $duno - $tong_tien_sau_chiet_khau; 
            if($kq==0){
                $hoadonxuat->khach_hang->ghi_chu =NULL;

            }else if($kq > 0 ) {
                $hoadonxuat->khach_hang->ghi_chu =strval($kq);
            }else if($kq < 0 ){
                $hoadonxuat->khach_hang->ghi_chu =NULL;
                $hoadonxuat->khach_hang->cong_no = $kq+(-2*$kq);                
            }
        }else {
            $hoadonxuat->khach_hang->cong_no += $tong_tien_sau_chiet_khau;
        }

       // $hoadonxuat->khach_hang->cong_no += $tong_tien*(100-($hoadonxuat->don_hang_khach_hang->chiet_khau))/100;
        $hoadonxuat->khach_hang->save();

        \Session::flash('success', 'Hóa đơn xuất đã được thêm thành công!');
        return redirect('/manage_ban_hang_hoa_don_xuat');
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
