@extends('layouts.master')

@section('title', 'Danh sách cây vải mộc')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Loại vải #</th>
                <th>Số mét</th>
                <th>NV dệt #</th>
                <th>Mã máy dệt</th>
                <th>Ngày giờ dệt</th>
                <th>Kho #</th>
                <th>Ngày giờ nhập kho</th>
                <th>Phiếu xuất mộc #</th>
                <th>Lô nhuộm #</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/cayvaimoc/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/cayvaimoc/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        <a href='/loaivai/{{ $it->loai_vai_id }}'>{{ $it->loai_vai_id }}
                            @if ($it->loai_vai)
                                - {{ $it->loai_vai->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->so_met }}</td>
                    <td>
                        <a href='/nhanvien/{{ $it->nhan_vien_det_id }}'>{{ $it->nhan_vien_det_id }}
                            @if ($it->nhan_vien_det)
                                - {{ $it->nhan_vien_det->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ma_may_det }}</td>
                    <td>{{ $it->ngay_gio_det }}</td>
                    <td>
                        <a href='/kho/{{ $it->kho_id }}'>{{ $it->kho_id }}
                            @if ($it->kho)
                                - {{ $it->kho->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ngay_gio_nhap_kho }}</td>
                    <td>
                        <a href='/phieuxuatmoc/{{ $it->phieu_xuat_moc_id }}'>{{ $it->phieu_xuat_moc_id }}
                            @if ($it->phieu_xuat_moc)
                                - {{ $it->phieu_xuat_moc->loai_vai->ten }}
                            @endif
                        </a>
                    </td>
                    <td>
                        <a href='/lonhuom/{{ $it->lo_nhuom_id }}'>{{ $it->lo_nhuom_id }}
                            @if ($it->lo_nhuom)
                                - v{{ $it->lo_nhuom->loai_vai_id }} - {{ $it->lo_nhuom->mau->ten }}
                            @endif
                        </a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/cayvaimoc/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
