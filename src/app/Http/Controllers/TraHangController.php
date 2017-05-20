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

    public function store(Request $request)
    {
        
        return $request->cayvai;

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
