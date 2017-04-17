@extends('layouts.master')

@section('title', 'Tạo phiếu xuất sợi mới')

@section('content')
    <form action='/phieuxuatsoi' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Loại sợi: *</label>
            <select required name="loai_soi_id">
                <option value='' selected></option>
                @foreach ($loaisois as $loaisoi)
                    <option value='{{ $loaisoi->id }}'>{{ $loaisoi->id }} - {{ $loaisoi->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Số thùng: *</label>
            <input required type='number' id='so_thung' name='so_thung' />
        </p>

        <p>
            <label>Khối lượng thùng: *</label>
            <input required type='number' id='khoi_luong_thung' name='khoi_luong_thung' />
        </p>

        <p>
            <label>Tổng khối lượng xuất: *</label>
            <input style='cursor:not-allowed' required readonly type='number' id='tong_khoi_luong_xuat' name='tong_khoi_luong_xuat' />
        </p>

<script>
    $('#so_thung').change(function() { $('#tong_khoi_luong_xuat').val($('#so_thung').val() * $('#khoi_luong_thung').val()); });
    $('#khoi_luong_thung').change(function() { $('#tong_khoi_luong_xuat').val($('#so_thung').val() * $('#khoi_luong_thung').val()); });
</script>

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

    <p><a style='width:350px' href='/phieuxuatsoi' class='btn btn-warning'>Hủy</a></p>
@endsection
