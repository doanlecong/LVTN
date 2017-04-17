@extends('layouts.master')

@section('title', 'Thông tin khách hàng')

@section('content')
    <form action='/khachhang/{{ $khachhang->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label style='width:150px'>id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='id' value='{{ $khachhang->id }}' />
        </p>

        <p>
            <label style='width:150px'>user_id:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='user_id' value='{{ $khachhang->user->id }}' />
        </p>

        <p>
            <label style='width:150px'>username:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='username' value='{{ $khachhang->user->username }}' />
        </p>
        
        <p>
            <label style='width:150px'>password:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='password' value='{{ $khachhang->user->password }}' />
        </p>
        
        <p>
            <label style='width:150px'>email:</label>
            <input style='width:200px; cursor:not-allowed' disabled type='email' name='email' value='{{ $khachhang->user->email }}' />
        </p>
        
        <p>
            <label style='width:150px'>Tên:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='ten' value='{{ $khachhang->ten }}' />
        </p>
        
        <p>
            <label style='width:150px'>Số điện thoại:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='so_dien_thoai' value='{{ $khachhang->so_dien_thoai }}' />
        </p>
        
        <p>
            <label style='width:150px'>Địa chỉ:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='dia_chi' value='{{ $khachhang->dia_chi }}' />
        </p>

        <p>
            <label style='width:150px'>Công nợ:</label>
            <input style='width:200px; cursor:not-allowed' disabled name='cong_no' value='{{ $khachhang->cong_no }}' />
        </p>
        
        <p><a style='width:350px' href='/khachhang/{{ $khachhang->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>

    @if ($khachhang->trashed())
        <p><a style='width:350px' href='/khachhang/{{ $khachhang->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/khachhang/{{ $khachhang->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input style='width:350px' type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
