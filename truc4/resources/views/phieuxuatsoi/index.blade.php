@extends('layouts.master')

@section('title', 'Danh sách phiếu xuất sợi')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Loại sợi #</th>
                <th>Số thùng</th>
                <th>Khối lượng thùng</th>
                <th>Tổng khối lượng xuất</th>
                <th>Kho #</th>
                <th>NV xuất #</th>
                <th>Ngày giờ xuất kho</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/phieuxuatsoi/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/phieuxuatsoi/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        <a href='/loaisoi/{{ $it->loai_soi_id }}'>{{ $it->loai_soi_id }}
                            @if ($it->loai_soi)
                                - {{ $it->loai_soi->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->so_thung }}</td>
                    <td>{{ $it->khoi_luong_thung }}</td>
                    <td>{{ $it->tong_khoi_luong_xuat }}</td>
                    <td>
                        <a href='/kho/{{ $it->kho_id }}'>{{ $it->kho_id }}
                            @if ($it->kho)
                                - {{ $it->kho->ten }}
                            @endif
                        </a>
                    </td>
                    <td>
                        <a href='/nhanvien/{{ $it->nhan_vien_xuat_id }}'>{{ $it->nhan_vien_xuat_id }}
                            @if ($it->nhan_vien_xuat)
                                - {{ $it->nhan_vien_xuat->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ngay_gio_xuat_kho }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/phieuxuatsoi/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
