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
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Đơn Hàng Công Ty  </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Loại Sợi</th>
                            <th>Tổng Khổi Lượng Đặt (kg)</th>
                            <th>Hạn Chót</th>
                            <th>Nhà Cung Cấp</th>
                            <th>Ngày Giờ Đặt Hàng</th>
                            <th>Tổng Khổi Lượng Nhập (kg)</th>
                            <th>Tình Trạng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_don_hang as $don_hang)  
                            <tr>
                                
                                <td>{{$don_hang->id}}</td>
                                <td>{{$don_hang->loai_soi->ten}}</td>
                                <td>{{$don_hang->khoi_luong}}</td>
                                <td>{{$don_hang->han_chot}}</td>
                                <td>{{$don_hang->nha_cung_cap->ten}}</td>
                                <td>{{$don_hang->ngay_gio_dat_hang}}</td>
                                <?php $tong=0 ;?>
                                @foreach($don_hang->hoa_don_nhaps as $hoa_don_nhap)
                                    <?php $tong+=$hoa_don_nhap->khoi_luong_thung*$hoa_don_nhap->so_thung?>
                                @endforeach
                               <td>{{$tong}}</td>
                               <td>{{$don_hang->tinh_trang}}</td> 
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