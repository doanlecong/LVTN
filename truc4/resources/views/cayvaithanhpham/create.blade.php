@extends('layouts.master')

@section('title', 'Tạo cây vải thành phẩm')

@section('content')
    <form action='/cayvaithanhpham' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Cây vải mộc: *</label>
            <select required name="cay_vai_moc_id">
                <option value='' selected></option>
                @foreach ($cayvaimocs as $cayvaimoc)
                    <option value='{{ $cayvaimoc->id }}'>
                        {{ $cayvaimoc->id }}
                        - xm{{ $cayvaimoc->phieu_xuat_moc_id }}
                        - ln{{ $cayvaimoc->lo_nhuom_id }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Kích cỡ:</label>
            <input type='number' step='0.01' name='kich_co' />
        </p>

        <p>
            <label>Số mét: *</label>
            <input required type='number' name='so_met' />
        </p>

        <p>
            <label>Đơn giá: *</label>
            <input required type='number' name='don_gia' />
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
            <label>Hóa đơn xuất:</label>
            <select name="hoa_don_xuat_id">
                <option value='' selected></option>
                @foreach ($hoadonxuats as $hoadonxuat)
                    <option value='{{ $hoadonxuat->id }}'>{{ $hoadonxuat->id }}</option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/cayvaithanhpham' class='btn btn-warning'>Hủy</a></p>
@endsection
