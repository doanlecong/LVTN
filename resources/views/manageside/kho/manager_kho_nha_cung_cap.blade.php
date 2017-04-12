@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('left_nav')
   @include('manageside.leftside_nav')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Quản Lý Tổng <small>Chào!!</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Bảng Nhà Cung Cấp </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Mã Nhà Cung Cấp</th>
                            <th>Tên Nhà Cung Cấp</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Fax</th>
                            <th>Công Nợ</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_nha_cung_cap as $nha_cung_cap)  
                            <tr>
                                
                                <td>{{$nha_cung_cap->id}}</td>
                                <td>{{$nha_cung_cap->ten}}</td>
                                <td>{{$nha_cung_cap->dia_chi}}</td>
                                <td>{{$nha_cung_cap->email}}</td>
                                <td>{{$nha_cung_cap->so_dien_thoai}}</td>
                                <td>{{$nha_cung_cap->fax}}</td>
                                <td>{{$nha_cung_cap->cong_no}}</td>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="xoa">
                                        </label>
                                    </div>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection