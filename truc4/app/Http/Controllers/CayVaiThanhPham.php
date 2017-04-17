<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CayVaiThanhPham extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\CayVaiThanhPham::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\CayVaiThanhPham::onlyTrashed()->get();
        else
            $items = \App\CayVaiThanhPham::all();

        return view('/cayvaithanhpham/index')->withList($items);
    }

    public function create()
    {
        return view('/cayvaithanhpham/create')
        ->withCayvaimocs(\App\CayVaiMoc::get())
        ->withKhos(\App\Kho::get())
        ->withHoadonxuats(\App\HoaDonXuat::get());
    }

    public function store(Request $request)
    {
        //Tạo cây vải thành phẩm
        // $this->validate($request, [
        // ]);
        $item = new \App\CayVaiThanhPham;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/cayvaithanhpham/' . $item->id);
    }

    public function show($id)
    {
        return view('/cayvaithanhpham/show')->withCayvaithanhpham(\App\CayVaiThanhPham::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/cayvaithanhpham/edit')
        ->withCayvaithanhpham(\App\CayVaiThanhPham::withTrashed()->find($id))
        ->withCayvaimocs(\App\CayVaiMoc::get())
        ->withKhos(\App\Kho::get())
        ->withHoadonxuats(\App\HoaDonXuat::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\CayVaiThanhPham::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/cayvaithanhpham/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\CayVaiThanhPham::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/cayvaithanhpham');
    }

    public function restore($id)
    {
        $item = \App\CayVaiThanhPham::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/cayvaithanhpham/' . $id);
    }
}
