@extends('layouts.master')

@section('title', 'Tạo loại vải mới')

@section('content')
    <form action='/loaivai' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Tên: *</label>
            <input required name='ten' />
        </p>

        <p>
            <label>Đơn giá: *</label>
            <input required type='number' name='don_gia' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/loaivai' class='btn btn-warning'>Hủy</a></p>
@endsection
