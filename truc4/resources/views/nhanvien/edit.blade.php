@extends('layouts.master')

@section('title', 'Cập nhật thông tin nhân viên')

@section('content')
    <form action='/nhanvien/{{ $nhanvien->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='id' value='{{ $nhanvien->id }}' />
        </p>

        <p>
            <label style='width:150px'>user_id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='user_id' value='{{ $nhanvien->user->id }}' />
        </p>

        <p>
            <label style='width:150px'>username: *</label>
            <input style='width:200px' required name='username' value='{{ $nhanvien->user->username }}' />
        </p>
        
        <p>
            <label style='width:150px'>password: *</label>
            <input style='width:200px' required name='password' value='{{ $nhanvien->user->password }}' />
        </p>
        
        <p>
            <label style='width:150px'>email: *</label>
            <input style='width:200px' required type='email' name='email' value='{{ $nhanvien->user->email }}' />
        </p>
        
        <p>
            <label style='width:150px'>Tên: *</label>
            <input style='width:200px' required name='ten' value='{{ $nhanvien->ten }}' />
        </p>
        
        <p>
            <label style='width:150px'>CMND: *</label>
            <input style='width:200px' required name='cmnd' value='{{ $nhanvien->cmnd }}' />
        </p>
        
        <p>
            <label style='width:150px'>Ngày sinh: *</label>
            <input style='width:200px' required type='date' name='ngay_sinh' value='{{ $nhanvien->ngay_sinh }}' />
        </p>
        
        <p>
            <label style='width:150px'>Số điện thoại: *</label>
            <input style='width:200px' required name='so_dien_thoai' value='{{ $nhanvien->so_dien_thoai }}' />
        </p>
        
        <p>
            <label style='width:150px'>Địa chỉ: *</label>
            <input style='width:200px' required name='dia_chi' value='{{ $nhanvien->dia_chi }}' />
        </p>
        
        <p>
            <label style='width:150px'>Giới tính: *</label>
            <input style='width:200px' required name='gioi_tinh' value='{{ $nhanvien->gioi_tinh }}' />
        </p>
        
        <p>
            <label style='width:150px'>Chức vụ: *</label>
            <input style='width:200px' required name='chuc_vu' value='{{ $nhanvien->chuc_vu }}' />
        </p>
        
        <p>
            <label style='width:150px'>Quyền hạn: *</label>
            <input style='width:200px' name='quyen_han' value='{{ $nhanvien->quyen_han }}' />
        </p>
        
        <p>
            <label style='width:150px'>Lương: *</label>
            <input style='width:200px' name='luong' value='{{ $nhanvien->luong }}' />
        </p>
        
        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/nhanvien/{{ $nhanvien->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
