@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin cây vải mộc')

@section('content')
    <form action='/cayvaimoc/{{ $cayvaimoc->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $cayvaimoc->id }}' />
        </p>

        <p>
            <label>Loại vải: *</label>
            <select required name="loai_vai_id">
                    <option value=''></option>
                @foreach ($loaivais as $loaivai)
                @if ($loaivai == $cayvaimoc->loai_vai)
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
            <label>Số mét: *</label>
            <input required type='number' name='so_met' value='{{ $cayvaimoc->so_met }}' />
        </p>

        <p>
            <label>Nhân viên dệt: *</label>
            <select required name="nhan_vien_det_id">
                    <option value=''></option>
                @foreach ($nhanviens as $nhanvien)
                @if ($nhanvien == $cayvaimoc->nhan_vien_det)
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
            <label>Mã máy dệt: *</label>
            <input required name='ma_may_det' value='{{ $cayvaimoc->ma_may_det }}' />
        </p>

        <p>
            <label>Ngày giờ dệt: *</label>
            <input required type='datetime-local' step="1" name='ngay_gio_det' value='{{ str_replace(" ","T",$cayvaimoc->ngay_gio_det) }}' />
        </p>

        <p>
            <label>Kho: *</label>
            <select required name="kho_id">
                    <option value=''></option>
                @foreach ($khos as $kho)
                @if ($kho == $cayvaimoc->kho)
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
            <input required type='datetime-local' step="1" name='ngay_gio_nhap_kho' value='{{ str_replace(" ","T",$cayvaimoc->ngay_gio_nhap_kho) }}' />
        </p>

        <p>
            <label>Phiếu xuất mộc:</label>
            <select name="phieu_xuat_moc_id">
                    <option value=''></option>
                @foreach ($phieuxuatmocs as $phieuxuatmoc)
                @if ($phieuxuatmoc == $cayvaimoc->phieu_xuat_moc)
                    <option value='{{ $phieuxuatmoc->id }}' selected>
                @else
                    <option value='{{ $phieuxuatmoc->id }}'>
                @endif
                        {{ $phieuxuatmoc->id }} - {{ $phieuxuatmoc->loai_vai->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Lô nhuộm:</label>
            <select name="lo_nhuom_id">
                    <option value=''></option>
                @foreach ($lonhuoms as $lonhuom)
                @if ($lonhuom == $cayvaimoc->lo_nhuom)
                    <option value='{{ $lonhuom->id }}' selected>
                @else
                    <option value='{{ $lonhuom->id }}'>
                @endif
                        {{ $lonhuom->id }} - v{{ $lonhuom->loai_vai_id }} - {{ $lonhuom->mau->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/cayvaimoc/{{ $cayvaimoc->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
