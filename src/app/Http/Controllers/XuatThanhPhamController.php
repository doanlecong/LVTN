<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDonXuat;
use App\DanhSachCayThanhPhamChoXuat;
use App\DonHangKhachHang;
use App\CayVaiThanhPham;
use Session;
class XuatThanhPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $hoadonchuaxuat_id = CayVaiThanhPham::where('tinh_trang', 'Chờ Xuất')->select('hoa_don_xuat_id')->distinct()->get()->toArray();
        $hoadonchuaxuat = HoaDonXuat::find($hoadonchuaxuat_id);
        // foreach($hoadonchuaxuat as $hoadon){
        //     echo $hoadon->id;
        // }
        //echo $hoadonchuaxuat->count();
        $donhangkhachhang = DonHangKhachHang::all();
        return  view('manageside.kho.manager_kho_xuat_vai_thanh_pham')
                                    ->withHoadonchuaxuat($hoadonchuaxuat)
                                    ->withDonhangkhachhang($donhangkhachhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Lay danh sach cay thanh pham cho xuat trong bang danh sach cay thanh pham cho xuat
    public function getListCayThanhPhamChoXuat($id){
        $hoadon = HoaDonXuat::findOrFail($id);
        $donhangkhachhang = $hoadon->don_hang_khach_hang;
        $loaivai =  $donhangkhachhang->loai_vai;
        $khachhang =  $donhangkhachhang->khach_hang;
        $mau = $donhangkhachhang->mau;
        $danhsachcaychoxuat = $hoadon->cay_vai_thanh_phams;
        $arrayCaythanhpham =[];
        foreach($danhsachcaychoxuat as $caychoxuat){
            array_push($arrayCaythanhpham,$caychoxuat->cay_vai_thanh_pham);
        }
        $tong_so_met = 0;
        foreach($donhangkhachhang->hoa_don_xuats as $hd){
            foreach($hd->cay_vai_thanh_phams as $cayvai){
                $tong_so_met += $cayvai->so_met;
            }
        }
        return [$hoadon,$tong_so_met];
        
    }
    //Lay thong tin cay thanh pham lien quan 

    public function getCayThanhPhamById($id){
        return CayVaiThanhPHam::with('loai_vai')->findOrFail($id);
    }
    // Lay ta ca hoa don xuat thuoc don hang khi thuc hien chuc nang cap nhat xuat moc
    public function getListHoaDonXuatBySelectDonHang($id){
        $donhang = DonHangKhachHang::findOrFail($id);
        $loai_vai = $donhang->loai_vai;
        $mau = $donhang->mau;
        $hoadonxuat =$donhang->hoa_don_xuats;
        //return $hoadonxuat;
        $tong_cay_moc_da_xuat = 0;
        $tong_so_met = 0;
        foreach($hoadonxuat as $hd){
            $nhanvienxuat = $hd->nhan_vien_xuat;
            foreach($hd->cay_vai_thanh_phams as $cayvai){
                $tong_cay_moc_da_xuat +=1;
                $tong_so_met += $cayvai->so_met;
            }
        }
        
        return [$donhang,$tong_cay_moc_da_xuat,$tong_so_met];
    }
    // Lay thong tin cay thanh pham trong hoa don xuat de chinh sua thong tin 
    public function getListCayThanhPhamDaXuatToUpdate($id){
        $hoadonxuat = HoaDonXuat::findOrFail($id);
        return $hoadonxuat->cay_vai_thanh_phams;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoadonxuat = $request->ma_phieu_xuat_thanh_pham_id;

        //DanhSachCayThanhPhamChoXuat::where('hoa_don_xuat_id','=',$hoadonxuat)->delete();
        foreach($request->caythanhpham as $cay){
            //echo $cay;
            $caythanhpham = CayVaiThanhPham::findOrFail($cay);
            $caythanhpham->hoa_don_xuat_id = $hoadonxuat;
            $caythanhpham->tinh_trang = "Đã Xuất";
            $caythanhpham->save();

        }
        
        \Session::flash('success','Đã Thực Hiện Lưu Thông Tin Xuất Vải Thành Phẩm Thành Công');
        return redirect('manage_kho_xuat_thanh_pham');
    }
    // chinh sua lai thong tin xuat thanh pham 
    public function updateThongTinXuatThanhPham(Request $request, $id){
        $hoadonxuat = HoaDonXuat::findOrFail($id);
        foreach($hoadonxuat->cay_vai_thanh_phams as $caythanhpham){
            if($request->input('select'.$caythanhpham->id)=='Chờ Xuất'){
                $caythanhpham->tinh_trang ='Chờ Xuất';
                //$caythanhpham->hoa_don_xuat_id = NULL;
                $caythanhpham->save();
                //$caymocchoxuat = DanhSachCayThanhPhamChoXuat::withTrashed()->where('cay_vai_thanh_pham_id','=',$caythanhpham->id)->restore();
                // Chuyen cac thong tin trong bang danhsachcaythanhphamchoxuat sang chua xoa untrash()

            }
        }
        \Session::flash('success','Đã Thực Hiện Cập Nhật Xuất Vải Thành Phẩm Thành Công');
        return redirect('manage_kho_xuat_thanh_pham');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
