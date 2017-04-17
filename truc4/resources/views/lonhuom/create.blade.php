@extends('layouts.master')

@section('title', 'Tạo lô nhuộm mới')

@section('content')
    <form action='/lonhuom' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Loại vải:</label>
            <select name="loai_vai_id">
                <option value='' selected></option>
                @foreach ($loaivais as $loaivai)
                    <option value='{{ $loaivai->id }}'>{{ $loaivai->id }} - {{ $loaivai->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Màu: *</label>
            <select required name="mau_id">
                <option value='' selected></option>
                @foreach ($maus as $mau)
                    <option value='{{ $mau->id }}'>{{ $mau->id }} - {{ $mau->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Nhân viên nhuộm:</label>
            <select name="nhan_vien_nhuom_id">
                <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                    <option value='{{ $nhanvien->id }}'>{{ $nhanvien->id }} - {{ $nhanvien->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Ngày giờ nhuộm: *</label>
            <input class='init' required type='datetime-local' step="1" name='ngay_gio_nhuom' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/lonhuom' class='btn btn-warning'>Hủy</a></p>
@endsection
