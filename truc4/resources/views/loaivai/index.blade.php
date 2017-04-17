@extends('layouts.master')

@section('title', 'Danh sách loại vải')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Đơn giá</th>
                <th>Dệt từ sợi</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/loaivai/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/loaivai/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>{{ $it->ten }}</td>
                    <td>{{ $it->don_gia }}</td>
                    <td>
                        @foreach ($it->loai_sois as $loaisoi)
                            <a href='/loaisoi/{{ $loaisoi->id }}'>{{ $loaisoi->id }}</a>
                        @endforeach
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/loaivai/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
