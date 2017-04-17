<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CayVaiMoc extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\CayVaiMoc::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\CayVaiMoc::onlyTrashed()->get();
        else
            $items = \App\CayVaiMoc::all();

        return view('/cayvaimoc/index')->withList($items);
    }

    public function create()
    {
        return view('/cayvaimoc/create')
        ->withLoaivais(\App\LoaiVai::get())
        ->withNhanviens(\App\NhanVien::get())
        ->withKhos(\App\Kho::get())
        ->withPhieuxuatmocs(\App\PhieuXuatMoc::get())
        ->withLonhuoms(\App\LoNhuom::get());
    }

    public function store(Request $request)
    {
        //Tạo cây vải mộc
        // $this->validate($request, [
        // ]);
        $item = new \App\CayVaiMoc;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/cayvaimoc/' . $item->id);
    }

    public function show($id)
    {
        return view('/cayvaimoc/show')->withCayvaimoc(\App\CayVaiMoc::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/cayvaimoc/edit')
        ->withCayvaimoc(\App\CayVaiMoc::withTrashed()->find($id))
        ->withLoaivais(\App\LoaiVai::get())
        ->withNhanviens(\App\NhanVien::get())
        ->withKhos(\App\Kho::get())
        ->withPhieuxuatmocs(\App\PhieuXuatMoc::get())
        ->withLonhuoms(\App\LoNhuom::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\CayVaiMoc::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/cayvaimoc/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\CayVaiMoc::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/cayvaimoc');
    }

    public function restore($id)
    {
        $item = \App\CayVaiMoc::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/cayvaimoc/' . $id);
    }
}
