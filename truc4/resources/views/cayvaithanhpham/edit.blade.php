@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin cây vải thành phẩm')

@section('content')
    <form action='/cayvaithanhpham/{{ $cayvaithanhpham->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $cayvaithanhpham->id }}' />
        </p>

        <p>
            <label>Cây vải mộc: *</label>
            <select required name="cay_vai_moc_id">
                    <option value=''></option>
                @foreach ($cayvaimocs as $cayvaimoc)
                @if ($cayvaimoc == $cayvaithanhpham->cay_vai_moc)
                    <option value='{{ $cayvaimoc->id }}' selected>
                @else
                    <option value='{{ $cayvaimoc->id }}'>
                @endif
                        {{ $cayvaimoc->id }}
                        - xm{{ $cayvaimoc->phieu_xuat_moc_id }}
                        - ln{{ $cayvaimoc->lo_nhuom_id }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Kích cỡ:</label>
            <input type='number' step='0.01' name='kich_co' value='{{ $cayvaithanhpham->kich_co }}' />
        </p>

        <p>
            <label>Số mét: *</label>
            <input required type='number' name='so_met' value='{{ $cayvaithanhpham->so_met }}' />
        </p>

        <p>
            <label>Đơn giá: *</label>
            <input required type='number' name='don_gia' value='{{ $cayvaithanhpham->don_gia }}' />
        </p>

        <p>
            <label>Kho: *</label>
            <select required name="kho_id">
                    <option value=''></option>
                @foreach ($khos as $kho)
                @if ($kho == $cayvaithanhpham->kho)
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
            <label>Ngày giờ nhập kho: *</label>
            <input required type='datetime-local' step="1" name='ngay_gio_nhap_kho' value='{{ str_replace(" ","T",$cayvaithanhpham->ngay_gio_nhap_kho) }}' />
        </p>

        <p>
            <label>Hóa đơn xuất:</label>
            <select name="hoa_don_xuat_id">
                    <option value=''></option>
                @foreach ($hoadonxuats as $hoadonxuat)
                @if ($hoadonxuat == $cayvaithanhpham->hoa_don_xuat)
                    <option value='{{ $hoadonxuat->id }}' selected>
                @else
                    <option value='{{ $hoadonxuat->id }}'>
                @endif
                        {{ $hoadonxuat->id }}
                    </option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/cayvaithanhpham/{{ $cayvaithanhpham->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
