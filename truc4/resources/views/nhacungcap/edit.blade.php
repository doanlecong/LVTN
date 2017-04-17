@extends('layouts.master')

@section('title', 'Cập nhật thông tin nhà cung cấp')

@section('content')
    <form action='/nhacungcap/{{ $nhacungcap->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $nhacungcap->id }}' />
        </p>

        <p>
            <label>Tên: *</label>
            <input required name='ten' value='{{ $nhacungcap->ten }}' />
        </p>

        <p>
            <label>Địa chỉ: *</label>
            <input required name='dia_chi' value='{{ $nhacungcap->dia_chi }}' />
        </p>

        <p>
            <label>Email: *</label>
            <input required type='email' name='email' value='{{ $nhacungcap->email }}' />
        </p>

        <p>
            <label>Số điện thoại: *</label>
            <input required name='so_dien_thoai' value='{{ $nhacungcap->so_dien_thoai }}' />
        </p>

        <p>
            <label>Fax:</label>
            <input name='fax' value='{{ $nhacungcap->fax }}' />
        </p>

        <p>
            <label>Công nợ: *</label>
            <input required name='cong_no' value='{{ $nhacungcap->cong_no }}' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Lưu' /></p>
    </form>

    <p><a style='width:350px' href='/nhacungcap/{{ $nhacungcap->id }}' class='btn btn-warning'>Hủy</a></p>
@endsection
