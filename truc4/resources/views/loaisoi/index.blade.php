@extends('layouts.master')

@section('title', 'Danh sách loại sợi')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Kho #</th>
                <th>Tên</th>
                <th>Thông tin kỹ thuật</th>
                <th>Khối lượng tồn</th>
                <th>Số thùng tồn</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/loaisoi/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/loaisoi/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td><a href='/kho/{{ $it->kho->id }}'>{{ $it->kho->id }}</a></td>
                    <td>{{ $it->ten }}</td>
                    <td>{{ $it->thong_tin_ky_thuat }}</td>
                    <td>{{ $it->khoi_luong_ton }}</td>
                    <td>{{ $it->so_thung_ton }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/loaisoi/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
