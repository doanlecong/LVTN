@extends('layouts.master')

@section('title', 'Thông tin loại vải')

@section('content')
    <form action='/loaivai/{{ $loaivai->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $loaivai->id }}' />
        </p>

        <p>
            <label>Tên:</label>
            <input style='cursor:not-allowed' disabled required name='ten' value='{{ $loaivai->ten }}' />
        </p>

        <p>
            <label>Đơn giá:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='don_gia' value='{{ $loaivai->don_gia }}' />
        </p>

        <p>
            <label>Dệt từ sợi:</label>
            <span style='display:inline-block; width:300px'>
                @foreach ($loaivai->loai_sois as $loaisoi)
                    @if ($loaisoi->pivot->dinh_muc)
                        ( {{ $loaisoi->pivot->dinh_muc }} )
                    @endif
                    <a href='/loaisoi/{{ $loaisoi->id }}'>{{ $loaisoi->id }} - {{ $loaisoi->ten }}</a>
                    <br />
                @endforeach
            </span>
        </p>

        <p><a href='/loaivai/{{ $loaivai->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($loaivai->trashed())
        <p><a href='/loaivai/{{ $loaivai->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/loaivai/{{ $loaivai->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
