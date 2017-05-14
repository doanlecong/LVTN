@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('stylecss')
    <style>
        .panel.with-nav-tabs .panel-heading{
            padding: 5px 5px 0 5px;
        }
        .panel.with-nav-tabs .nav-tabs{
            border-bottom: none;
        }
        .panel.with-nav-tabs .nav-justified{
            margin-bottom: -1px;
        }
        /*** PANEL PRIMARY ***/
        .with-nav-tabs.panel-primary .nav-tabs > li > a,
        .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
            color: #fff;
        }
        .with-nav-tabs.panel-primary .nav-tabs > .open > a,
        .with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
        .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
            color: #fff;
            background-color: #3071a9;
            border-color: transparent;
        }
        .with-nav-tabs.panel-primary .nav-tabs > li.active > a,
        .with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
            color: #428bca;
            background-color: #fff;
            border-color: #428bca;
            border-bottom-color: transparent;
        }
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
            background-color: #428bca;
            border-color: #3071a9;
        }
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
            color: #fff;   
        }
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
            background-color: #3071a9;
        }
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
        .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
            background-color: #4a9fe9;
        }

        .modal-dialog{
            background:rgba(56, 33, 53, 0.78);
        }
        .modal-header{
            background:linear-gradient(to bottom left, #cc33ff 0%, #ff0066 100%);     
        }
        .modal-title{
           color: #39f72e;
        }
        .modal-content{
            
            color:black;
        }
        .vertical-helper {
            display:table;
            height: 100%;
            width: 100%;
        }
        .vertical-center {
            /* To center vertically */
            display: table-cell;
            vertical-align: middle;
        }
        .modal-content {
            /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
            width:inherit;
            height:inherit;
            /* To center horizontally */
            margin: 0 auto;
        }
        .fade{
            opacity: 0;
            -webkit-transition: opacity 0.1s linear;
                -moz-transition: opacity 0.1s linear;
                -ms-transition: opacity 0.1s linear;
                    -o-transition: opacity 0.1s linear;
                    transition: opacity 0.1s linear;
        }
    </style>
@endsection
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
                    <div class="row">
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Hóa Đơn Nhập</strong>  </span>
                    </div>
                      
                </li>
            </ol>
            @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Hóa Đơn Thuộc Đơn Hàng Chưa Hoàn Thành</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Hóa Đơn Thuộc Đơn Hàng Hoàn Thành</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">Danh Sách Tất Cả Hóa Đơn</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                    
                                        <button type="button" id="addhoadonnhapbtn" class="btn btn-primary" data-toggle="modal" data-target="#addhoadonnhapmodal">Thêm Hóa Đơn Nhập</button>
                                        <!--Modal cua them loai soi -->
                                        <div class="modal fade" id="addhoadonnhapmodal" role="dialog">
                                            <div class="vertical-helper">
                                                <div class="modal-dialog modal-lg vertical-center">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><strong>Thêm Đơn Hóa Đơn Nhập</strong></h4>
                                                        </div>
                                                        {{Form::open(['url'=>'manage_kho_hoa_don_nhap','method'=>'POST', 'class'=> 'form-group','onsubmit'=>'return validateSelectDonHang()' ,'id'=>'addhoadonnhap'])}}
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    {{Form::label('ma_hoa_don_nhap','Mã Hóa Đơn Nhập : ')}}
                                                                    {{Form::text('ma_hoa_don_nhap',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                                </div>
                                                                <div class="form-group">
                                                                {{Form::label('don_hang_cong_ty_id','Thuộc Đơn Hàng : ')}}
                                                                <select name="don_hang_cong_ty_id" id="don_hang_cong_ty_id" class="form-control don_hang_cong_ty_id" required="required">
                                                                            <option value="">.....Mời Chọn Đơn Hàng Công Ty --Bắt Buộc--</option>
                                                                        @foreach($list_donhang as $donhang)
                                                                            <!--CÓ thể thêm khối lượng đã nhập trước đó cho đơn hàng vào ô để hiện thị lên-->
                                                                            <option value="{{$donhang->id}}">{{$donhang->id}}---{{$donhang->loai_soi->ten}}---{{$donhang->nha_cung_cap->ten}}--Tổng khối Lượng Đặt : {{$donhang->khoi_luong}}(kg)</option>
                                                                        @endforeach
                                                                </select>
                                                                
                                                                <!--<script>
                                                                    var list_donhang = "list_donhang";
                                                                    var donhang = list_donhang.replace(/&quot;/g, '\"');
                                                                    //var list_donhangJson = $.parseJSON(list_donhang);
                                                                    donhang =JSON.parse(donhang);
                                                                    console.log(donhang);

                                                                    //console.log(list_donhangJson);
                                                                </script> ;-->
                                                                </div>
                                                                <div class="form-group">
                                                                    {{Form::label('nha_cung_cap_id','Nhà Cung Cấp (Thông Tin Lấy Từ Trường Đơn Hàng) : ')}}
                                                                    {{Form::text('nha_cung_cap_id',null,['class'=>'form-control nha_cung_cap_id','disabled'=>'','required'=>''])}}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{Form::label('loai_soi_id','Loại Sợi (Thông Tin Lấy Từ Trường Đơn Hàng) : ')}}
                                                                    {{Form::text('loai_soi_id',null,['class'=>'form-control loai_soi_id','disabled'=>'','required'=>''])}}
                                                                </div>
                                                            <div class="form-group">
                                                                    {{Form::label('so_thung','Số Thùng Nhập :')}}
                                                                    {{Form::number('so_thung',null,array('class'=>'form-control so_thung','require'=>''))}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('khoi_luong_thung','Khối Lượng Thùng (kg) :')}}
                                                                    {{Form::number('khoi_luong_thung',null,array('class'=>'form-control khoi_luong_thung','required'=>''))}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('tong_khoi_luong_nhap','Tổng Khối Lượng Nhập :')}}
                                                                    {{Form::number('tong_khoi_luong_nhap',null,['class'=>'form-control tong_khoi_luong_nhap','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('don_gia','Đơn Giá (VND): ')}}
                                                                    {{Form::number('don_gia',null,['class'=>'form-control don_gia'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('tong_tien','Tổng Tiền (VND) : ')}}
                                                                    {{Form::number('tong_tien',null,['class'=>'form-control tong_tien','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('kho_id','Lưu Tại Kho : ')}}
                                                                    <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                        @foreach($list_kho as $kho)
                                                                            <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('nhan_vien_nhap_id','Nhân Viên Nhập Hàng : ')}}
                                                                    <select name="nhan_vien_nhap_id" id="nhan_vien_nhap_id" class="form-control" required="required">
                                                                        @foreach($list_nhanvien as $nhanvien)
                                                                            <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('ngay_gio_xuat_hoa_don','Ngày Giờ Đặt Hàng : ')}}
                                                                    <input type="datetime-local" name="ngay_gio_xuat_hoa_don" id="ngay_gio_xuat_hoa_don" class="form-control" val="new Date()">
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-large btn-block btn-warning">Thêm</button>
                                                                
                                                                <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                        {{Form::close()}}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <button type="button" id="capnhathoadonnhapbtn"class="btn btn-info" data-toggle="modal" data-target="#capnhathoadonnhapmodal">Cập Nhật Đơn Hàng</button>
                                        <!--Modal cua cap nhat loai soi-->
                                        <div class="modal fade" id="capnhathoadonnhapmodal" role="dialog">
                                            <div class="vertical-helper">
                                                <div class="modal-dialog modal-lg vertical-center">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Cập Nhật Hóa Đơn Nhập </h4>
                                                        </div>
                                                        {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'capnhathoadonnhap','onsubmit'=>'return validateSelectDonHang()'])}}
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    {{Form::label('ma_hoa_don_nhap','Mã Hóa Đơn Nhập : ')}}
                                                                    {{Form::text('ma_hoa_don_nhap',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                                </div>
                                                                <div class="form-group">
                                                                {{Form::label('don_hang_cong_ty_id','Thuộc Đơn Hàng : ')}}
                                                                <select name="don_hang_cong_ty_id" id="don_hang_cong_ty_id" class="form-control don_hang_cong_ty_id" required="required">
                                                                            <option value="">.....Mời Chọn Đơn Hàng Công Ty --Bắt Buộc--</option>
                                                                        @foreach($list_donhang as $donhang)
                                                                            <!--CÓ thể thêm khối lượng đã nhập trước đó cho đơn hàng vào ô để hiện thị lên-->
                                                                            <option value="{{$donhang->id}}">{{$donhang->id}}---{{$donhang->loai_soi->ten}}---{{$donhang->nha_cung_cap->ten}}--Tổng khối Lượng Đặt : {{$donhang->khoi_luong}}(kg)</option>
                                                                        @endforeach
                                                                </select>
                                                                
                                                                </div>
                                                                <div class="form-group">
                                                                    {{Form::label('nha_cung_cap_id','Nhà Cung Cấp (Thông Tin Lấy Từ Trường Đơn Hàng) : ')}}
                                                                    {{Form::text('nha_cung_cap_id',null,['class'=>'form-control nha_cung_cap_id','disabled'=>'','required'=>''])}}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{Form::label('loai_soi_id','Loại Sợi(Thông Tin Lấy Từ Trường Đơn Hàng) : ')}}
                                                                    {{Form::text('loai_soi_id',null,['class'=>'form-control loai_soi_id','disabled'=>'','required'=>''])}}
                                                                </div>
                                                            <div class="form-group">
                                                                    {{Form::label('so_thung','Số Thùng Nhập :')}}
                                                                    {{Form::number('so_thung',null,array('class'=>'form-control so_thung','required'=>''))}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('khoi_luong_thung','Khối Lượng Thùng (kg) :')}}
                                                                    {{Form::number('khoi_luong_thung',null,array('class'=>'form-control khoi_luong_thung','required'=>''))}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('tong_khoi_luong_nhap','Tổng Khối Lượng Nhập :')}}
                                                                    {{Form::number('tong_khoi_luong_nhap',null,['class'=>'form-control tong_khoi_luong_nhap','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('don_gia','Đơn Giá (VND): ')}}
                                                                    {{Form::number('don_gia',null,['class'=>'form-control don_gia'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('tong_tien','Tổng Tiền (VND): ')}}
                                                                    {{Form::number('tong_tien',null,['class'=>'form-control tong_tien','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('kho_id','Lưu Tại Kho : ')}}
                                                                    <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                        @foreach($list_kho as $kho)
                                                                            <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('nhan_vien_nhap_id','Nhân Viên Nhập Hàng : ')}}
                                                                    <select name="nhan_vien_nhap_id" id="nhan_vien_nhap_id" class="form-control" required="required">
                                                                        @foreach($list_nhanvien as $nhanvien)
                                                                            <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                            </div>
                                                            <div class="form-group">
                                                                    {{Form::label('ngay_gio_xuat_hoa_don','Ngày Giờ Đặt Hàng : ')}}
                                                                    <input type="datetime-local" name="ngay_gio_xuat_hoa_don" id="ngay_gio_xuat_hoa_don" class="form-control" val="new Date()">
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-large btn-block btn-warning">Thêm</button>
                                                                
                                                                <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                        {{Form::close()}}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <span class="label-info pull-right ">Cập nhật lần cuối: </h4>
                                    </div>
                                
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
                                    <tbody id="bodytable">
                                        <!--@foreach($danh_sach_hoa_don_nhap as $hoa_don_nhap)  
                                            <tr id="{{$hoa_don_nhap->id}}" data-toggle="modal" data-target="#capnhathoadonnhapmodal">
                                                
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
                                        @endforeach-->
                                        @foreach($list_hoa_don_chua_hoan_thanh as $donhang)
                                            @foreach($donhang->hoa_don_nhaps as $hoa_don_nhap_chua_hoan_thanh)
                                                <tr id="{{$hoa_don_nhap_chua_hoan_thanh->id}}" data-toggle="modal" data-target="#capnhathoadonnhapmodal">
                                                    
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->id}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->don_hang_cong_ty->id}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->nha_cung_cap->ten}}</td>
                                                    <td>
                                                        {{App\LoaiSoi::find($hoa_don_nhap_chua_hoan_thanh->don_hang_cong_ty->loai_soi_id)->ten}}
                                                    </td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->so_thung}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->khoi_luong_thung}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->so_thung*$hoa_don_nhap->khoi_luong_thung}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->don_gia}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->so_thung*$hoa_don_nhap->khoi_luong_thung*$hoa_don_nhap->don_gia}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->kho->ten}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->nhan_vien_nhap->ten}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->ngay_gio_xuat_hoa_don}}</td>
                                                    <td>{{$hoa_don_nhap_chua_hoan_thanh->tinh_chat}}</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="xoa">
                                                            </label>
                                                        </div>
                                                    </td>
                                                
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
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
                                    <tbody id="bodytable2">
                                        @foreach($list_hoa_don_hoan_thanh as $donhanghoanthanh)  
                                            @foreach($donhanghoanthanh->hoa_don_nhaps as $hoa_don_nhap_hoan_thanh )
                                                <tr id="{{$hoa_don_nhap_hoan_thanh->id}}" >
                                                    
                                                    <td>{{$hoa_don_nhap_hoan_thanh->id}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->don_hang_cong_ty->id}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->nha_cung_cap->ten}}</td>
                                                    <td>
                                                        {{App\LoaiSoi::find($hoa_don_nhap_hoan_thanh->don_hang_cong_ty->loai_soi_id)->ten}}
                                                    </td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->so_thung}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->khoi_luong_thung}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->so_thung*$hoa_don_nhap->khoi_luong_thung}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->don_gia}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->so_thung*$hoa_don_nhap->khoi_luong_thung*$hoa_don_nhap->don_gia}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->kho->ten}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->nhan_vien_nhap->ten}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->ngay_gio_xuat_hoa_don}}</td>
                                                    <td>{{$hoa_don_nhap_hoan_thanh->tinh_chat}}</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="xoa">
                                                            </label>
                                                        </div>
                                                    </td>
                                                
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3primary">
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
                                    <tbody id="bodytable3">
                                        @foreach($danh_sach_hoa_don_nhap as $hoa_don_nhap)  
                                            <tr id="{{$hoa_don_nhap->id}}" >
                                                
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
                </div>
            </div>
           
        </div>
    </div>
    <script>
        $("#addhoadonnhapbtn").click(function(){
            $.ajax({
                method:"GET",
                url:'manage_kho_hoa_don_nhap/create',
                success:function(data){
                    $("#ma_hoa_don_nhap").val(data);
                },
                fail:function(){
                    alert('Server không trả vể Kết Quả!!!');
                }
            });
        });
        $(".don_hang_cong_ty_id").change(function(){
            var iddonhang = $(this).val();
            console.log(iddonhang);
            if(iddonhang!=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxselect/manage_kho_hoa_don_nhap/'+iddonhang,
                    success:function(data){
                        //console.log(data.loai_soi.ten);
                        $(".nha_cung_cap_id").val(data.nha_cung_cap.ten);
                        $(".loai_soi_id").val(data.loai_soi.ten);
                    },
                    fail:function (){
                        alert('Server không trả về kết quả');
                    }
                });
            }else{
                 $(".nha_cung_cap_id").val("");
                 $(".loai_soi_id").val("");
            }
        });
        //Có THể áp dung VueJS vào  chỗ này để tỉnh toán realtime!!!!
        $(" #addhoadonnhap #so_thung , #addhoadonnhap #khoi_luong_thung , #addhoadonnhap #don_gia").change(function(){
            //console.log('3 Ô NÀY CÓ THAY ĐỔI');
            var sothung= $("#addhoadonnhap #so_thung").val();
            //console.log(sothung);
            var khoiluongthung = $("#addhoadonnhap #khoi_luong_thung").val();
            //console.log(khoiluongthung);
            var dongia = $("#addhoadonnhap #don_gia").val();
            //console.log(dongia);
            if(sothung=="" || khoiluongthung ==""){
                $("#addhoadonnhap #tong_khoi_luong_nhap").val("");
                $("#addhoadonnhap #tong_tien").val("");
            } else{
                $("#addhoadonnhap #tong_khoi_luong_nhap").val(sothung*khoiluongthung);
                if(dongia!=""){
                    $("#addhoadonnhap #tong_tien").val(sothung*khoiluongthung*dongia);
                }
            }

        });
         $(" #capnhathoadonnhap #so_thung , #capnhathoadonnhap #khoi_luong_thung , #capnhathoadonnhap #don_gia").change(function(){
            //console.log('3 Ô NÀY CÓ THAY ĐỔI');
            var sothung= $("#capnhathoadonnhap #so_thung").val();
            //console.log(sothung);
            var khoiluongthung = $("#capnhathoadonnhap #khoi_luong_thung").val();
            //console.log(khoiluongthung);
            var dongia = $("#capnhathoadonnhap #don_gia").val();
            //console.log(dongia);
            if(sothung=="" || khoiluongthung ==""){
                $("#capnhathoadonnhap #tong_khoi_luong_nhap").val("");
                $("#capnhathoadonnhap #tong_tien").val("");
            } else{
                $("#capnhathoadonnhap #tong_khoi_luong_nhap").val(sothung*khoiluongthung);
                if(dongia!=""){
                    $("#capnhathoadonnhap #tong_tien").val(sothung*khoiluongthung*dongia);
                }
            }

        });
        $("#bodytable tr").click(function(){
            var id = $(this).attr("id");
            $.ajax({
                method:"GET",
                url:'ajax/manage_kho_hoa_don_nhap/'+id,
                success:function(data){
                    $("#capnhathoadonnhap").attr('action','/manage_kho_hoa_don_nhap/'+data.id);
                    $("#capnhathoadonnhap #ma_hoa_don_nhap").val(data.id);
                    $("#capnhathoadonnhap #don_hang_cong_ty_id").val(data.don_hang_cong_ty_id).change();
                    $("#capnhathoadonnhap #so_thung").val(data.so_thung).change();
                    $("#capnhathoadonnhap #khoi_luong_thung").val(data.khoi_luong_thung).change();
                    $("#capnhathoadonnhap #don_gia").val(data.don_gia).change();
                    // Cap nha du lieu cho cac truong de thuc hien event change data cho cac truong 
                   
                    $("#capnhathoadonnhap #kho_id").val(data.kho_id);
                    $("#capnhathoadonnhap #nhan_vien_nhap_id").val(data.nhan_vien_nhap_id);
                    var dateConvert =  new Date(data.ngay_gio_xuat_hoa_don).toISOString();
                    var dateString =  dateConvert.substring(0,dateConvert.lastIndexOf("."));
                    console.log(dateString);
                    $("#capnhathoadonnhap #ngay_gio_xuat_hoa_don").val(dateString);
                   
                },
                fail:function(){
                    alert("Server không trả về Kết Quả !");
                }
            });
        });
        function validateSelectDonHang(){
            var giatri = $(".don_hang_cong_ty_id").val();
            if(giatri ==""){
                alert("Đơn Hàng Công Ty Chưa được chọn");
                $(".don_hang_cong_ty_id").focus();
                return false;
            }
            return true;
        }
    </script>
@endsection