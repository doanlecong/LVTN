<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kho extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\Kho::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\Kho::onlyTrashed()->get();
        else
            $items = \App\Kho::all();

        return view('/kho/index')->withList($items);
    }

    public function create()
    {
        return view('/kho/create')
        ->withNhanviens(\App\NhanVien::get());
    }

    public function store(Request $request)
    {
        //Tạo kho
        // $this->validate($request, [
        // ]);
        $item = new \App\Kho;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/kho/' . $item->id);
    }

    public function show($id)
    {
        return view('/kho/show')->withKho(\App\Kho::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/kho/edit')
        ->withKho(\App\Kho::withTrashed()->find($id))
        ->withNhanviens(\App\NhanVien::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\Kho::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/kho/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\Kho::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/kho');
    }

    public function restore($id)
    {
        $item = \App\Kho::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/kho/' . $id);
    }
}
