@extends('layouts.master')

@section('title', 'Tạo nhà cung cấp mới')

@section('content')
    <form action='/nhacungcap' method='post'>
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Tên: *</label>
            <input required name='ten' />
        </p>

        <p>
            <label>Địa chỉ: *</label>
            <input required name='dia_chi' value='N/A' />
        </p>

        <p>
            <label>Email: *</label>
            <input required type='email' name='email' value='@gmail.com' />
        </p>

        <p>
            <label>Số điện thoại: *</label>
            <input required name='so_dien_thoai' />
        </p>

        <p>
            <label>Fax:</label>
            <input name='fax' />
        </p>

        <p>
            <label>Công nợ: *</label>
            <input required name='cong_no' value='0' />
        </p>

        <p><input style='width:350px' type='submit' class='btn btn-primary' value='Tạo' /></p>
    </form>

    <p><a style='width:350px' href='/nhacungcap' class='btn btn-warning'>Hủy</a></p>
@endsection
