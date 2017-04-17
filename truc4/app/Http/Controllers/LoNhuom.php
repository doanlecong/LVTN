<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoNhuom extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\LoNhuom::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\LoNhuom::onlyTrashed()->get();
        else
            $items = \App\LoNhuom::all();

        return view('/lonhuom/index')->withList($items);
    }

    public function create()
    {
        return view('/lonhuom/create')
        ->withLoaivais(\App\LoaiVai::get())
        ->withMaus(\App\Mau::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function store(Request $request)
    {
        //Tạo lô nhuộm
        // $this->validate($request, [
        // ]);
        $item = new \App\LoNhuom;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/lonhuom/' . $item->id);
    }

    public function show($id)
    {
        return view('/lonhuom/show')->withLonhuom(\App\LoNhuom::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/lonhuom/edit')
        ->withLonhuom(\App\LoNhuom::withTrashed()->find($id))
        ->withLoaivais(\App\LoaiVai::get())
        ->withMaus(\App\Mau::get())
        ->withNhanviens(\App\NhanVien::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\LoNhuom::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/lonhuom/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\LoNhuom::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/lonhuom');
    }

    public function restore($id)
    {
        $item = \App\LoNhuom::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/lonhuom/' . $id);
    }
}
