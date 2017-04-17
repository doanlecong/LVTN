@extends('layouts.master')

@section('title', 'Danh sách nhân viên')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>user_id</th>
                <th>Tên</th>
                <th>CMND</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Giới tính</th>
                <th>Chức vụ</th>
                <th>Quyền hạn</th>
                <th>Lương</th>
            <tr>
        </thead>
        <tbody>
            @foreach($nhanviens as $nhanvien)
                <tr onclick='window.location.href="/nhanvien/{{ $nhanvien->id }}"' style='cursor:pointer'>
                    <td><a href='/nhanvien/{{ $nhanvien->id }}'>{{ $nhanvien->id }}</a></td>
                    <td><a href='/user/{{ $nhanvien->user->id }}'>{{ $nhanvien->user->id }}</a></td>
                    <td>{{ $nhanvien->ten }}</td>
                    <td>{{ $nhanvien->cmnd }}</td>
                    <td>{{ $nhanvien->ngay_sinh }}</td>
                    <td>{{ $nhanvien->so_dien_thoai }}</td>
                    <td>{{ $nhanvien->dia_chi }}</td>
                    <td>{{ $nhanvien->gioi_tinh }}</td>
                    <td>{{ $nhanvien->chuc_vu }}</td>
                    <td>{{ $nhanvien->quyen_han }}</td>
                    <td>{{ $nhanvien->luong }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/nhanvien/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
