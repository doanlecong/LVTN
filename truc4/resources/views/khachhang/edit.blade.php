@extends('layouts.master')

@section('title', 'Cập nhật thông tin nhân viên')

@section('content')
    <form action='/khachhang/{{ $khachhang->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='id' value='{{ $khachhang->id }}' />
        </p>

        <p>
            <label style='width:150px'>user_id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='user_id' value='{{ $khachhang->user->id }}' />
        </p>

        <p>
            <label style='width:150px'>username: *</label>
            <input style='width:200px' required name='username' value='{{ $khachhang->user->username }}' />
        </p>
        
        <p>
            <label style='width:150px'>password: *</label>
            <input style='width:200px' required name='password' value='{{ $khachhang->user->password }}' />
        </p>
        
        <p>
            <label style='width:150px'>email: *</label>
            <input style='width:200px' required type='email' name='email' value='{{ $khachhang->user->email }}' />
        </p>
        
        <p>
            <label style='width:150px'>Tên: *</label>
            <input style='width:200px' required name='ten' value='{{ $khachhang->ten }}' />
        </p>
        
        <p>
            <label style='width:150px'>Số điện thoại: *</label>
            <input style='width:200px' required name='so_dien_thoai' value='{{ $khachhang->so_dien_thoai }}' />
        </p>
        
        <p>
            <label style='width:150px'>Địa chỉ: *</label>
            <input style='width:200px' required name='dia_chi' value='{{ $khachhang->dia_chi }}' />
        </p>
        
        <p>
            <label style='width:150px'>Công nợ: *</label>
            <input style='width:200px' required type='number' name='cong_no' value='{{ $khachhang->cong_no }}' />
        </p>
        
        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/khachhang/{{ $khachhang->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
