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
        $list_khachhang = KhachHang::all();

        // dh:đơn hàng, kh:khách hàng, hdx:hóa đơn xuất, cv:cây vải thành phẩm
        foreach ($list_khachhang as $khachhang) {
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
            $khachhang->du_tai_khoan = $du_tai_khoan;
        }

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
