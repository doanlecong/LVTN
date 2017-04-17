@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin phiếu xuất mộc')

@section('content')
    <form action='/phieuxuatmoc/{{ $phieuxuatmoc->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $phieuxuatmoc->id }}' />
        </p>

        <p>
            <label>Loại vải: *</label>
            <select required name="loai_vai_id">
                    <option value=''></option>
                @foreach ($loaivais as $loaivai)
                @if ($loaivai == $phieuxuatmoc->loai_vai)
                    <option value='{{ $loaivai->id }}' selected>
                @else
                    <option value='{{ $loaivai->id }}'>
                @endif
                        {{ $loaivai->id }} - {{ $loaivai->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Tổng số cây mộc: *</label>
            <input required type='number' name='tong_so_cay_moc' value='{{ $phieuxuatmoc->tong_so_cay_moc }}' />
        </p>

        <p>
            <label>Tổng số mét: *</label>
            <input required type='number' name='tong_so_met' value='{{ $phieuxuatmoc->tong_so_met }}' />
        </p>

        <p>
            <label>Kho: *</label>
            <select required name="kho_id">
                    <option value=''></option>
                @foreach ($khos as $kho)
                @if ($kho == $phieuxuatmoc->kho)
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
                @if ($nhanvien == $phieuxuatmoc->nhan_vien_xuat)
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
            <input required type='datetime-local' step="1" name='ngay_gio_xuat_kho' value='{{ str_replace(" ","T",$phieuxuatmoc->ngay_gio_xuat_kho) }}' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/phieuxuatmoc/{{ $phieuxuatmoc->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
