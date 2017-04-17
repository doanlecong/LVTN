@extends('layouts.master')

@section('title', 'Tạo kho mới')

@section('content')
    <form action='/kho' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Tên: *</label>
            <input required name='ten' />
        </p>

        <p>
            <label>Diện tích: *</label>
            <input required type='number' step='0.01' name='dien_tich' />
        </p>

        <p>
            <label>Địa chỉ: *</label>
            <input required name='dia_chi' value='N/A' />
        </p>

        <p>
            <label>Số điện thoại:</label>
            <input name='so_dien_thoai' />
        </p>

        <p>
            <label>Nhân viên quản lý:</label>
            <select name="nhan_vien_quan_ly_id">
                <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                    <option value='{{ $nhanvien->id }}'>{{ $nhanvien->id }} - {{ $nhanvien->ten }}</option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/kho' class='btn btn-warning'>Hủy</a></p>
@endsection
