@extends('layouts.master')

@section('title', 'Danh sách lô nhuộm')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Loại vải #</th>
                <th>Màu #</th>
                <th>NV nhuộm #</th>
                <th>Ngày giờ nhuộm</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/lonhuom/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/lonhuom/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        <a href='/loaivai/{{ $it->loai_vai_id }}'>{{ $it->loai_vai_id }}
                            @if ($it->loai_vai)
                                - {{ $it->loai_vai->ten }}
                            @endif
                        </a>
                    </td>
                    <td>
                        <a href='/mau/{{ $it->mau_id }}'>{{ $it->mau_id }}
                            @if ($it->mau)
                                - {{ $it->mau->ten }}
                            @endif
                        </a>
                    </td>
                    <td>
                        <a href='/nhanvien/{{ $it->nhan_vien_nhuom_id }}'>{{ $it->nhan_vien_nhuom_id }}
                            @if ($it->nhan_vien_nhuom)
                                - {{ $it->nhan_vien_nhuom->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ngay_gio_nhuom }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/lonhuom/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
