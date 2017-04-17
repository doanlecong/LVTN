@extends('layouts.master')

@section('title', 'Tạo cây vải mộc')

@section('content')
    <form action='/cayvaimoc' method='post'>
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
            <label>Số mét: *</label>
            <input required type='number' name='so_met' />
        </p>

        <p>
            <label>Nhân viên dệt: *</label>
            <select required name="nhan_vien_det_id">
                <option value='' selected></option>
                @foreach ($nhanviens as $nhanvien)
                    <option value='{{ $nhanvien->id }}'>{{ $nhanvien->id }} - {{ $nhanvien->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Mã máy dệt: *</label>
            <input required name='ma_may_det' />
        </p>

        <p>
            <label>Ngày giờ dệt: *</label>
            <input class='init' required type='datetime-local' step="1" name='ngay_gio_det' />
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
            <label>Ngày giờ nhập kho: *</label>
            <input class='init' required type='datetime-local' step="1" name='ngay_gio_nhap_kho' />
        </p>

        <p>
            <label>Phiếu xuất mộc:</label>
            <select name="phieu_xuat_moc_id">
                <option value='' selected></option>
                @foreach ($phieuxuatmocs as $phieuxuatmoc)
                    <option value='{{ $phieuxuatmoc->id }}'>{{ $phieuxuatmoc->id }} - {{ $phieuxuatmoc->loai_vai->ten }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Lô nhuộm:</label>
            <select name="lo_nhuom_id">
                <option value='' selected></option>
                @foreach ($lonhuoms as $lonhuom)
                    <option value='{{ $lonhuom->id }}'>{{ $lonhuom->id }} - v{{ $lonhuom->loai_vai_id }} - {{ $lonhuom->mau->ten }}</option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/cayvaimoc' class='btn btn-warning'>Hủy</a></p>
@endsection
