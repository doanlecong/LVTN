@extends('layouts.master')

@section('title', 'Danh sách phiếu xuất mộc')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Cây mộc #</th>
                <th>Loại vải #</th>
                <th>Tổng số cây mộc</th>
                <th>Tổng số mét</th>
                <th>Kho #</th>
                <th>NV xuất #</th>
                <th>Ngày giờ xuất kho</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/phieuxuatmoc/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/phieuxuatmoc/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        @foreach ($it->cay_vai_mocs as $cayvaimoc)
                            <a href="/cayvaimoc/{{ $cayvaimoc->id }}">{{ $cayvaimoc->id }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href='/loaivai/{{ $it->loai_vai_id }}'>{{ $it->loai_vai_id }}
                            @if ($it->loai_vai)
                                - {{ $it->loai_vai->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->tong_so_cay_moc }}</td>
                    <td>{{ $it->tong_so_met }}</td>
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

    <p><a style='width:350px' href='/phieuxuatmoc/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
