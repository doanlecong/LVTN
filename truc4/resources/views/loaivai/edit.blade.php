@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin loại vải')

@section('content')
    <form action='/loaivai/{{ $loaivai->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $loaivai->id }}' />
        </p>

        <p>
            <label>Tên: *</label>
            <input required name='ten' value='{{ $loaivai->ten }}' />
        </p>

        <p>
            <label>Đơn giá: *</label>
            <input required type='number' name='don_gia' value='{{ $loaivai->don_gia }}' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/loaivai/{{ $loaivai->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
