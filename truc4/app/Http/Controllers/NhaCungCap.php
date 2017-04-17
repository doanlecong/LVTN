<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhaCungCap extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\NhaCungCap::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\NhaCungCap::onlyTrashed()->get();
        else
            $items = \App\NhaCungCap::all();

        return view('/nhacungcap/index')->withList($items);
    }

    public function create()
    {
        return view('/nhacungcap/create');
    }

    public function store(Request $request)
    {
        //Tạo nhà cung cấp
        // $this->validate($request, [
        // ]);
        $item = new \App\NhaCungCap;
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        return redirect('/nhacungcap/' . $item->id);
    }

    public function show($id)
    {
        return view('/nhacungcap/show')->withNhacungcap(\App\NhaCungCap::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/nhacungcap/edit')->withNhacungcap(\App\NhaCungCap::withTrashed()->find($id));
    }

    public function update(Request $request, $id)
    {
        $item = \App\NhaCungCap::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_token', '_method']);
        $item->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/nhacungcap/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\NhaCungCap::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/nhacungcap');
    }

    public function restore($id)
    {
        $item = \App\NhaCungCap::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/nhacungcap/' . $id);
    }
}
