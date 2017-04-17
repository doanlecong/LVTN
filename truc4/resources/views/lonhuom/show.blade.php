@extends('layouts.master')

@section('title', 'Thông tin lô nhuộm')

@section('content')
    <form action='/lonhuom/{{ $lonhuom->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $lonhuom->id }}' />
        </p>

        <p>
            <label>Loại vải:</label>
            <a href='/loaivai/{{ $lonhuom->loai_vai_id }}'>{{ $lonhuom->loai_vai_id }}
                @if ($lonhuom->loai_vai)
                    - {{ $lonhuom->loai_vai->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Màu:</label>
            <a href='/mau/{{ $lonhuom->mau_id }}'>{{ $lonhuom->mau_id }}
                @if ($lonhuom->mau)
                    - {{ $lonhuom->mau->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Nhân viên nhuộm:</label>
            <a href='/nhanvien/{{ $lonhuom->nhan_vien_nhuom_id }}'>{{ $lonhuom->nhan_vien_nhuom_id }}
                @if ($lonhuom->nhan_vien_nhuom)
                    - {{ $lonhuom->nhan_vien_nhuom->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Ngày giờ nhuộm:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_nhuom' value='{{ str_replace(" ","T",$lonhuom->ngay_gio_nhuom) }}' />
        </p>

        <p><a href='/lonhuom/{{ $lonhuom->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($lonhuom->trashed())
        <p><a href='/lonhuom/{{ $lonhuom->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/lonhuom/{{ $lonhuom->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
