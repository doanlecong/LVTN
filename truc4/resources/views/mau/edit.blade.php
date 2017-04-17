@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin màu')

@section('content')
    <form action='/mau/{{ $mau->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $mau->id }}' />
        </p>

        <p>
            <label>Tên: *</label>
            <input required name='ten' value='{{ $mau->ten }}' />
        </p>

        <p>
            <label>Công thức:</label>
            <textarea name='cong_thuc'>{{ $mau->cong_thuc }}</textarea>
        </p>

        <p>
            <label>Nhân viên pha chế:</label>
            <select name='nhan_vien_pha_che_id'>
                    <option value=''></option>
                @foreach ($nhanviens as $nhanvien)
                @if ($nhanvien->id == $mau->nhan_vien_pha_che_id)
                    <option value='{{ $nhanvien->id }}' selected>
                @else
                    <option value='{{ $nhanvien->id }}'>
                @endif
                        {{ $nhanvien->id }} - {{ $nhanvien->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/mau/{{ $mau->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
