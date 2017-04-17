@extends('layouts.master')

@section('title', 'Thông tin phiếu xuất sợi')

@section('content')
    <form action='/phieuxuatsoi/{{ $phieuxuatsoi->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $phieuxuatsoi->id }}' />
        </p>

        <p>
            <label>Loại sợi:</label>
            <a href='/loaisoi/{{ $phieuxuatsoi->loai_soi_id }}'>{{ $phieuxuatsoi->loai_soi_id }}
                @if ($phieuxuatsoi->loai_soi)
                    - {{ $phieuxuatsoi->loai_soi->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Số thùng:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='so_thung' value='{{ $phieuxuatsoi->so_thung }}' />
        </p>

        <p>
            <label>Khối lượng thùng:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='khoi_luong_thung' value='{{ $phieuxuatsoi->khoi_luong_thung }}' />
        </p>

        <p>
            <label>Tổng khối lượng xuất:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='tong_khoi_luong_xuat' value='{{ $phieuxuatsoi->tong_khoi_luong_xuat }}' />
        </p>

        <p>
            <label>Kho:</label>
            <a href='/kho/{{ $phieuxuatsoi->kho_id }}'>{{ $phieuxuatsoi->kho_id }}
                @if ($phieuxuatsoi->kho)
                    - {{ $phieuxuatsoi->kho->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Nhân viên xuất:</label>
            <a href='/nhanvien/{{ $phieuxuatsoi->nhan_vien_xuat_id }}'>{{ $phieuxuatsoi->nhan_vien_xuat_id }}
                @if ($phieuxuatsoi->nhan_vien_xuat)
                    - {{ $phieuxuatsoi->nhan_vien_xuat->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Ngày giờ xuất kho:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_xuat_kho' value='{{ str_replace(" ","T",$phieuxuatsoi->ngay_gio_xuat_kho) }}' />
        </p>

        <p><a href='/phieuxuatsoi/{{ $phieuxuatsoi->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($phieuxuatsoi->trashed())
        <p><a href='/phieuxuatsoi/{{ $phieuxuatsoi->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/phieuxuatsoi/{{ $phieuxuatsoi->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
