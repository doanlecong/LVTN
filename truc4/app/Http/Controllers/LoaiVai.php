<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiVai extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\LoaiVai::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\LoaiVai::onlyTrashed()->get();
        else
            $items = \App\LoaiVai::all();

        return view('/loaivai/index')->withList($items);
    }

    public function create()
    {
        return view('/loaivai/create')
        ->withKhos(\App\Kho::get());
    }

    public function store(Request $request)
    {
        //Tạo loại sợi
        // $this->validate($request, [
        // ]);
        $item = new \App\LoaiVai;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/loaivai/' . $item->id);
    }

    public function show($id)
    {
        return view('/loaivai/show')->withLoaivai(\App\LoaiVai::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/loaivai/edit')
        ->withLoaivai(\App\LoaiVai::withTrashed()->find($id))
        ->withKhos(\App\Kho::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\LoaiVai::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/loaivai/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\LoaiVai::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/loaivai');
    }

    public function restore($id)
    {
        $item = \App\LoaiVai::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/loaivai/' . $id);
    }
}
