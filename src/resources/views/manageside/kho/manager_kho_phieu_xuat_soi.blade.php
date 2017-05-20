@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('stylecss')
    <style>
        .modal-dialog{
            background:rgba(56, 33, 53, 0.78);
        }
        .modal-header{
            background:linear-gradient(to top right, #9933ff 0%, #cc33ff 100%);    
        }
        .modal-title{
           color: #39f72e;
        }
        .modal-content{
            color :black;
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
           <ol class="breadcrumb">
                <li class="active">
                    <div class="row">
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Phiếu Xuất Sợi</strong>  </span>
                    </div>
                      
                </li>
            </ol>
             @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif
             <ol class="breadcrumb">
                <li class="active">
                    <div class ="row ">
                    
                        <button type="button" id="addphieuxuatsoibtn" class="btn btn-primary" data-toggle="modal" data-target="#addphieuxuatsoimodal">Thêm Phiếu Xuất Sợi</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addphieuxuatsoimodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Phiếu Xuất Sợi</h4>
                                        </div>
                                         {{ Form::open(['url'=>'manage_kho_phieu_xuat_soi','method'=>'POST', 'class'=> 'form-group','id'=>'addphieuxuatsoi' ,'onsubmit'=>'return validateAdd()'])}}
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                                        <div class="form-group">
                                                            {{Form::label('ma_phieu_xuat_soi','Mã Phiếu Xuất Sợi : ')}}
                                                            {{Form::text('ma_phieu_xuat_soi',null,['class'=>'form-control', 'disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">  
                                                            {{Form::label('loai_soi_id','Loại Sợi : ')}}
                                                            
                                                            <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                                <option value="" >---Mời Chọn Loại Sợi Xuất ---  </option>
                                                                @foreach($list_loaisoi as $loaisoi)
                                                                    <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            {{Form::label('so_thung_xuat','Số Thùng Xuất : ')}}
                                                            {{Form::number('so_thung_xuat',null,['class'=>'form-control','required'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_khoi_luong_xuat','Tổng Khối Lượng Xuất (kg) : ')}}
                                                            {{Form::text('tong_khoi_luong_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('kho_id','Kho: ')}}
                                                            
                                                            <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                <option value="">---Mời Chọn Kho----</option>
                                                                @foreach($list_kho as $kho)
                                                                    <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('nhan_vien_xuat_id','Nhân Viên Xuất: ')}}
                                                            
                                                            <select name="nhan_vien_xuat_id" id="nhan_vien_xuat_id" class="form-control" required="required">
                                                                <option value="">---Mời Chọn Nhân Viên---</option>
                                                                @foreach($list_nhan_vien as $nhanvien)
                                                                    <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('ngay_gio_xuat_kho','Ngày Giờ Xuất Kho : ')}}
                                                            
                                                            <input type="datetime-local" name="ngay_gio_xuat_kho" id="ngay_gio_xuat_kho" class="form-control" value="" required="required" title="">
                                                            
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                         <!--Khoi Luonng ton  -->
                                                        <div class="form-group">   
                                                            {{Form::label('khoi_luong_ton','Khối Lượng Tồn (kg) : ')}}
                                                            {{Form::text('khoi_luong_ton',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <!--End Khoi Luong TOn-->
                                                        <div class="form-group">
                                                            {{Form::label('so_thung_ton','Số Thùng Tồn : ')}}
                                                            {{Form::text('so_thung_ton',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('khoi_luong_thung','Khối Lượng Thùng (kg) : ')}}
                                                            {{Form::text('khoi_luong_thung',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="submit" class="btn btn-large btn-block btn-warning">Thêm</button>
                                                
                                                <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <button type="button" id="capnhatphieuxuatsoibtn"class="btn btn-info" data-toggle="modal" data-target="#capnhapphieuxuatsoimodal">Cập Nhật Phiếu Xuất Sợi</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhapphieuxuatsoimodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Phiếu Xuất Sợi</h4>
                                        </div>
                                          {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group','id'=>'capnhatphieuxuatsoi','onsubmit'=>'return validateUpdate()' ])}}
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                                        <div class="form-group">
                                                            {{Form::label('ma_phieu_xuat_soi','Mã Phiếu Xuất Sợi : ')}}
                                                            {{Form::text('ma_phieu_xuat_soi',null,['class'=>'form-control', 'disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">  
                                                            {{Form::label('loai_soi_id','Loại Sợi : ')}}
                                                            
                                                            <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                                <option value="" >---Mời Chọn Loại Sợi Xuất ---  </option>
                                                                @foreach($list_loaisoi as $loaisoi)
                                                                    <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            {{Form::label('so_thung_xuat','Số Thùng Xuất : ')}}
                                                            {{Form::number('so_thung_xuat',null,['class'=>'form-control','required'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_khoi_luong_xuat','Tổng Khối Lượng Xuất (kg) : ')}}
                                                            {{Form::text('tong_khoi_luong_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('kho_id','Kho: ')}}
                                                            
                                                            <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                <option value="">---Mời Chọn Kho----</option>
                                                                @foreach($list_kho as $kho)
                                                                    <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('nhan_vien_xuat_id','Nhân Viên Xuất: ')}}
                                                            
                                                            <select name="nhan_vien_xuat_id" id="nhan_vien_xuat_id" class="form-control" required="required">
                                                                <option value="">---Mời Chọn Nhân Viên---</option>
                                                                @foreach($list_nhan_vien as $nhanvien)
                                                                    <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('ngay_gio_xuat_kho','Ngày Giờ Xuất Kho : ')}}
                                                            
                                                            <input type="datetime-local" name="ngay_gio_xuat_kho" id="ngay_gio_xuat_kho" class="form-control" value="" required="required" title="">
                                                            
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                         <!--Khoi Luonng ton  -->
                                                        <div class="form-group">   
                                                            {{Form::label('khoi_luong_ton','Khối Lượng Tồn (kg) : ')}}
                                                            {{Form::text('khoi_luong_ton',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <!--End Khoi Luong TOn-->
                                                        <div class="form-group">
                                                            {{Form::label('so_thung_ton','Số Thùng Tồn : ')}}
                                                            {{Form::text('so_thung_ton',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('khoi_luong_thung','Khối Lượng Thùng (kg) : ')}}
                                                            {{Form::text('khoi_luong_thung',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="modal-footer">
                                                
                                                <button type="submit" class="btn btn-large btn-block btn-warning">Cập Nhật</button>
                                                
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
                    <tbody id="bodytable">
                        @foreach($danh_sach_phieu_xuat_soi as $phieu_xuat_soi)  
                            <tr id="{{$phieu_xuat_soi->id}}" data-toggle="modal" data-target="#capnhapphieuxuatsoimodal">
                                
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
    <script>
        $("#addphieuxuatsoibtn").click(function(){
            $.ajax({
                method:"GET",
                url:'manage_kho_phieu_xuat_soi/create',
                success:function(data){
                    $("#addphieuxuatsoi #ma_phieu_xuat_soi").val(data);
                },
                fail:function(){
                    alert('Server không trả về kết quả !');
                }
            });
        });

        $("#addphieuxuatsoi #loai_soi_id").change(function(){
            var id = $(this).val();
            $.ajax({
                method:"GET",
                url:'ajaxselect/manage_kho_phieu_xuat_soi/'+id,
                success:function(data){
                    $("#addphieuxuatsoi #khoi_luong_ton").val(data.khoi_luong_ton);
                    $("#addphieuxuatsoi #so_thung_ton").val(data.so_thung_ton);
                    $("#addphieuxuatsoi #khoi_luong_thung").val(data.khoi_luong_ton / data.so_thung_ton);
                    console.log($("#addphieuxuatsoi #khoi_luong_thung").val());
                },
                fail:function(){
                    alert('Server không trả về kết quả ');
                }
            });
        });
        $("#addphieuxuatsoi #so_thung_xuat").change(function(){
            var sothungxuat  = $(this).val();
            var sothungton = $("#addphieuxuatsoi #so_thung_ton").val()
            if(sothungton == ""){
                alert("Mời Chọn Loại Sợi !");
                $("#addphieuxuatsoi #so_thung_xuat").val("");
                $("#addphieuxuatsoi #loai_soi_id").focus();
            }
            else if(Number(sothungxuat) > Number(sothungton)){
                alert("Số Thùng Xuất Bạn Chọn Vượt Quá Số Lượng Thùng Tồn !");
                $("#addphieuxuatsoi #so_thung_xuat").val("").focus();
            }
            else{
                var khoiluongthung = Number($("#addphieuxuatsoi #khoi_luong_thung").val());
                $("#addphieuxuatsoi #tong_khoi_luong_xuat").val(Number(sothungxuat)*khoiluongthung);
            }
        });

        $("#bodytable tr").click(function(){
            var id = $(this).attr('id');
            
            $.ajax({
                method:"GET",
                url: "ajax/manage_kho_phieu_xuat_soi/"+id,
                success:function(data){
                    //console.log(data);
                    $("#capnhatphieuxuatsoi").attr('action','manage_kho_phieu_xuat_soi/'+data.id);
                    $("#capnhatphieuxuatsoi #ma_phieu_xuat_soi").val(data.id);
                    $("#capnhatphieuxuatsoi #loai_soi_id").val(data.loai_soi.id);
                    $("#capnhatphieuxuatsoi #so_thung_xuat").val(data.so_thung);
                    $("#capnhatphieuxuatsoi #tong_khoi_luong_xuat").val(data.tong_khoi_luong_xuat);
                    $("#capnhatphieuxuatsoi #loai_soi_id").val(data.loai_soi.id);
                    $("#capnhatphieuxuatsoi #kho_id").val(data.kho_id);
                    $("#capnhatphieuxuatsoi #nhan_vien_xuat_id").val(data.nhan_vien_xuat_id);
                    $("#capnhatphieuxuatsoi #khoi_luong_ton").val(data.loai_soi.khoi_luong_ton);
                    $("#capnhatphieuxuatsoi #so_thung_ton").val(data.loai_soi.so_thung_ton);
                    $("#capnhatphieuxuatsoi #khoi_luong_thung").val(data.khoi_luong_thung);
                    console.log(data.ngay_gio_xuat_kho);
                    // Convert theo chuan cua input datetime_local
                    var dateConvert =  new Date(data.ngay_gio_xuat_kho).toISOString();
                    console.log(dateConvert);
                    var dateString =  dateConvert.substring(0,dateConvert.lastIndexOf("."));
                    console.log(dateString);
                    console.log(new Date(dateString));
                    $("#capnhatphieuxuatsoi #ngay_gio_xuat_kho").val(dateString);
                    
                },
                fail:function(){
                    alert("Server không trả về Kết QUả");
                },
            });
        });
        $("#capnhatphieuxuatsoi #so_thung_xuat").change(function(){
            var sothungxuat  = $(this).val();
            var sothungton = $("#capnhatphieuxuatsoi #so_thung_ton").val()
            if(sothungton == ""){
                alert("Mời Chọn Loại Sợi !");
                $("#capnhatphieuxuatsoi #so_thung_xuat").val("");
                $("#capnhatphieuxuatsoi #loai_soi_id").focus();
            }
            else if(Number(sothungxuat) > Number(sothungton)){
                alert("Số Thùng Xuất Bạn Chọn Vượt Quá Số Lượng Thùng Tồn !");
                $("#capnhatphieuxuatsoi #so_thung_xuat").val("").focus();
            }
            else{
                var khoiluongthung = Number($("#capnhatphieuxuatsoi #khoi_luong_thung").val());
                $("#capnhatphieuxuatsoi #tong_khoi_luong_xuat").val(Number(sothungxuat)*khoiluongthung);
            }
        });
        function validateAdd(){
            var loaisoi = $("#addphieuxuatsoi #loai_soi_id").val();
            var sothungxuat = $("#addphieuxuatsoi $so_thung_xuat").val();
            var kho = $("#addphieuxuatsoi $kho_id").val();
            var nhanvienxuat = $("#addphieuxuatsoi $nhan_vien_xuat_id").val();
            var ngaygioxuat = $("#addphieuxuatsoi $ngay_gio_xuat_kho").val();
            if(loaisoi ==""||sothungxuat == ""||kho==""||nhanvienxuat==""||ngaygioxuat==""){
                alert("Một số thông tin cần thiết còn thiếu");
                return false;
            }
            return true;
        }
        function validateUpdate(){
            var loaisoi = $("#capnhatphieuxuatsoi #loai_soi_id").val();
            var sothungxuat = $("#capnhatphieuxuatsoi $so_thung_xuat").val();
            var kho = $("#capnhatphieuxuatsoi $kho_id").val();
            var nhanvienxuat = $("#capnhatphieuxuatsoi $nhan_vien_xuat_id").val();
            var ngaygioxuat = $("#capnhatphieuxuatsoi $ngay_gio_xuat_kho").val();
            if(loaisoi ==""||sothungxuat == ""||kho==""||nhanvienxuat==""||ngaygioxuat==""){
                alert("Một số thông tin cần thiết còn thiếu");
                return false;
            }
            return true;
        }
    </script>
@endsection