<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhieuXuatSoi extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\PhieuXuatSoi::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\PhieuXuatSoi::onlyTrashed()->get();
        else
            $items = \App\PhieuXuatSoi::all();

        return view('/phieuxuatsoi/index')->withList($items);
    }

    public function create()
    {
        return view('/phieuxuatsoi/create')
        ->withLoaisois(\App\LoaiSoi::get())
        ->withKhos(\App\Kho::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function store(Request $request)
    {
        //Tạo phiếu xuất sợi
        // $this->validate($request, [
        // ]);
        $item = new \App\PhieuXuatSoi;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/phieuxuatsoi/' . $item->id);
    }

    public function show($id)
    {
        return view('/phieuxuatsoi/show')->withPhieuxuatsoi(\App\PhieuXuatSoi::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/phieuxuatsoi/edit')
        ->withPhieuxuatsoi(\App\PhieuXuatSoi::withTrashed()->find($id))
        ->withLoaisois(\App\LoaiSoi::get())
        ->withKhos(\App\Kho::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\PhieuXuatSoi::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/phieuxuatsoi/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\PhieuXuatSoi::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/phieuxuatsoi');
    }

    public function restore($id)
    {
        $item = \App\PhieuXuatSoi::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/phieuxuatsoi/' . $id);
    }
}
