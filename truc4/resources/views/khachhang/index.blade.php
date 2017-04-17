@extends('layouts.master')

@section('title', 'Danh sách khách hàng')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>user_id</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Công nợ</th>
            <tr>
        </thead>
        <tbody>
            @foreach($khachhangs as $khachhang)
                <tr onclick='window.location.href="/khachhang/{{ $khachhang->id }}"' style='cursor:pointer'>
                    <td><a href='/khachhang/{{ $khachhang->id }}'>{{ $khachhang->id }}</a></td>
                    <td><a href='/user/{{ $khachhang->user->id }}'>{{ $khachhang->user->id }}</a></td>
                    <td>{{ $khachhang->ten }}</td>
                    <td>{{ $khachhang->so_dien_thoai }}</td>
                    <td>{{ $khachhang->dia_chi }}</td>
                    <td>{{ $khachhang->cong_no }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/khachhang/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
