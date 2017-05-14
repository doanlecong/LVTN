@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('left_nav')
     <li>
        <!--<a href="{{url('/')}}"><i class="fa fa-fw fa-dashboard"></i> Quản Lý Kho</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Kho <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo" class="collapse">
            <li>
                <a href="{{url('/')}}"> Loại Sợi</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Nhà Cung Cấp</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Đơn Hàng Công Ty</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Hóa Đơn Nhập</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Phiếu Xuất Sợi</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Kho Mộc</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Phiếu Xuất Mộc</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Xuất Mộc</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Cập Nhật Xuất Mộc</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Kho Thành Phẩm</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Xuất Vải Thành Phẩm</a>
            </li>
            <li>
                <a href="{{url('/')}}"> Cập Nhật Xuất Vải Thành Phẩm</a>
            </li>
        </ul>
    </li>
    <li> 
        <!--<a href="{{url('/manage_san_xuat')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Quản Lý Sản Xuất</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Sản Xuất <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo1" class="collapse">
            <li>
                <a href="{{url('/manage_san_xuat')}}">Màu</a>
            </li>
            <li>
                <a href="{{url('/manage_san_xuat')}}">Lô Nhuộm</a>
            </li>
        </ul>
    </li>
    <li class="active">
        <!--<a href="{{url('/manage_ban_hang')}}"><i class="fa fa-fw fa-table"></i> Quản Lý Bán Hàng</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Bán Hàng <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo2" class="collapse">
            <li>
                <a href="{{url('/manage_ban_hang')}}">Khách Hàng</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang')}}">Đơn Hàng</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang')}}">Hóa Đơn Xuất</a>
            </li>
        </ul>
    </li>
    <li>
        <!--<a href="{{url('/manage_thong_ke')}}"><i class="fa fa-fw fa-edit"></i>Thống Kê</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
            <i class="fa fa-fw fa-dashboard"></i> Thống Kê <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo3" class="collapse">
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê sợi theo số lượng tiêu thụ của loại sợi trong năm</a>
            </li>
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê mộc theo số lượng sản xuất của loại vải trong năm</a>
            </li>
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê thành phẩm theo loại vải bán chạy nhất trong năm</a>
            </li>
        </ul>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Quản Lý Tổng <small>Chào!!</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Chọn chức năng bên cạnh
                </li>
            </ol>
        </div>
    </div>
@endsection