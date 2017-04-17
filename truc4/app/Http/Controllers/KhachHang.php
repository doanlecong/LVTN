<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhachHang extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('withTrashed') == 1)
            $items = \App\KhachHang::withTrashed()->get();
        else if ($request->input('withTrashed') == 2)
            $items = \App\KhachHang::onlyTrashed()->get();
        else
            $items = \App\KhachHang::all();

        return view('/khachhang/index')->withKhachhangs($items);
    }

    public function create()
    {
        return view('/khachhang/create');
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
        $user->type = 'K';
        $user->save();

        //Tạo khách hàng
        // $this->validate($request, [
        //     'ten' => 'required',
        // ]);
        $khachhang = new \App\KhachHang;
        $inputs = $request->only(['ten', 'so_dien_thoai', 'dia_chi', 'cong_no']);
        $khachhang->fill($inputs);
        $khachhang->user_id = $user->id;
        $khachhang->save();

        //Cập nhật chủ tài khoản cho user
        $user->chu_tai_khoan_id = $khachhang->id;
        $user->save();

        return redirect('/khachhang/' . $khachhang->id);
    }

    public function show($id)
    {
        return view('/khachhang/show')->withKhachhang(\App\KhachHang::withTrashed()->find($id));
    }

    public function edit($id)
    {
        return view('/khachhang/edit')->withKhachhang(\App\KhachHang::withTrashed()->find($id));
    }

    public function update(Request $request, $id)
    {
        $khachhang = \App\KhachHang::withTrashed()->findOrFail($id);

        // $this->validate($request, [
        // ]);
        $inputs = $request->only(['username', 'password', 'email']);
        $khachhang->user->fill($inputs)->save();

        // $this->validate($request, [
        // ]);
        $inputs = $request->only(['ten', 'so_dien_thoai', 'dia_chi', 'cong_no']);
        $khachhang->fill($inputs)->save();

        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/khachhang/' . $id);
    }

    public function destroy($id)
    {
        $item = \App\KhachHang::findOrFail($id);
        $item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/khachhang');
    }

    public function restore($id)
    {
        $item = \App\KhachHang::onlyTrashed()->findOrFail($id);
        $item->restore();
        \Session::flash('flash_message', 'Đã khôi phục dữ liệu !!!');
        return redirect('/khachhang/' . $id);
    }
}
