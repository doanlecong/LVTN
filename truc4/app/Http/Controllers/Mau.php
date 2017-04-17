<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mau extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\Mau::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\Mau::onlyTrashed()->get();
        else
            $items = \App\Mau::all();

        return view('/mau/index')->withList($items);
    }

    public function create()
    {
        return view('/mau/create')
        ->withNhanviens(\App\NhanVien::get());
    }

    public function store(Request $request)
    {
        //Tạo màu
        $this->validate($request, [
            'ten' => 'required',
        ]);
        $item = new \App\Mau;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/mau');
    }

    public function show($id)
    {
        return view('/mau/show')->withMau(\App\Mau::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/mau/edit')
        ->withMau(\App\Mau::withTrashed()->find($id))
        ->withNhanviens(\App\NhanVien::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\Mau::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/mau/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\Mau::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/mau');
    }

    public function restore($id)
    {
        $item = \App\Mau::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/mau/' . $id);
    }
}
