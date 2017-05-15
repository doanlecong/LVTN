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
        // $cvtps = CayVaiThanhPham::where('hoa_don_xuat_id', $hdx->id)->get();
        // $cay_vai_thanh_phams = '<div>';
        // foreach ($cvtps as $cv) {
        //     //return 'Cây vải #' . $cv->id . ' - ' . $cv->loai_vai->ten . ' - ' . $cv->lo_nhuom->mau->ten;
        //     $cay_vai_thanh_phams = $cay_vai_thanh_phams . '<br/>' . 'Cây vải #' . $cv->id . ' - ' . $cv->loai_vai->ten . ' - ' . $cv->lo_nhuom->mau->ten;
        // }
        // $dhx->cay_vai_thanh_phams = $cay_vai_thanh_phams . '</div>';
        return $hdx;
    }

    public function DanhSachCayVaiUngVoiDonHangAjax($id)
    {
        $dhkh = DonHangKhachHang::findOrFail($id);
        $loai_vai_id = $dhkh->loai_vai_id;
        $listLoNhuom = LoNhuom::where('mau_id', $dhkh->mau_id)->select('id')->get();
        //return $listLoNhuom;
        $listCayVai = CayVaiThanhPham::where('loai_vai_id', $loai_vai_id)
        ->whereIn('lo_nhuom_id', $listLoNhuom)
        ->select('id')->get();
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
            $cvtp->trang_thai = 'Chờ Xuất';
            $cvtp->save();
        }
        // foreach ($request->danh_sach_cay_vai as $key => $cvtp_id) {
        //    $danhsachcaythanhphamchoxuatItem = new DanhSachCayThanhPhamChoXuat;
        //    $danhsachcaythanhphamchoxuatItem->hoa_don_xuat_id = $hoadonxuat->id;
        //    $danhsachcaythanhphamchoxuatItem->cay_vai_thanh_pham_id= $cvtp_id;
        //    $danhsachcaythanhphamchoxuatItem->save();
        // }

        //update tình trạng đơn hàng khách hàng
        // $tong_so_met = 0;
        // foreach ($hoadonxuat->don_hang_khach_hang->hoa_don_xuats as $hdx) {
        //     foreach ($hdx->cay_vai_thanh_phams as $cvtp) {
        //         $tong_so_met += $cvtp->so_met;
        //     }
        // }
        // if ($hoadonxuat->don_hang_khach_hang->tong_so_met > $tong_so_met) {
        //     $hoadonxuat->don_hang_khach_hang->tinh_trang = 'Đang giao';
        // }
        // if ($hoadonxuat->don_hang_khach_hang->tong_so_met <= $tong_so_met) {
        //     $hoadonxuat->don_hang_khach_hang->tinh_trang = 'Hoàn thành';
        // }

        // $hoadonxuat->don_hang_khach_hang->save();

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
