@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin lô nhuộm')

@section('content')
    <form action='/lonhuom/{{ $lonhuom->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $lonhuom->id }}' />
        </p>

        <p>
            <label>Loại vải:</label>
            <select name="loai_vai_id">
                    <option value=''></option>
                @foreach ($loaivais as $loaivai)
                @if ($loaivai->id == $lonhuom->loai_vai_id)
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
            <label>Màu: *</label>
            <select required name='mau_id'>
                    <option value=''></option>
                @foreach ($maus as $mau)
                @if ($mau->id == $lonhuom->mau_id)
                    <option value='{{ $mau->id }}' selected>
                @else
                    <option value='{{ $mau->id }}'>
                @endif
                        {{ $mau->id }} - {{ $mau->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Nhân viên nhuộm:</label>
            <select name='nhan_vien_nhuom_id'>
                    <option value=''></option>
                @foreach ($nhanviens as $nhanvien)
                @if ($nhanvien->id == $lonhuom->nhan_vien_nhuom_id)
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
            <label>Ngày giờ nhuộm: *</label>
            <input required type='datetime-local' step="1" name='ngay_gio_nhuom' value='{{ str_replace(" ","T",$lonhuom->ngay_gio_nhuom) }}' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/lonhuom/{{ $lonhuom->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
