@extends('layouts.master')

@section('title', 'Danh sách màu')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Công thức</th>
                <th>NV pha chế #</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/mau/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/mau/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>{{ $it->ten }}</td>
                    <td>{{ $it->cong_thuc }}</td>
                    <td>
                        <a href='/nhanvien/{{ $it->nhan_vien_pha_che_id }}'>{{ $it->nhan_vien_pha_che_id }}
                            @if ($it->nhan_vien_pha_che)
                                - {{ $it->nhan_vien_pha_che->ten }}
                            @endif
                        </a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/mau/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
