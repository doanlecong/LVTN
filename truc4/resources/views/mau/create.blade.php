@extends('layouts.master')

@section('title', 'Tạo màu mới')

@section('content')
    <form action='/mau' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Tên: *</label>
            <input required name='ten' />
        </p>

        <p>
            <label>Công thức:</label>
            <textarea name='cong_thuc'></textarea>
        </p>

        <p>
            <label>Nhân viên pha chế:</label>
            <select name="nhan_vien_pha_che_id">
                <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                    <option value='{{ $nhanvien->id }}'>{{ $nhanvien->id }} - {{ $nhanvien->ten }}</option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/mau' class='btn btn-warning'>Hủy</a></p>
@endsection
