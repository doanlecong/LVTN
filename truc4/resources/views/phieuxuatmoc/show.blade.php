@extends('layouts.master')

@section('title', 'Thông tin phiếu xuất mộc')

@section('content')
    <form action='/phieuxuatmoc/{{ $phieuxuatmoc->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $phieuxuatmoc->id }}' />
        </p>

        <p>
            <label>Loại vải:</label>
            <a href='/loaivai/{{ $phieuxuatmoc->loai_vai_id }}'>{{ $phieuxuatmoc->loai_vai_id }}
                @if ($phieuxuatmoc->loai_vai)
                    - {{ $phieuxuatmoc->loai_vai->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Tổng số cây mộc:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='tong_so_cay_moc' value='{{ $phieuxuatmoc->tong_so_cay_moc }}' />
        </p>

        <p>
            <label>Tổng số mét:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='tong_so_met' value='{{ $phieuxuatmoc->tong_so_met }}' />
        </p>

        <p>
            <label>Kho:</label>
            <a href='/kho/{{ $phieuxuatmoc->kho_id }}'>{{ $phieuxuatmoc->kho_id }}
                @if ($phieuxuatmoc->kho)
                    - {{ $phieuxuatmoc->kho->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Nhân viên xuất:</label>
            <a href='/nhanvien/{{ $phieuxuatmoc->nhan_vien_xuat_id }}'>{{ $phieuxuatmoc->nhan_vien_xuat_id }}
                @if ($phieuxuatmoc->nhan_vien_xuat)
                    - {{ $phieuxuatmoc->nhan_vien_xuat->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Ngày giờ xuất kho:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_xuat_kho' value='{{ str_replace(" ","T",$phieuxuatmoc->ngay_gio_xuat_kho) }}' />
        </p>

        <p><a href='/phieuxuatmoc/{{ $phieuxuatmoc->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($phieuxuatmoc->trashed())
        <p><a href='/phieuxuatmoc/{{ $phieuxuatmoc->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/phieuxuatmoc/{{ $phieuxuatmoc->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
