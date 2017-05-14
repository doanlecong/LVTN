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
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Các Mẫu Màu  </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Lô Nhuộm</th>
                            <th>Loại Vải</th>
                            <th>Màu</th>
                            <th>Nhân Viên Nhuộm</th>
                            <th>Ngày Giờ Nhuộm</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_lo_nhuom as $lo_nhuom)
                           <tr>
                                <td>{{$lo_nhuom->id}}</td>
                                <td>{{$lo_nhuom->loai_vai->ten}}</td>
                                <td style="background-color:{{$lo_nhuom->mau->ma_mau}};">{{$lo_nhuom->mau->ten}}</td>
                                <td>{{$lo_nhuom->nhan_vien_nhuom->ten}}</td>
                                <td>{{$lo_nhuom->ngay_gio_nhuom}}</td>
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