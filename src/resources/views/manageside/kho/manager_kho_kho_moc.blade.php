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
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Cây Mộc</strong>  </span>
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
                    
                        <button type="button" id="addcaymocbtn" class="btn btn-primary" data-toggle="modal" data-target="#addcaymocmodal">Thêm Cây Mộc</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addcaymocmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><strong>Thêm Cây Mộc</strong></h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_kho_cay_moc','method'=>'POST', 'class'=> 'form-group','id'=>'addcaymoc'])}}
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4 class="center"><strong>Thông Tin Chung</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('loai_vai_id','Loại Vải : ')}}
                                                            
                                                            <select name="loai_vai_id" id="loai_vai_id" class="form-control" required="required">
                                                                @foreach($list_loaivai as $loaivai)
                                                                    <option value="{{$loaivai->id}}">{{$loaivai->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('loai_soi_id','Loại Sợi : ')}}
                                                            
                                                            <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                                @foreach($list_loaisoi as $loaisoi)
                                                                    <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                             {{Form::label('kho_id','Kho : ')}}

                                                             <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                @foreach($list_kho as $kho)
                                                                    <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                             {{Form::label('ngay_gio_nhap_kho','Ngày Giờ Nhập Kho : ')}}
                                                             <input type="datetime-local" name="ngay_gio_nhap_kho" value="" id="ngay_gio_nhap_kho" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4 class="center"><strong>Thông Tin Cây Mộc</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('ma_cay_moc','Mã Cây Mộc : ')}}
                                                            {{Form::text('ma_cay_moc',null,['class'=>'form-control','disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('so_met','Số Mét : ')}}
                                                            {{Form::number('so_met',null,['class'=>'form-control','required'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('nhan_vien_det_id','Nhân Viên Dệt : ')}}
                                                            
                                                            <select name="nhan_vien_det_id" id="nhan_vien_det_id" class="form-control" required="required">
                                                                @foreach($list_nhanvien as $nhanvien)
                                                                    <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('ma_may_det_id','Mã Máy Dệt : ')}}
                                                            
                                                            <select name="ma_may_det_id" id="ma_may_det_id" class="form-control" required="required">
                                                                <option value="1">Máy Dệt 1 - Máy....</option>
                                                                <option value="2">Máy Dệt 2 - Máy....</option>
                                                                <option value="3">Máy Dệt 3 - Máy....</option>
                                                                <option value="4">Máy Dệt 4 - Máy....</option>
                                                                <option value="5">Máy Dệt 5 - Máy....</option>
                                                                <option value="6">Máy Dệt 6 - Máy....</option>
                                                                <option value="7">Máy Dệt 7 - Máy....</option>
                                                                <option value="8">Máy Dệt 8 - Máy....</option>
                                                                <option value="9">Máy Dệt 9 - Máy....</option>
                                                                <option value="10">Máy Dệt 10 - Máy....</option>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                           {{Form::label('ngay_gio_det','Ngày Giờ Dệt : ')}} 
                                                           
                                                           <input type="datetime-local" name="ngay_gio_det" id="ngay_gio_det" class="form-control" value="" required="required" title="">
                                                           
                                                        </div>
                                                    </div>
                                                    
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
                        
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhatcaymocmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Cây Mộc </h4>
                                        </div>
                                        {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'capnhatcaymoc'])}}
                                            <div class="modal-body">
                                                  <div class="row">
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4 class="center"><strong>Thông Tin Chung</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('loai_vai_id','Loại Vải : ')}}
                                                            
                                                            <select name="loai_vai_id" id="loai_vai_id" class="form-control" required="required">
                                                                @foreach($list_loaivai as $loaivai)
                                                                    <option value="{{$loaivai->id}}">{{$loaivai->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('loai_soi_id','Loại Sợi : ')}}
                                                            
                                                            <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                                @foreach($list_loaisoi as $loaisoi)
                                                                    <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                             {{Form::label('kho_id','Kho : ')}}

                                                             <select name="kho_id" id="kho_id" class="form-control" required="required">
                                                                @foreach($list_kho as $kho)
                                                                    <option value="{{$kho->id}}">{{$kho->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                             {{Form::label('ngay_gio_nhap_kho','Ngày Giờ Nhập Kho : ')}}
                                                             <input type="datetime-local" name="ngay_gio_nhap_kho" id="ngay_gio_nhap_kho" value="" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4 class="center"><strong>Thông Tin Cây Mộc</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('ma_cay_moc','Mã Cây Mộc : ')}}
                                                            {{Form::text('ma_cay_moc',null,['class'=>'form-control','disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('so_met','Số Mét : ')}}
                                                            {{Form::number('so_met',null,['class'=>'form-control','required'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('nhan_vien_det_id','Nhân Viên Dệt : ')}}
                                                            
                                                            <select name="nhan_vien_det_id" id="nhan_vien_det_id" class="form-control" required="required">
                                                                @foreach($list_nhanvien as $nhanvien)
                                                                    <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('ma_may_det_id','Mã Máy Dệt : ')}}
                                                            
                                                            <select name="ma_may_det_id" id="ma_may_det_id" class="form-control" required="required">
                                                                <option value="1">Máy Dệt 1 - Máy....</option>
                                                                <option value="2">Máy Dệt 2 - Máy....</option>
                                                                <option value="3">Máy Dệt 3 - Máy....</option>
                                                                <option value="4">Máy Dệt 4 - Máy....</option>
                                                                <option value="5">Máy Dệt 5 - Máy....</option>
                                                                <option value="6">Máy Dệt 6 - Máy....</option>
                                                                <option value="7">Máy Dệt 7 - Máy....</option>
                                                                <option value="8">Máy Dệt 8 - Máy....</option>
                                                                <option value="9">Máy Dệt 9 - Máy....</option>
                                                                <option value="10">Máy Dệt 10 - Máy....</option>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                           {{Form::label('ngay_gio_det','Ngày Giờ Dệt : ')}} 
                                                           
                                                           <input type="datetime-local" name="ngay_gio_det" id="ngay_gio_det" class="form-control" value="" required="required" title="">
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="submit" class="btn btn-large btn-block btn-warning">Cập nhật</button>
                                                
                                                <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>
                                            </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                </li>
                
            </ol>
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Cây Mộc</th>
                            <th>Loại Vải</th>
                            <th>Số Mét</th>
                            <th>Nhân Viên Dệt</th>
                            <th>Mã Máy Dệt</th>
                            <th>Ngày Giờ Dệt</th>
                            <th>Ngày Giờ Nhập Kho</th>
                            <th>Mã Phiếu Xuất Mộc</th>
                            <th>Tình Trạng</th>
                            <th>Mã Lô Nhuộm</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="bodytable">
                        @foreach($list_caymoc as $caymoc)  
                            <tr id="{{$caymoc->id}} "data-toggle="modal" data-target="#capnhatcaymocmodal">
                                
                                <td>{{$caymoc->id}}</td>
                                <td>{{$caymoc->loai_vai->ten}}</td>
                                <td>{{$caymoc->so_met}}</td>
                                <td>{{$caymoc->nhan_vien_det->ten}}</td>
                                <td>{{$caymoc->ma_may_det}}</td>
                                <td>{{$caymoc->ngay_gio_det}}</td>
                                <td>{{$caymoc->ngay_gio_nhap_kho}}</td>
                                <td>{{$caymoc->phieu_xuat_moc_id}}</td>
                                <td>{{$caymoc->tinh_trang}}</td> 
                                <td>{{$caymoc->lo_nhuom_id}}</td> 
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
                        <span><strong> {{$list_caymoc->links()}} </strong></span> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        $("#addcaymocbtn").click(function(){
            $.ajax({
                method:"GET",
                url:'manage_kho_kho_cay_moc/create',
                success:function(data){
                    $("#addcaymoc #ma_cay_moc").val(data);
                },
                fail:function(){
                    alert("Server không trả về kết quả ");
                }
            });
        });
        $("#bodytable tr").click(function(){
            var id = $(this).attr('id');
            $.ajax({
                method:"GET",
                url:'ajax/manage_kho_kho_cay_moc/'+id,
                success:function(data){
                    $("#capnhatcaymoc #loai_vai_id").val(data.loai_vai_id);
                    $("#capnhatcaymoc #loai_soi_id").val(data.loai_soi_id);
                    $("#capnhatcaymoc #kho_id").val(data.kho_id);
                    
                    $("#capnhatcaymoc #ma_cay_moc").val(data.id);
                    $("#capnhatcaymoc #so_met").val(data.so_met);
                    $("#capnhatcaymoc #nhan_vien_det_id").val(data.nhan_vien_det_id);
                    $("#capnhatcaymoc #ma_may_det_id").val(data.ma_may_det);

                    var dateConvert =  new Date(data.ngay_gio_det).toISOString();
                    var dateString =  dateConvert.substring(0,dateConvert.lastIndexOf("."));
                    var dateConvert1 =  new Date(data.ngay_gio_nhap_kho).toISOString();
                    var dateString1 =  dateConvert.substring(0,dateConvert1.lastIndexOf("."));
                    console.log(dateString1);
                    $("#capnhatcaymoc #ngay_gio_det").val(dateString);
                    $("#capnhatcaymoc #ngay_gio_nhap_kho").val(dateString1);
                    
                },
                fail:function(){
                    alert("Server không trả về kết quả ");
                }
            });
        });
    </script>
@endsection