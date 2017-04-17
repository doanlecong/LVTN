@extends('layouts.master')

@section('title', 'Thông tin màu')

@section('content')
    <form action='/mau/{{ $mau->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $mau->id }}' />
        </p>

        <p>
            <label>Tên:</label>
            <input style='cursor:not-allowed' disabled required name='ten' value='{{ $mau->ten }}' />
        </p>

        <p>
            <label>Công thức:</label>
            <textarea style='cursor:not-allowed' disabled name='cong_thuc'>{{ $mau->cong_thuc }}</textarea>
        </p>

        <p>
            <label>Nhân viên pha chế:</label>
            <a href='/nhanvien/{{ $mau->nhan_vien_pha_che_id }}'>{{ $mau->nhan_vien_pha_che_id }}
                @if ($mau->nhan_vien_pha_che)
                    - {{ $mau->nhan_vien_pha_che->ten }}
                @endif
            </a>
        </p>

        <p><a href='/mau/{{ $mau->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($mau->trashed())
        <p><a href='/mau/{{ $mau->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/mau/{{ $mau->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
