@extends('layouts.master')

@section('title', 'Thông tin nhà cung cấp')

@section('content')
    <form action='/nhacungcap/{{ $nhacungcap->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $nhacungcap->id }}' />
        </p>

        <p>
            <label>Tên:</label>
            <input style='cursor:not-allowed' disabled required name='ten' value='{{ $nhacungcap->ten }}' />
        </p>

        <p>
            <label>Địa chỉ:</label>
            <input style='cursor:not-allowed' disabled required name='dia_chi' value='{{ $nhacungcap->dia_chi }}' />
        </p>

        <p>
            <label>Email:</label>
            <input style='cursor:not-allowed' disabled required type='email' name='email' value='{{ $nhacungcap->email }}' />
        </p>

        <p>
            <label>Số điện thoại:</label>
            <input style='cursor:not-allowed' disabled required name='so_dien_thoai' value='{{ $nhacungcap->so_dien_thoai }}' />
        </p>

        <p>
            <label>Fax:</label>
            <input style='cursor:not-allowed' disabled name='fax' value='{{ $nhacungcap->fax }}' />
        </p>

        <p>
            <label>Công nợ:</label>
            <input style='cursor:not-allowed' disabled required name='cong_no' value='{{ $nhacungcap->cong_no }}' />
        </p>

        <p><a href='/nhacungcap/{{ $nhacungcap->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($nhacungcap->trashed())
        <p><a href='/nhacungcap/{{ $nhacungcap->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/nhacungcap/{{ $nhacungcap->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
