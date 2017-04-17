@extends('layouts.master')

@section('title', 'Tạo nhân viên mới')

@section('content')
    <form action='/nhanvien/' method='post'>
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
            <label style='width:150px'>CMND: *</label>
            <input style='width:200px' required name='cmnd' />
        </p>
        
        <p>
            <label style='width:150px'>Ngày sinh: *</label>
            <input style='width:200px' required type='date' name='ngay_sinh' />
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
            <label style='width:150px'>Giới tính: *</label>
            <input style='width:200px' required name='gioi_tinh' value='F' />
        </p>
        
        <p>
            <label style='width:150px'>Chức vụ: *</label>
            <input style='width:200px' required name='chuc_vu' value='Nhân viên' />
        </p>
        
        <p>
            <label style='width:150px'>Quyền hạn: *</label>
            <input style='width:200px' name='quyen_han' value='2' />
        </p>
        
        <p>
            <label style='width:150px'>Lương: *</label>
            <input style='width:200px' name='luong' value='7000000' />
        </p>
        
        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/nhanvien/' class='btn btn-warning'>Hủy</a></p>
@endsection
