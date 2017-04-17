@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin kho')

@section('content')
    <form action='/kho/{{ $kho->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $kho->id }}' />
        </p>

        <p>
            <label>Tên: *</label>
            <input required name='ten' value='{{ $kho->ten }}' />
        </p>

        <p>
            <label>Diện tích: *</label>
            <input required type='number' step='0.01' name='dien_tich'  value='{{ $kho->dien_tich }}' />
        </p>

        <p>
            <label>Địa chỉ: *</label>
            <input required name='dia_chi' value='{{ $kho->dia_chi }}' />
        </p>

        <p>
            <label>Số điện thoại:</label>
            <input name='so_dien_thoai' value='{{ $kho->so_dien_thoai }}' />
        </p>

        <p>
            <label>Nhân viên quản lý:</label>
            <select name='nhan_vien_quan_ly_id'>
                    <option value=''></option>
                @foreach ($nhanviens as $nhanvien)
                @if ($nhanvien == $kho->nhan_vien_quan_ly)
                    <option value='{{ $nhanvien->id }}' selected>
                @else
                    <option value='{{ $nhanvien->id }}'>
                @endif
                        {{ $nhanvien->id }} - {{ $nhanvien->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/kho/{{ $kho->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
