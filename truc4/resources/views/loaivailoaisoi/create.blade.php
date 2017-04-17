@extends('layouts.master')

@section('title', 'Tạo loại vải loại sợi')

@section('content')
    <form action='/loaivailoaisoi' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Loại vải: *</label>
            <select required name="loai_vai_id">
                <option value='' selected></option>
                @foreach ($loaivais as $loaivai)
                    @if (isset($_REQUEST["loai_vai_id"]) && $_REQUEST["loai_vai_id"] == $loaivai->id)
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
            <label>Loại sợi: *</label>
            <select required name="loai_soi_id">
                <option value='' selected></option>
                @foreach ($loaisois as $loaisoi)
                    @if (isset($_REQUEST["loai_soi_id"]) && $_REQUEST["loai_soi_id"] == $loaisoi->id)
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
            <label>Định mức:</label>
            @if (isset($_REQUEST["dinh_muc"]))
                <input type='number' step='0.01' name='dinh_muc' value='{{ $_REQUEST["dinh_muc"] }}' />
            @else
                <input type='number' step='0.01' name='dinh_muc' />
            @endif
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/loaivailoaisoi' class='btn btn-warning'>Hủy</a></p>
@endsection
