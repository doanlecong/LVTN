<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CayVaiThanhPham;
use App\LoNhuom;
use App\Kho;
use App\CayVaiMoc;
class KhoThanhPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_caythanhpham = CayVaiThanhPham::paginate(10);
        $list_lonhuom = LoNhuom::with('mau','loai_vai')->get();
        $list_kho = Kho::all();
    
        return view('manageside.kho.manager_kho_kho_thanh_pham')
            ->withList_caythanhpham($list_caythanhpham)
            ->withList_lonhuom($list_lonhuom)
            ->withList_kho($list_kho);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Get Data khi thuc hien chon mot lo nhuom bat ki
    public function getDataBySelectLoNhuom($id){
        $loNhuom = LoNhuom::with('mau','loai_vai')->findOrFail($id);
        $loaivaiid=$loNhuom->loai_vai_id;
        $socaythanhpham = CayVaiThanhPham::count()+1;
        $listcaymocdaxuat  =  CayVaiMoc::where([['tinh_trang','=','Đã Xuất'],['loai_vai_id','=',$loaivaiid],['lo_nhuom_id','=',NULL]])->get();
        // return LoNhuom::with('mau','loai_vai')->findOrFail($id);
        //Kiểu trả về là Tuple của lonhuom va danh sach cay moc lien quan
        return [$loNhuom,$listcaymocdaxuat,$socaythanhpham];
        
    }
    // Lấy thông tin từ để cập nhật lại câu thành phẩm

    public function getDataToUpdateCayThanhPham($id){
        $caythanhpham = CayVaiThanhPham::with('loai_vai')->findOrFail($id);
        $mausac = $caythanhpham->mau->ten;
        return $caythanhpham;

    }

    // Lấy Danh sách cây mộc liên quan để thay thế , cập nhật , có thể không có 
    public function getListCayMocThayTheLienQuan($id){
        $lonhuom=LoNhuom::findOrFail($id);
        $loaivaiid = $lonhuom->loai_vai_id;
        $listcaymocdaxuat  =  CayVaiMoc::where([['tinh_trang','=','Đã Xuất'],['loai_vai_id','=',$loaivaiid],['lo_nhuom_id','=',NULL]])->get();
        return $listcaymocdaxuat;
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
        $cayvaithanhpham = new CayVaiThanhPham;
        $cayvaithanhpham->cay_vai_moc_id = $request->macaymoc;
        $cayvaithanhpham->lo_nhuom_id = $request->malonhuom;
        $cayvaithanhpham->kich_co = $request->kichco;
        $cayvaithanhpham->so_met = $request->so_met;
        $cayvaithanhpham->don_gia = $request->dongia;
        $cayvaithanhpham->kho_id = $request->kho_id;
        $cayvaithanhpham->ngay_gio_nhap_kho = $request->ngay_gio_nhap_kho;
        $cayvaithanhpham->tinh_trang = "Chưa Xuất";
        $cayvaithanhpham->loai_vai_id = LoNhuom::findOrFail($request->malonhuom)->loai_vai_id;
        $cayvaithanhpham->save();
        //Cap Nhật lại lô Nhuộm trong cay moc tuong ứng được đề cập
        $cayvaimoc = CayVaiMoc::findOrFail($request->macaymoc);
        $cayvaimoc->lo_nhuom_id = $request->malonhuom;
        $cayvaimoc->save();

        //update mau_id
        if ($cayvaithanhpham->lo_nhuom != null) $cayvaithanhpham->mau_id = $cayvaithanhpham->mau_id;
        $cayvaithanhpham->save();

        \Session::flash('success','Nhập Cây Vải Thành Công ');
        return redirect('manage_kho_kho_thanh_pham');
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
        $caythanhpham  = CayVaiThanhPham::findOrFail($id);
        $caythanhpham->kho_id = $request->kho_id;
        $caythanhpham->ngay_gio_nhap_kho = $request->ngay_gio_nhap_kho;
        $caythanhpham->kich_co = $request->kichco;
        $caythanhpham->so_met = $request->so_met;
        $caythanhpham->don_gia = $request->dongia;

        if($request->macaymoc !=NULL){
            $caymoclienquanhientai = CayVaiMoc::findOrFail($caythanhpham->cay_vai_moc_id);
            $caymoclienquanhientai->lo_nhuom_id=NULL;
            $caythanhpham->cay_vai_moc_id = $request->macaymoc;
            $caymoclienquansaudo = CayVaiMoc::findOrFail($request->macaymoc);
            $caymoclienquansaudo->lo_nhuom_id = $caythanhpham->lo_nhuom_id;

            $caymoclienquanhientai->save();
            $caymoclienquansaudo->save();
            
        }
        //todo update mau_id on $caythanhpham
        $caythanhpham->save();

        \Session::flash('success','Cập Nhật Thông tin Cây Mộc Thành Công ');
        return redirect('manage_kho_kho_thanh_pham');
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
