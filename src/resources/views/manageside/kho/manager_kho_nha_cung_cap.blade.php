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
            <ol class="breadcrumb">
                <li class="active">
                    <div class="row">
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>    Bảng Nhà Cung Cấp  </strong>  </span>
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
                    
                        <button type="button" id="addnhacungcapbtn" class="btn btn-primary" data-toggle="modal" data-target="#addnhacungcapmodal">Thêm Nhà Cung Cấp</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addnhacungcapmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Nhà Cung Cấp</h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_nha_cung_cap','method'=>'POST', 'class'=> 'form-group' ])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_nha_cung_cap','Mã Số Nhà Cung Cấp: ')}}
                                                    {{Form::text('ma_nha_cung_cap',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ten_nha_cung_cap','Tên Nhà Cung Cấp : ')}}
                                                    {{Form::text('ten_nha_cung_cap',null,array('class'=>'form-control', 'required'=>'','maxlenght'=>'255'))}}
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('dia_chi','Địa Chỉ :')}}
                                                    {{Form::text('dia_chi',null,array('class'=>'form-control','required'=>'','minlenght'=>'20','maxlenght'=>'2000'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('email','Email :')}}
                                                    {{Form::email('email',null,array('class'=>'form-control','required'=>''))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('so_dien_thoai','Số Điện Thoại :')}}
                                                    {{Form::text('so_dien_thoai',null,array('class'=>'form-control','required'=>'','minlenght'=>'8','maxlenght'=>'11'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('fax','Fax :')}}
                                                    {{Form::text('fax',null,array('class'=>'form-control','minlenght'=>'8','maxlenght'=>'11'))}}
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
                        
                        <button type="button" id="capnhatnhacungcapbtn"class="btn btn-info" data-toggle="modal" data-target="#capnhatnhacungcapmodal">Cập Nhật Nhà Cung Cấp</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhatnhacungcapmodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Loại Sợi</h4>
                                        </div>
                                         {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'capnhatnhacungcap'])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_nha_cung_cap','Mã Số Nhà Cung Cấp: ')}}
                                                    {{Form::text('ma_nha_cung_cap',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('ten_nha_cung_cap','Tên Nhà Cung Cấp : ')}}
                                                    {{Form::text('ten_nha_cung_cap',null,array('class'=>'form-control', 'required'=>'','maxlenght'=>'255'))}}
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('dia_chi','Địa Chỉ :')}}
                                                    {{Form::text('dia_chi',null,array('class'=>'form-control','required'=>'','minlenght'=>'20','maxlenght'=>'2000'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('email','Email :')}}
                                                    {{Form::email('email',null,array('class'=>'form-control','required'=>''))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('so_dien_thoai','Số Điện Thoại :')}}
                                                    {{Form::text('so_dien_thoai',null,array('class'=>'form-control','required'=>'','minlenght'=>'8','maxlenght'=>'11'))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('fax','Fax :')}}
                                                    {{Form::text('fax',null,array('class'=>'form-control','minlenght'=>'8','maxlenght'=>'11'))}}
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
                
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Mã Nhà Cung Cấp</th>
                            <th>Tên Nhà Cung Cấp</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Fax</th>
                            <th>Công Nợ</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="bodytable">
                        @foreach($danh_sach_nha_cung_cap as $nha_cung_cap)  
                            <tr id="{{$nha_cung_cap->id}}" data-toggle="modal" data-target="#capnhatnhacungcapmodal">
                                
                                <td>{{$nha_cung_cap->id}}</td>
                                <td>{{$nha_cung_cap->ten}}</td>
                                <td>{{$nha_cung_cap->dia_chi}}</td>
                                <td>{{$nha_cung_cap->email}}</td>
                                <td>{{$nha_cung_cap->so_dien_thoai}}</td>
                                <td>{{$nha_cung_cap->fax}}</td>
                                <td>{{$nha_cung_cap->cong_no}}</td>
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
        $("#addnhacungcapbtn").click(function(){
            $.ajax({
                method:"GET",
                url:'manage_kho_nha_cung_cap/create',
                success:function(data){
                    $("#ma_nha_cung_cap").val(data);
                },
                fail:function(){
                    alert('Server không trả vể Kết Quả!!!');
                }
            });
        });
        $("#bodytable tr").click(function(){
            var id =$(this).attr('id');
            console.log(id);
            $.ajax({
                method:"GET",
                url:"ajax/manage_kho_nha_cung_cap/"+id,
                success:function(data){
                    $("#capnhatnhacungcap").attr("action","manage_kho_nha_cung_cap/"+data.id);
                    $("#capnhatnhacungcap #ma_nha_cung_cap").val(data.id);
                    $("#capnhatnhacungcap #ten_nha_cung_cap").val(data.ten);
                    $("#capnhatnhacungcap #dia_chi").val(data.dia_chi);
                    $("#capnhatnhacungcap #email").val(data.email);
                    $("#capnhatnhacungcap #so_dien_thoai").val(data.so_dien_thoai);
                    $("#capnhatnhacungcap #fax").val(data.fax);
                },
                fail:function(){
                    alert('Server không trả về Kết Quả!!1');
                }
            })
        });
    </script>
@endsection