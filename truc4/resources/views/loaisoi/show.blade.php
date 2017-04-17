@extends('layouts.master')

@section('title', 'Thông tin loại sợi')

@section('content')
    <form action='/loaisoi/{{ $loaisoi->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $loaisoi->id }}' />
        </p>

        <p>
            <label>Tên:</label>
            <input style='cursor:not-allowed' disabled required name='ten' value='{{ $loaisoi->ten }}' />
        </p>

        <p>
            <label>Thông tin kỹ thuật:</label>
            <textarea style='cursor:not-allowed' disabled name='thong_tin_ky_thuat'>{{ $loaisoi->thong_tin_ky_thuat }}</textarea>
        </p>

        <p>
            <label>Khối lượng tồn:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='khoi_luong_ton' value='{{ $loaisoi->khoi_luong_ton }}' />
        </p>

        <p>
            <label>Số thùng tồn:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='so_thung_ton' value='{{ $loaisoi->so_thung_ton }}' />
        </p>

        <p>
            <label>Chứa tại kho:</label>
            <a href='/kho/{{ $loaisoi->kho_id }}'>{{ $loaisoi->kho_id }}
                @if ($loaisoi->kho)
                    - {{ $loaisoi->kho->ten }}
                @endif
            </a>
        </p>

        <p><a href='/loaisoi/{{ $loaisoi->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($loaisoi->trashed())
        <p><a href='/loaisoi/{{ $loaisoi->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/loaisoi/{{ $loaisoi->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
