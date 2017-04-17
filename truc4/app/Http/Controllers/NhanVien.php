<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVien extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\NhanVien::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\NhanVien::onlyTrashed()->get();
        else
            $items = \App\NhanVien::all();

        return view('/nhanvien/index')->withNhanviens($items);
    }

    public function create()
    {
        return view('/nhanvien/create');
    }

    public function store(Request $request)
    {
        \App\User::where('chu_tai_khoan_id', null)->delete();

        //Tạo tài khoản
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $user = new \App\User;
        $inputs = $request->only(['username', 'password', 'email']);
        $user->fill($inputs);
        $user->type = 'N';
        $user->save();

        //Tạo nhân viên
        // $this->validate($request, [
        //     'ten' => 'required',
        // ]);
        $nhanvien = new \App\NhanVien;
        $inputs = $request->except(['_method', '_token', 'username', 'password', 'email']);
        $nhanvien->fill($inputs);
        $nhanvien->user_id = $user->id;
        $nhanvien->save();

        //Cập nhật chủ tài khoản cho user
        $user->chu_tai_khoan_id = $nhanvien->id;
        $user->save();

        return redirect('/nhanvien/' . $nhanvien->id);
    }

    public function show($id)
    {
        return view('/nhanvien/show')->withNhanvien(\App\NhanVien::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/nhanvien/edit')->withNhanvien(\App\NhanVien::withTrashed()->find($id));
    }

    public function update(Request $request, $id)
    {
        $nhanvien = \App\NhanVien::findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->only(['username', 'password', 'email']);
        $nhanvien->user->fill($inputs)->save();

        // $this->validate($request, [
        // ]);
        $inputs = $request->except(['_method', '_token', 'username', 'password', 'email']);
        $nhanvien->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/nhanvien/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\NhanVien::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/nhanvien');
    }

    public function restore($id)
    {
        $item = \App\NhanVien::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/nhanvien/' . $id);
    }
}
