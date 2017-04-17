@extends('layouts.master')

@section('title', 'Danh sách cây vải thành phẩm')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Cây vải mộc #</th>
                <th>Kích cỡ</th>
                <th>Số mét</th>
                <th>Đơn giá</th>
                <th>Kho #</th>
                <th>Ngày giờ nhập kho</th>
                <th>Hóa đơn xuất #</th>
            <tr>
        </thead>
        <tbody>
            @foreach($list as $it)
                <tr onclick='window.location.href="/cayvaithanhpham/{{ $it->id }}"' style='cursor:pointer'>
                    <td><a href='/cayvaithanhpham/{{ $it->id }}'>{{ $it->id }}</a></td>
                    <td>
                        <a href='/loaimoc/{{ $it->cay_vai_moc_id }}'>{{ $it->cay_vai_moc_id }}
                            @if ($it->cay_vai_moc)
                                - {{ $it->cay_vai_moc->loai_vai->ten }}
                                - {{ $it->cay_vai_moc->lo_nhuom->mau->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->kich_co }}</td>
                    <td>{{ $it->so_met }}</td>
                    <td>{{ $it->don_gia }}</td>
                    <td>
                        <a href='/kho/{{ $it->kho_id }}'>{{ $it->kho_id }}
                            @if ($it->kho)
                                - {{ $it->kho->ten }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $it->ngay_gio_nhap_kho }}</td>
                    <td>
                        <a href='/hoadonxuat/{{ $it->hoa_don_xuat_id }}'>{{ $it->hoa_don_xuat_id }}</a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/cayvaithanhpham/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
