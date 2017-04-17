@extends('layouts.master')

@section('title', 'Danh sách loại vải loại sợi')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>Loại vải #</th>
                <th>Loại sợi #</th>
                <th>Định mức</th>
                <th>Xóa</th>
            <tr>
        </thead>
        <tbody>
            @foreach($loaivais as $loaivai)
                @foreach($loaivai->loai_sois as $loaisoi)
                    <tr onclick='window.location.href="/loaivailoaisoi/create?loai_vai_id={{ $loaivai->id }}&loai_soi_id={{ $loaisoi->id }}&dinh_muc={{ $loaisoi->pivot->dinh_muc }}"' style='cursor:pointer'>
                        <td><a href='/loaivai/{{ $loaivai->id }}'>{{ $loaivai->id }}</a></td>
                        <td><a href='/loaisoi/{{ $loaisoi->id }}'>{{ $loaisoi->id }}</a></td>
                        <td>{{ $loaisoi->pivot->dinh_muc }}</td>
                        <td>
                            <form action='/loaivailoaisoi/{{ $loaivai->id }}' method='post'>
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="loai_soi_id" value="{{ $loaisoi->id }}">
                                <p><input style='width:50px !important;' type='submit' class='btn-danger' value='Xóa' /></p>
                            </form>
                        </td>
                    <tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <p><a style='width:350px' href='/loaivailoaisoi/create' class='btn btn-warning'>Tạo mới</a></p>
@endsection
