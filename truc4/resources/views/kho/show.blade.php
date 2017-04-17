@extends('layouts.master')

@section('title', 'Thông tin kho')

@section('content')
    <form action='/kho/{{ $kho->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $kho->id }}' />
        </p>

        <p>
            <label>Tên:</label>
            <input style='cursor:not-allowed' disabled required name='ten' value='{{ $kho->ten }}' />
        </p>

        <p>
            <label>Diện tích:</label>
            <input style='cursor:not-allowed' disabled required type='number' step='0.01' name='dien_tich'  value='{{ $kho->dien_tich }}' />
        </p>

        <p>
            <label>Địa chỉ:</label>
            <input style='cursor:not-allowed' disabled required name='dia_chi' value='{{ $kho->dia_chi }}' />
        </p>

        <p>
            <label>Số điện thoại:</label>
            <input style='cursor:not-allowed' disabled name='so_dien_thoai' value='{{ $kho->so_dien_thoai }}' />
        </p>

        <p>
            <label>Nhân viên quản lý:</label>
            <a href='/nhanvien/{{ $kho->nhan_vien_quan_ly_id }}'>{{ $kho->nhan_vien_quan_ly_id }}
                @if ($kho->nhan_vien_quan_ly)
                    - {{ $kho->nhan_vien_quan_ly->ten }}
                @endif
            </a>
        </p>

        <p><a href='/kho/{{ $kho->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($kho->trashed())
        <p><a href='/kho/{{ $kho->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/kho/{{ $kho->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
