<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CayVaiThanhPham;
use App\CayVaiThanhPhamTraLai;
use App\LoaiVai;
use App\Mau;
use App\HoaDonXuat;
use Session;

class TraHangController extends Controller
{
    public function index()
    {
        $list_cvtptl = CayVaiThanhPhamTraLai::all();
        return view('manageside.banhang.trahang')->withList($list_cvtptl);
    }

    public function create()
    {
        return view('manageside.banhang.trahang_create')
        // ->withHoadonxuats(HoaDonXuat::all())
        ->withLoaivais(LoaiVai::select('id','ten')->get())
        ->withMaus(Mau::select('id','ten')->get())
        ->withCayvais(CayVaiThanhPham::get())
        ;
    }

    public function danhSachCayVaiAjax(Request $request) {
        $cvQuery = CayVaiThanhPham::where('tinh_trang', 'Đã Xuất')
        ->select('id', 'loai_vai_id', 'mau_id', 'so_met', 'don_gia', 'kich_co');

        if ($request->loaivai) {
            $cvQuery = $cvQuery->whereIn('loai_vai_id', $request->loaivai);
        }
        if ($request->mau) {
            $cvQuery = $cvQuery->whereIn('mau_id', $request->mau);
        }

        $data = $cvQuery->get();

        foreach ($data as $cv) {
            $cv->ten_loai_vai = LoaiVai::find($cv->loai_vai_id)->ten;
            $cv->ten_mau = Mau::find($cv->mau_id)->ten;
        }

        return $data;
    }

    public function store(Request $request)
    {
        $dsCayVai = CayVaiThanhPham::find($request->cayvai);
        $dsCayVaiTraLai = [];

        foreach ($dsCayVai as $key=>$cv) {
            $cvtl = new CayVaiThanhPhamTraLai;
            $dsCayVaiTraLai[$key] = $cvtl;

            $cvtl->hoa_don_xuat_id = $cv->hoa_don_xuat_id;
            $cvtl->cay_vai_thanh_pham_id = $cv->id;
            $cvtl->kich_co = $cv->kich_co;
            $cvtl->so_met = $cv->so_met;
            $cvtl->don_gia = $cv->don_gia;
            $cvtl->loai_vai_id = $cv->loai_vai_id;
            $cvtl->mau_id = $cv->mau_id;
        }

        foreach ($dsCayVai as $key=>$cv) {
            //cập nhật tình trạng cho cây vải thành phẩm = bị trả lại
            $cv->tinh_trang = 'Bị Trả Lại';


            //cập nhật công nợ: hoàn lại tiền cho khách hàng (giảm công nợ)
            $kh = KhachHang::find($khachhang->id);

            // tính tổng tiền khách đã mua hàng
            $tien_mua = 0;
            $list_dh = $kh->don_hang_khach_hangs;
            foreach ($list_dh as $dh) {
                $tong_tien_don_hang = 0;

                $list_hdx = $dh->hoa_don_xuats;
                foreach ($list_hdx as $hdx) {
                    $list_cv = $hdx->cay_vai_thanh_phams;
                    foreach ($list_cv as $cv) {
                        if ($cv->tinh_trang == 'Đã Xuất') {
                            $tong_tien_don_hang += $cv->so_met * $cv->don_gia;
                        }
                    }
                }

                if ($dh->chiet_khau == null) {
                    $dh->chiet_khau = 0;
                    $dh->save();
                }
                $tien_mua += $tong_tien_don_hang * (100 - $dh->chiet_khau)/100;
            }

            //tính tổng tiền khách đã thanh toán
            $tien_thanh_toan = 0;
            foreach ($kh->thanh_toans as $tt) {
                $tien_thanh_toan += $tt->so_tien;
            }

            //công nợ = tiền mua - thanh toán
            $khachhang->cong_no = max( 0, $tien_mua - $tien_thanh_toan );
            $du_tai_khoan = max( 0, $tien_thanh_toan - $tien_mua );
            if ($du_tai_khoan > 0) $khachhang->ghi_chu = strval($du_tai_khoan);
            else $khachhang->ghi_chu = null;
            $khachhang->save();


            //cập nhật lại tình trạng đơn hàng (thường sẽ là đang giao)
            $dh = $cv->hoa_don_xuat->don_hang_khach_hang;
            $tong_so_met = 0;
            $tong_so_met_tra_lai = 0;
            foreach ($dh->hoa_don_xuats as $hdx) {
                foreach ($hdx->cay_vai_thanh_phams as $cvtp) {
                    $tong_so_met += $cvtp->so_met;
                    if ($cvtp->tinh_trang == 'Bị Trả Lại')
                        $tong_so_met_tra_lai += $cvtp->so_met;
                }
            }
            // $so_met_da_giao = $tong_so_met;
            $so_met_con_lai = max(0, $dh->tong_so_met - $tong_so_met + $tong_so_met_tra_lai);

            if ($so_met_con_lai > 0)
            {
                $dh->tinh_trang = 'Đang giao';
            }
            else
            {
                $dh->tinh_trang = 'Hoàn thành';
            }

            $dsCayVaiTraLai[$key]->save();
            $cv->save();
        }

        \Session::flash('success', 'Trả lại hàng thành công!');
        return redirect('/tra_hang');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
