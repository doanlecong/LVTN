@extends('layouts.master')

@section('title', 'Danh sách kho')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Quản lý #</th>
                <th>Tên</th>
                <th>Diện tích</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/kho/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/kho/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        <a href='/nhanvien/{{ $it->nhan_vien_quan_ly_id }}'>{{ $it->nhan_vien_quan_ly_id }}
                            @if ($it->nhan_vien_quan_ly)
                                - {{ $it->nhan_vien_quan_ly->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ten }}</td>
                    <td>{{ $it->dien_tich }}</td>
                    <td>{{ $it->dia_chi }}</td>
                    <td>{{ $it->so_dien_thoai }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/kho/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
