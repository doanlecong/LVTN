@extends('layouts.master')

@section('title', 'Tạo loại sợi mới')

@section('content')
    <form action='/loaisoi' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Tên: *</label>
            <input required name='ten' />
        </p>

        <p>
            <label>Thông tin kỹ thuật:</label>
            <textarea name='thong_tin_ky_thuat'></textarea>
        </p>

        <p>
            <label>Khối lượng tồn: *</label>
            <input required type='number' name='khoi_luong_ton' value='0' />
        </p>

        <p>
            <label>Số thùng tồn: *</label>
            <input required type='number' name='so_thung_ton' value='0' />
        </p>

        <p>
            <label>Chứa tại kho: *</label>
            <select required name="kho_id">
                <option value='' selected></option>
                @foreach ($khos as $kho)
                    <option value='{{ $kho->id }}'>{{ $kho->id }} - {{ $kho->ten }}</option>
                @endforeach
            </select>
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/loaisoi' class='btn btn-warning'>Hủy</a></p>
@endsection
