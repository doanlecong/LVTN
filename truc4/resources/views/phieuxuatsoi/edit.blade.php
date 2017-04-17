@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin phiếu xuất sợi')

@section('content')
    <form action='/phieuxuatsoi/{{ $phieuxuatsoi->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $phieuxuatsoi->id }}' />
        </p>

        <p>
            <label>Loại sợi: *</label>
            <select required name="loai_soi_id">
                    <option value=''></option>
                @foreach ($loaisois as $loaisoi)
                @if ($loaisoi == $phieuxuatsoi->loai_soi)
                    <option value='{{ $loaisoi->id }}' selected>
                @else
                    <option value='{{ $loaisoi->id }}'>
                @endif
                        {{ $loaisoi->id }} - {{ $loaisoi->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Số thùng: *</label>
            <input required type='number' id='so_thung' name='so_thung' value='{{ $phieuxuatsoi->so_thung }}' />
        </p>

        <p>
            <label>Khối lượng thùng: *</label>
            <input required type='number' id='khoi_luong_thung' name='khoi_luong_thung' value='{{ $phieuxuatsoi->khoi_luong_thung }}' />
        </p>

        <p>
            <label>Tổng khối lượng xuất: *</label>
            <input style='cursor:not-allowed' required readonly type='number' id='tong_khoi_luong_xuat' name='tong_khoi_luong_xuat' value='{{ $phieuxuatsoi->tong_khoi_luong_xuat }}' />
        </p>

<script>
    $('#so_thung').change(function() { $('#tong_khoi_luong_xuat').val($('#so_thung').val() * $('#khoi_luong_thung').val()); });
    $('#khoi_luong_thung').change(function() { $('#tong_khoi_luong_xuat').val($('#so_thung').val() * $('#khoi_luong_thung').val()); });
</script>

        <p>
            <label>Kho: *</label>
            <select required name="kho_id">
                    <option value=''></option>
                @foreach ($khos as $kho)
                @if ($kho == $phieuxuatsoi->kho)
                    <option value='{{ $kho->id }}' selected>
                @else
                    <option value='{{ $kho->id }}'>
                @endif
                        {{ $kho->id }} - {{ $kho->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Nhân viên xuất: *</label>
            <select required name="nhan_vien_xuat_id">
                    <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                @if ($nhanvien == $phieuxuatsoi->nhan_vien_xuat)
                    <option value='{{ $nhanvien->id }}' selected>
                @else
                    <option value='{{ $nhanvien->id }}'>
                @endif
                        {{ $nhanvien->id }} - {{ $nhanvien->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Ngày giờ xuất kho: *</label>
            <input required type='datetime-local' step="1" name='ngay_gio_xuat_kho' value='{{ str_replace(" ","T",$phieuxuatsoi->ngay_gio_xuat_kho) }}' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/phieuxuatsoi/{{ $phieuxuatsoi->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
