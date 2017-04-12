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
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Hóa Đơn Nhập  </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Hóa Đơn</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Nhà Cung Cấp</th>
                            <th>Loại Sợi</th>
                            <th>Số Thùng</th>
                            <th>Khối Lượng Thùng(kg/thùng)</th>
                            <th>Tổng Khổi Lượng Nhập (kg)</th>
                            <th>Đơn Giá(VND)</th>
                            <th>Tổng Tiền(VND)</th>
                            <th>Kho</th>
                            <th>Nhân Viên Nhập</th>
                            <th>Ngày Giờ Xuất Hóa Đơn</th>
                            <th>Tính Chất</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_hoa_don_nhap as $hoa_don_nhap)  
                            <tr>
                                
                                <td>{{$hoa_don_nhap->id}}</td>
                                <td>{{$hoa_don_nhap->don_hang_cong_ty->id}}</td>
                                <td>{{$hoa_don_nhap->nha_cung_cap->ten}}</td>
                                <td>
                                    {{App\LoaiSoi::find($hoa_don_nhap->don_hang_cong_ty->loai_soi_id)->ten}}
                                </td>
                                <td>{{$hoa_don_nhap->so_thung}}</td>
                                <td>{{$hoa_don_nhap->khoi_luong_thung}}</td>
                                <td>{{$hoa_don_nhap->so_thung*$hoa_don_nhap->khoi_luong_thung}}</td>
                                <td>{{$hoa_don_nhap->don_gia}}</td>
                                <td>{{$hoa_don_nhap->so_thung*$hoa_don_nhap->khoi_luong_thung*$hoa_don_nhap->don_gia}}</td>
                                <td>{{$hoa_don_nhap->kho->ten}}</td>
                                <td>{{$hoa_don_nhap->nhan_vien_nhap->ten}}</td>
                                <td>{{$hoa_don_nhap->ngay_gio_xuat_hoa_don}}</td>
                                <td>{{$hoa_don_nhap->tinh_chat}}</td>
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