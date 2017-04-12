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
                            <th>Mã Phiếu Xuất Sợi</th>
                            <th>Loại Sợi</th>
                            <th>Số Thùng</th>
                            <th>Khối Lượng Thùng(kg/thùng)</th>
                            <th>Tổng Khổi Lượng(kg)</th>
                            <th>Kho</th>
                            <th>Nhân Viên Xuất</th>
                            <th>Ngày Giờ Xuất Kho</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_phieu_xuat_soi as $phieu_xuat_soi)  
                            <tr>
                                
                                <td>{{$phieu_xuat_soi->id}}</td>
                                <td>{{$phieu_xuat_soi->loai_soi->ten}}</td>
                                <td>{{$phieu_xuat_soi->so_thung}}</td>
                                <td>{{$phieu_xuat_soi->khoi_luong_thung}}</td>
                                <td>{{$phieu_xuat_soi->tong_khoi_luong_xuat}}</td>
                                <td>{{$phieu_xuat_soi->kho->ten}}</td>
                                <td>{{$phieu_xuat_soi->nhan_vien_xuat->ten}}</td>
                                <td>{{$phieu_xuat_soi->ngay_gio_xuat_kho}}</td>
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