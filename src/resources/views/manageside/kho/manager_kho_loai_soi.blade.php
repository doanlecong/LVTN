@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('stylecss')
    <style>
        .modal-header{
            background:linear-gradient(to bottom left, #cc33ff 0%, #ff0066 100%);
            
        }
        .modal-title{
           color: #39f72e;
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
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>    Bảng Loại Sợi  </strong>  </span>
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
                    
                        <button type="button" id="addloaisoibtn" class="btn btn-primary" data-toggle="modal" data-target="#addloaisoimodal">Thêm Loại Sọi</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addloaisoimodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Loại Sợi</h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_loai_soi','method'=>'POST', 'class'=> 'form-group' ])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_loai_soi','Mã Loại Sơi: ')}}
                                                    {{Form::text('ma_loai_soi',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ten_loai_soi','Tên Loại Sợi: ')}}
                                                    {{Form::text('ten_loai_soi',null,array('class'=>'form-control', 'required'=>'','maxlenght'=>'255'))}}
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('thong_tin_ky_thuat','Thông Tin Kỹ Thuật')}}
                                                    {{Form::textarea('thong_tin_ky_thuat',null,array('class'=>'form-control','required'=>'','minlenght'=>'20','maxlenght'=>'2000'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('kho_soi','Kho Sợi :')}}
                                                    {{Form::select('kho_soi',[1=>'Kho Sợi 1',2=>'Kho Sợi 2',3=>'Kho Sợi 3'],1,array('class'=>'form-control'))}}
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
                        
                        <button type="button" id="capnhatloaisoibtn"class="btn btn-info" data-toggle="modal" data-target="#capnhaploaisoimodal">Cập Nhật Loại Sợi</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhaploaisoimodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Loại Sợi</h4>
                                        </div>
                                        {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group','id'=>'capnhatloaisoi'])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_loai_soi','Mã Loại Sơi: ')}}
                                                    {{Form::text('ma_loai_soi',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ten_loai_soi','Tên Loại Sợi: ')}}
                                                    {{Form::text('ten_loai_soi',null,array('class'=>'form-control', 'require'=>'','maxlenght'=>'255'))}}
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('thong_tin_ky_thuat','Thông Tin Kỹ Thuật')}}
                                                    {{Form::textarea('thong_tin_ky_thuat',null,array('class'=>'form-control','require'=>'','minlenght'=>'20','maxlenght'=>'2000'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('kho_soi','Kho Sợi :')}}
                                                    {{Form::select('kho_soi',[1=>'Kho Sợi 1',2=>'Kho Sợi 2',3=>'Kho Sợi 3'],1,array('class'=>'form-control'))}}
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
                    <tbody id="bodytable">
                        @foreach($danh_sach_loai_soi as $loai_soi)  
                            <tr id="{{$loai_soi->id}}" data-toggle="modal" data-target="#capnhaploaisoimodal">
                                
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
                        <script>
                           $("#addloaisoibtn").click(function(){
                                $.ajax({
                                    method:"GET",
                                    url:'manage_kho_loai_soi/create',
                                    success:function(data){
                                        $("#ma_loai_soi").val(data);
                                    },
                                    fail:function(){
                                        alert('Server không trả vể Kết Quả!!!');
                                    }
                                });
                            });
                            $("#bodytable tr").click(function(){
                                var id = $(this).attr("id");
                                console.log(id);
                                console.log("manage_kho_loai_soi/ajax/"+id);
                                $.ajax({
                                    method:"GET",
                                    url:"ajax/manage_kho_loai_soi/"+id,
                                    success:function(data){
                                        console.log(data);
                                        $("#capnhatloaisoi").attr("action","manage_kho_loai_soi/"+data.id);
                                        $("#capnhatloaisoi #ma_loai_soi").val(data.id);
                                        $("#capnhatloaisoi #ten_loai_soi").val(data.ten);
                                        $("#capnhatloaisoi #thong_tin_ky_thuat").val(data.thong_tin_ky_thuat);
                                        $("#capnhatloaisoi #kho_soi").val(data.kho_id);
                                    },
                                    fail:function(){
                                        alert('Server không trả vể Kết Quả!!!');
                                    }
                                })
                            });
                        </script>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection