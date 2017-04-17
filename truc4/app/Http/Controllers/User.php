<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function login(Request $request) {
        $user = 'App\User'::where($request->only(['username', 'password']))
        ->first();

        if ($user == null)
            return 'Sai tên tài khoản/mật khẩu <br /> <a href="/user/login">Đăng nhập lại</a>';
        else {
            \Session::put('user', $user);
            return redirect('/user/' . $user->id);
        }
    }
    
    public function logout() {
        \Session::forget('user');
        return view('/user/logout');
    }

    public function index()
    {
        return view('/user/index')->withUsers('App\User'::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //\Session::flash('flash_message', 'Tạo thành công!!!');
        //return $item;
    }

    public function show($id)
    {
        return view('/user/show')->withUser('App\User'::find($id));
    }

    public function edit($id)
    {
        return view('/user/edit')->withUser('App\User'::find($id));
    }

    public function update(Request $request, $id)
    {
        $item = 'App\User'::findOrFail($id);
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $inputs = $request->only(['username', 'password', 'email']);
        $item->fill($inputs)->save();
        \Session::flash('flash_message', 'Cập nhật thành công!!!');
        return redirect('/user/' . $id);
    }

    public function destroy($id)
    {
        $item = 'App\User'::findOrFail($id);
        //$item->delete();
        \Session::flash('flash_message', 'Đã xóa thành công!!!');
        return redirect('/user');
    }
}
