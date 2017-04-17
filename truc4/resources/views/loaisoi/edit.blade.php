@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin loại sợi')

@section('content')
    <form action='/loaisoi/{{ $loaisoi->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $loaisoi->id }}' />
        </p>

        <p>
            <label>Tên: *</label>
            <input required name='ten' value='{{ $loaisoi->ten }}' />
        </p>

        <p>
            <label>Thông tin kỹ thuật:</label>
            <textarea name='thong_tin_ky_thuat'>{{ $loaisoi->thong_tin_ky_thuat }}</textarea>
        </p>

        <p>
            <label>Khối lượng tồn: *</label>
            <input required type='number' name='khoi_luong_ton' value='{{ $loaisoi->khoi_luong_ton }}' />
        </p>

        <p>
            <label>Số thùng tồn: *</label>
            <input required type='number' name='so_thung_ton' value='{{ $loaisoi->so_thung_ton }}' />
        </p>

        <p>
            <label>Chứa tại kho: *</label>
            <select required name="kho_id">
                    <option value=''></option>
                @foreach ($khos as $kho)
                @if ($kho->id == $loaisoi->kho_id)
                    <option value='{{ $kho->id }}' selected>
                @else
                    <option value='{{ $kho->id }}'>
                @endif
                        {{ $kho->id }} - {{ $kho->ten }}
                    </option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/loaisoi/{{ $loaisoi->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
