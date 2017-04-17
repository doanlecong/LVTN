<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiSoi extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\LoaiSoi::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\LoaiSoi::onlyTrashed()->get();
        else
            $items = \App\LoaiSoi::all();

        return view('/loaisoi/index')->withList($items);
    }

    public function create()
    {
        return view('/loaisoi/create')
        ->withKhos(\App\Kho::get());
    }

    public function store(Request $request)
    {
        //Tạo loại sợi
        // $this->validate($request, [
        // ]);
        $item = new \App\LoaiSoi;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/loaisoi/' . $item->id);
    }

    public function show($id)
    {
        return view('/loaisoi/show')->withLoaisoi(\App\LoaiSoi::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/loaisoi/edit')
        ->withLoaisoi(\App\LoaiSoi::withTrashed()->find($id))
        ->withKhos(\App\Kho::get());
    }

    public function update(Request $request, $id)
    {
        $item = \App\LoaiSoi::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/loaisoi/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\LoaiSoi::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/loaisoi');
    }

    public function restore($id)
    {
        $item = \App\LoaiSoi::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/loaisoi/' . $id);
    }
}
