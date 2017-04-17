@extends('layouts.master')

@section('title', 'Danh sách nhà cung cấp')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Fax</th>
                <th>Công nợ</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/nhacungcap/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/nhacungcap/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>{{ $it->ten }}</td>
                    <td>{{ $it->dia_chi }}</td>
                    <td>{{ $it->email }}</td>
                    <td>{{ $it->so_dien_thoai }}</td>
                    <td>{{ $it->fax }}</td>
                    <td>{{ $it->cong_no }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/nhacungcap/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
