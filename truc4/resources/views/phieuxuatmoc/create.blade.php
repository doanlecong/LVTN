@extends('layouts.master')

@section('title', 'Tạo phiếu xuất mộc mới')

@section('content')
    <form action='/phieuxuatmoc' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Loại vải: *</label>
            <select required name="loai_vai_id">
                <option value='' selected></option>
                @foreach ($loaivais as $loaivai)
                    <option value='{{ $loaivai->id }}'>{{ $loaivai->id }} - {{ $loaivai->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Tổng số cây mộc: *</label>
            <input required type='number' name='tong_so_cay_moc' />
        </p>

        <p>
            <label>Tổng số mét: *</label>
            <input required type='number' name='tong_so_met' />
        </p>

        <p>
            <label>Kho: *</label>
            <select required name="kho_id">
                <option value='' selected></option>
                @foreach ($khos as $kho)
                    <option value='{{ $kho->id }}'>{{ $kho->id }} - {{ $kho->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Nhân viên xuất: *</label>
            <select required name="nhan_vien_xuat_id">
                <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                    <option value='{{ $nhanvien->id }}'>{{ $nhanvien->id }} - {{ $nhanvien->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Ngày giờ xuất kho: *</label>
            <input class='init' required type='datetime-local' step="1" name='ngay_gio_xuat_kho' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/phieuxuatmoc' class='btn btn-warning'>Hủy</a></p>
@endsection
