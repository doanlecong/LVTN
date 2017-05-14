<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuXuatMoc;
use App\CayVaiMoc;
use Session;

class XuatMocController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $list_phieuxuat = PhieuXuatMoc::all();
        return view('manageside.kho.manager_kho_xuat_moc')->withList_phieuxuat($list_phieuxuat);
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
    // Lay danh sach cay moc chua xuat thuoc kieu vai don hang da duoc tao
    public function getListCayMocThuocKieuPhieuXuatMoc($id){
        $phieuxuat = PhieuXuatMoc::with('loai_vai','kho','nhan_vien_xuat')->findOrFail($id);
        $loaivai_id  = $phieuxuat->loai_vai_id;
        $list_cayvaimoc = CayVaiMoc::where([['loai_vai_id','=',$loaivai_id],['tinh_trang','=','Chưa Xuất'],])->get();
        return [$list_cayvaimoc,$phieuxuat];
    }


    //Get Phieu Xuat Moc Voi danh sach cay moc lien quan trong chuc nang cap nhat xuat moc
    public function getPhieuXuatMocWithListCayMoc($id){
        $phieuxuat = PhieuXuatMoc::with('loai_vai','cay_vai_mocs','nhan_vien_xuat','kho')->findOrFail($id);
        return $phieuxuat;
    }

    ///Get Cay moc selected 
    public function getCaymocById($id){
        $caymoc = CayVaiMoc::with('loai_vai')->findOrFail($id);
        return $caymoc;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maphieuxuat = PhieuXuatMoc::findOrFail($request->ma_phieu_xuat_moc_id);
        $caymoc = CayVaiMoc::findOrFail($request->ma_cay_moc_id);
        $caymoc->phieu_xuat_moc_id = $request->ma_phieu_xuat_moc_id;
        $caymoc->tinh_trang = "Đã Xuất";
         
        $maphieuxuat->tong_so_cay_moc +=1;
        $maphieuxuat->tong_so_met +=$caymoc->so_met; 
        $caymoc->save(); 
        $maphieuxuat->save();
        
        \Session::flash('success','Đã Thực Hiện Cập Nhật Cây Vải Mộc , Phiếu Xuất Mộc Tương Ứng Cũng Đã Được Cập Nhật');
        return redirect('manage_kho_xuat_moc');
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
    //Chỉnh sửa lại thông tin của những cây mộc liên quan . THông qua phiếu xuất  mộc liên quan
    public function updateThongTinXuatMoc(Request $request ,$id){
        $phieuxuat = PhieuXuatMoc::findOrFail($id);
        $listcaymoclienquan = $phieuxuat->cay_vai_mocs;
        foreach($listcaymoclienquan as $caymoc){
            $id = $caymoc->id;
            $valueofselectbox = "select".$id;
            echo $valueofselectbox;
            $caymoc->tinh_trang = $request->input($valueofselectbox);
            
            if($caymoc->tinh_trang == "Chưa Xuất"){
                $caymoc->phieu_xuat_moc_id=NULL;
                $phieuxuat->tong_so_met = $phieuxuat->tong_so_met - $caymoc->so_met;
                $phieuxuat->tong_so_cay_moc = (($phieuxuat->tong_so_cay_moc - 1) < 0 ? 0 : ($phieuxuat->tong_so_cay_moc-1));
                $phieuxuat->save();
                $caymoc->save();
            }
        }
        \Session::flash('success','Chỉnh sửa Thông Tin Xuất Mộc Thành Công');
        return redirect('/manage_kho_xuat_moc');
    }

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