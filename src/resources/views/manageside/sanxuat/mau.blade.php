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
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Các Mẫu Màu  </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã số Màu</th>
                            <th>Tên Màu</th>
                            <th>Công Thức</th>
                            <th>Màu Đại Diện</th>
                            <th>Nhân Viên Pha Chế</th>
                            <th>Ngày Giờ Tạo</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_mau as $mau)  
                            <tr>
                                
                                <td>{{$mau->id}}</td>
                                <td>{{$mau->ten}}</td>
                                <td>{{$mau->cong_thuc}}</td>
                                <td style="background-color:{{$mau->ma_mau}};">{{$mau->ma_mau}}</td>
                                <td>{{$mau->nhan_vien_pha_che->ten}}</td>
                                <td>{{date('Y-m-d H:m:s')}}</td>
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