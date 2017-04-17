@extends('layouts.master')

@section('title', 'Thông tin tài khoản')

@section('content')
    <form action='/user/{{ $user->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='id' value='{{ $user->id }}' />
        </p>

        <p>
            <label style='width:150px'>username:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='username' value='{{ $user->username }}' />
        </p>
        
        <p>
            <label style='width:150px'>password:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='password' value='{{ $user->password }}' />
        </p>
        
        <p>
            <label style='width:150px'>email:</label>
            <input style='width:200px; cursor:not-allowed' disabled type='email' name='email' value='{{ $user->email }}' />
        </p>
        
        <p>
            <label style='width:150px'>type:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='type' value='{{ $user->type }}' />
        </p>
        
        <p>
            <label style='width:150px'>chu_tai_khoan_id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='chu_tai_khoan_id' value='{{ $user->chu_tai_khoan_id }}' />
        </p>
        
        <p><a style='width:350px' href='/user/{{ $user->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>

    <form action='/user/{{ $user->id }}' method='post'>
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p><input style='width:350px' type='submit' class='btn btn-danger' value='Xóa' /></p>
    </form>
    
    @if (Session::has('user') && (Session::get('user')->id) == $user->id)
        <a style='width:350px' href='/user/logout' class='btn btn-warning'>Đăng xuất</a>
    @endif
@endsection
