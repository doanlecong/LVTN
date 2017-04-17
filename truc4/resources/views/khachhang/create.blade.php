@extends('layouts.master')

@section('title', 'Tạo khách hàng mới')

@section('content')
    <form action='/khachhang/' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>username: *</label>
            <input style='width:200px' required name='username' />
        </p>
        
        <p>
            <label style='width:150px'>password: *</label>
            <input style='width:200px' required name='password' />
        </p>
        
        <p>
            <label style='width:150px'>email: *</label>
            <input style='width:200px' required type='email' name='email' value='@gmail.com' />
        </p>
        
        <p>
            <label style='width:150px'>Tên: *</label>
            <input style='width:200px' required name='ten' />
        </p>
        
        <p>
            <label style='width:150px'>Số điện thoại: *</label>
            <input style='width:200px' required name='so_dien_thoai' />
        </p>
        
        <p>
            <label style='width:150px'>Địa chỉ: *</label>
            <input style='width:200px' required name='dia_chi' value='N/A' />
        </p>
        
        <p>
            <label style='width:150px'>Công nợ: *</label>
            <input style='width:200px' required type='number' name='cong_no' value='0' />
        </p>
        
        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/khachhang' class='btn btn-warning'>Hủy</a></p>
@endsection
