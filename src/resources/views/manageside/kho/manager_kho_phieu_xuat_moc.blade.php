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
            <h1 class="page-header">
                Trang Quản Lý Tổng <small>Chào!!</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <div class="row">
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Phiếu Xuất Mộc</strong>  </span>
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
                    
                        <button type="button" id="addphieuxuatmocbtn" class="btn btn-primary" data-toggle="modal" data-target="#addphieuxuatmocmodal">Thêm Phiếu Xuất Mộc</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addphieuxuatmocmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Phiếu Xuất Mộc</h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_phieu_xuat_moc','method'=>'POST', 'class'=> 'form-group' ,'id'=>'addphieuxuatmoc'])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_phieu_xuat_moc','Mã Phiếu Xuất Mộc : ')}}
                                                    {{Form::text('ma_phieu_xuat_moc',null,['class'=>'form-control','disabled'=>''])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('loai_vai_id','Loại Vải : ')}}
                                                    
                                                    <select name="loai_vai_id" id="loai_vai_id" class="form-control" required="required">
                                                        @foreach($list_loaivai as $loaivai)
                                                            <option value="{{$loaivai->id}}">{{$loaivai->ten}}</option>
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
                                                     {{Form::label('nhan_vien_xuat_id','Nhân Viên Xuất : ')}}
                                                    
                                                    <select name="nhan_vien_xuat_id" id="nhan_vien_xuat_id" class="form-control" required="required">
                                                        @foreach($list_nhanvien as $nhanvien)
                                                            <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ngay_gio_xuat_kho','Ngày Giờ Xuất Kho : ')}}
                                                    
                                                    <input type="datetime-local" name="ngay_gio_xuat_kho" id="ngay_gio_xuat_kho" class="form-control" value="" required="required" title="">
                                                    
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
                        
                        <button type="button" id="capnhatphieuxuatmocbtn"class="btn btn-info" data-toggle="modal" data-target="#capnhapphi6euxuatmocmodal">Cập Nhật Phiếu Xuất Mộc</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhapphi6euxuatmocmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Phiếu Xuất Mộc</h4>
                                        </div>
                                          {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group','id'=>'capnhatphieuxuatmoc' ])}}
                                            <div class="modal-body">
                                               <div class="form-group">
                                                    {{Form::label('ma_phieu_xuat_moc','Mã Phiếu Xuất Mộc : ')}}
                                                    {{Form::text('ma_phieu_xuat_moc',null,['class'=>'form-control','disabled'=>''])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('loai_vai_id','Loại Vải : ')}}
                                                    
                                                    <select name="loai_vai_id" id="loai_vai_id" class="form-control" required="required">
                                                        @foreach($list_loaivai as $loaivai)
                                                            <option value="{{$loaivai->id}}">{{$loaivai->ten}}</option>
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
                                                     {{Form::label('nhan_vien_xuat_id','Nhân Viên Xuất : ')}}
                                                    
                                                    <select name="nhan_vien_xuat_id" id="nhan_vien_xuat_id" class="form-control" required="required">
                                                        @foreach($list_nhanvien as $nhanvien)
                                                            <option value="{{$nhanvien->id}}">{{$nhanvien->ten}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ngay_gio_xuat_kho','Ngày Giờ Xuất Kho : ')}}
                                                    
                                                    <input type="datetime-local" name="ngay_gio_xuat_kho" id="ngay_gio_xuat_kho" class="form-control" value="" required="required" title="">
                                                    
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
                            <th>Mã Phiếu Xuất Mộc</th>
                            <th>Loại Vải</th>
                            <th>Tổng Số Cây Mộc</th>
                            <th>Tổng Số Mét</th>
                            <th>Kho</th>
                            <th>Nhân Viên Xuất</th>
                            <th>Ngày Giờ Xuất Kho</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="bodytable">
                        @foreach($list_phieuxuatmoc as $phieuxuatmoc)  
                            <tr id="{{$phieuxuatmoc->id}}" data-toggle="modal" data-target="#capnhapphi6euxuatmocmodal">
                                
                                <td>{{$phieuxuatmoc->id}}</td>
                                <td>{{$phieuxuatmoc->loai_vai->ten}}</td>
                                <td>{{$phieuxuatmoc->tong_so_cay_moc}}</td>
                                <td>{{$phieuxuatmoc->tong_so_met}}</td>
                                <td>{{$phieuxuatmoc->kho->ten}}</td>
                                <td>{{$phieuxuatmoc->nhan_vien_xuat->ten}}</td>
                                <td>{{$phieuxuatmoc->ngay_gio_xuat_kho}}</td>
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
                        <span><strong> {{$list_phieuxuatmoc->links()}} </strong></span> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        $("#addphieuxuatmocbtn").click(function(){
            $.ajax({
                method:"GET",
                url:'manage_kho_phieu_xuat_moc/create',
                success:function(data){
                    $("#addphieuxuatmoc #ma_phieu_xuat_moc").val(data);
                },
                fail:function(xhr){
                    alert(xhr);
                }
            })
        });
        $("#bodytable tr").click(function(){
            var id = $(this).attr('id');
            $.ajax({
                method:"GET",
                url: 'ajax/manage_kho_phieu_xuat_moc/'+id,
                success:function(data){
                    $("#capnhatphieuxuatmoc").attr('action','manage_kho_phieu_xuat_moc/'+data.id);
                    $("#capnhatphieuxuatmoc #ma_phieu_xuat_moc").val(data.id);
                    $("#capnhatphieuxuatmoc #loai_vai_id").val(data.loai_vai_id);
                    $("#capnhatphieuxuatmoc #kho_id").val(data.kho_id);
                    $("#capnhatphieuxuatmoc #nhan_vien_xuat_id").val(data.nhan_vien_xuat_id);

                    var dateConvert =  new Date(data.ngay_gio_xuat_kho).toISOString();
                    var dateString =  dateConvert.substring(0,dateConvert.lastIndexOf("."));
                    $("#capnhatphieuxuatmoc #ngay_gio_xuat_kho").val(dateString);
                    

                },
                fail:function(xhr){
                    alert(xhr);
                }
            })
        });
    </script>
@endsection