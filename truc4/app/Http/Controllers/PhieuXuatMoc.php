<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhieuXuatMoc extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\PhieuXuatMoc::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\PhieuXuatMoc::onlyTrashed()->get();
        else
            $items = \App\PhieuXuatMoc::all();

        return view('/phieuxuatmoc/index')->withList($items);
    }

    public function create()
    {
        return view('/phieuxuatmoc/create')
        ->withLoaivais(\App\LoaiVai::get())
        ->withKhos(\App\Kho::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function store(Request $request)
    {
        //Tạo phiếu xuất mộc
        // $this->validate($request, [
        // ]);
        $item = new \App\PhieuXuatMoc;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/phieuxuatmoc/' . $item->id);
    }

    public function show($id)
    {
        return view('/phieuxuatmoc/show')->withPhieuxuatmoc(\App\PhieuXuatMoc::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/phieuxuatmoc/edit')
        ->withPhieuxuatmoc(\App\PhieuXuatMoc::withTrashed()->find($id))
        ->withLoaivais(\App\LoaiVai::get())
        ->withKhos(\App\Kho::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\PhieuXuatMoc::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/phieuxuatmoc/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\PhieuXuatMoc::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/phieuxuatmoc');
    }

    public function restore($id)
    {
        $item = \App\PhieuXuatMoc::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/phieuxuatmoc/' . $id);
    }
}
