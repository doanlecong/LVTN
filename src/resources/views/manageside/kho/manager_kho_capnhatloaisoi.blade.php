@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('left_nav')
   @include('manageside.leftside_nav')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Các Cây Vải Thành Phẩm </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Cây Thành Phẩm</th>
                            <th>Mã Cây Mộc</th>
                            <th>Màu</th>
                            <th>Số Mét</th>
                            <th>Đơn Giá (VND/m)</th>
                            <th>Thành Tiền</th>
                            <th>Mã Lô Nhuộm</th>
                            <th>Ngày Giờ Nhập Kho</th>
                            <th>Mã Hóa Đơn Xuất</th>
                            <th>Tình Trạng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_caythanhpham as $caythanhpham)  
                            <tr>
                                
                                <td>{{$caythanhpham->id}}</td>
                                <td>{{$caythanhpham->cay_vai_moc_id}}</td>
                                <td>{{$caythanhpham->mau->ten}}</td>
                                <td>{{$caythanhpham->so_met}}</td>
                                <td>{{$caythanhpham->don_gia}}</td>
                                <td>{{ $caythanhpham->don_gia*$caythanhpham->so_met}}</td>
                                <td>{{$caythanhpham->lo_nhuom_id}}</td>
                                <td>{{$caythanhpham->ngay_gio_nhap_kho}}</td>
                                <td>{{$caythanhpham->hoa_don_xuat_id}}</td> 
                                <td>{{$caythanhpham->tinh_trang}}</td> 
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
                <ol class="breadcrumb center">
                    <li class="active center">
                        <span><strong> {{$list_caythanhpham->links()}} </strong></span> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection