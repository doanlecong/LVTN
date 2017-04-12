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
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Bảng Loại Sợi  </strong></span> 
                </li>
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Loại Sợi</th>
                            <th>Tên Loại Sợi</th>
                            <th>Thông Tin Loại Sợi</th>
                            <th>Lưu Kho</th>
                            <th>Khối Lượng Tồn</th>
                            <th>Số Thùng Tồn</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_loai_soi as $loai_soi)  
                            <tr>
                                
                                <td>{{$loai_soi->id}}</td>
                                <td>{{$loai_soi->ten}}</td>
                                
                                    <!--{{$loai_soi->thong_tin_ky_thuat

                                    }}-->
                                @if(strlen($loai_soi->thong_tin_ky_thuat)>300)
                                    <td title="{{$loai_soi->thong_tin_ky_thuat}}"> {{substr($loai_soi->thong_tin_ky_thuat,0,300)."...."}}</td>
                                @else
                                    <td>{{$loai_soi->thong_tin_ky_thuat}}</td>
                                @endif
                                
                                <td>{{$loai_soi->kho->ten}}</td>
                                <td>{{$loai_soi->khoi_luong_ton}}</td>
                                <td>{{$loai_soi->so_thung_ton}}</td>
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