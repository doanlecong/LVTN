@extends('layouts.master')

@section('title', 'Thông tin nhân viên')

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
            <label style='width:150px'>username:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='username' value='{{ $nhanvien->user->username }}' />
        </p>
        
        <p>
            <label style='width:150px'>password:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='password' value='{{ $nhanvien->user->password }}' />
        </p>
        
        <p>
            <label style='width:150px'>email:</label>
            <input style='width:200px; cursor:not-allowed' disabled required type='email' name='email' value='{{ $nhanvien->user->email }}' />
        </p>
        
        <p>
            <label style='width:150px'>Tên:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='ten' value='{{ $nhanvien->ten }}' />
        </p>
        
        <p>
            <label style='width:150px'>CMND:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='cmnd' value='{{ $nhanvien->cmnd }}' />
        </p>
        
        <p>
            <label style='width:150px'>Ngày sinh:</label>
            <input style='width:200px; cursor:not-allowed' disabled required type='date' name='ngay_sinh' value='{{ $nhanvien->ngay_sinh }}' />
        </p>
        
        <p>
            <label style='width:150px'>Số điện thoại:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='so_dien_thoai' value='{{ $nhanvien->so_dien_thoai }}' />
        </p>
        
        <p>
            <label style='width:150px'>Địa chỉ:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='dia_chi' value='{{ $nhanvien->dia_chi }}' />
        </p>
        
        <p>
            <label style='width:150px'>Giới tính:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='gioi_tinh' value='{{ $nhanvien->gioi_tinh }}' />
        </p>
        
        <p>
            <label style='width:150px'>Chức vụ:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='chuc_vu' value='{{ $nhanvien->chuc_vu }}' />
        </p>
        
        <p>
            <label style='width:150px'>Quyền hạn:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='quyen_han' value='{{ $nhanvien->quyen_han }}' />
        </p>
        
        <p>
            <label style='width:150px'>Lương:</label>
            <input style='width:200px; cursor:not-allowed' disabled required name='luong' value='{{ $nhanvien->luong }}' />
        </p>
        
        <p><a style='width:350px' href='/nhanvien/{{ $nhanvien->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>

    @if ($nhanvien->trashed())
        <p><a style='width:350px' href='/nhanvien/{{ $nhanvien->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/nhanvien/{{ $nhanvien->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input style='width:350px' type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
