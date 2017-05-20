<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mau;
use App\LoaiVai;
use App\CayVaiThanhPham;
use App\CayVaiThanhPhamTraLai;
use Session;

class ThongKeController extends Controller
{
    public function index()
    {
        //
    }

    public function test()
    {
        $data = [];

        $loaiVais = LoaiVai::select('id', 'ten')->get();
        $data['loaiVais'] = $loaiVais;
        foreach ($loaiVais as $loaiVai) {
            $slCayVai = CayVaiThanhPham::where('loai_vai_id', $loaiVai->id)->count();
            $loaiVai->slCayVai = $slCayVai;
        }
        
        $maus = Mau::select('id', 'ten', 'ma_mau')->get();
        $data['maus'] = $maus;
        foreach ($maus as $mau) {
            $slCayVai = CayVaiThanhPham::where('mau_id', $mau->id)->count();
            $mau->slCayVai = $slCayVai;
        }
        
        return view('thongke.test')->withData($data);
    }
}
