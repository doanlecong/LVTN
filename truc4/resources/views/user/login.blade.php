@extends('layouts.master')

@section('title', 'Đăng nhập')

@section('content')
    <form action='/user/login' method='post'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>Tài khoản:</label>
            <input style='width:200px' name='username' value='truc' />
        </p>
        
        <p>
            <label style='width:150px'>Mật khẩu:</label>
            <input style='width:200px' name='password' value='123abc' />
        </p>
        
        <p><input style='width:350px' type='submit' value='Đăng nhập' class='btn btn-primary'></p>

        <p><a style='width:350px' href='/user/register' class='btn btn-info'>Tạo nhân viên</a></p>
    </form>
@endsection
