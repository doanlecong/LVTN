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
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Đơn Hàng Công Ty</strong>  </span>
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
                    
                        <button type="button" id="adddonhangcongtybtn" class="btn btn-primary" data-toggle="modal" data-target="#adddonhangcongtymodal">Thêm Đơn Hàng Công Ty</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="adddonhangcongtymodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Đơn Hàng Công Ty</h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_don_hang_cong_ty','method'=>'POST', 'class'=> 'form-group' ])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_don_hang','Mã Đơn Hàng : ')}}
                                                    {{Form::text('ma_don_hang',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                   {{Form::label('nha_cung_cap_id','Nhà Cung Cấp : ')}}
                                                   <select name="nha_cung_cap_id" id="nha_cung_cap_id" class="form-control" required="required">
                                                       @foreach($danh_sach_nha_cung_cap as $nhacungcap)
                                                            <option value="{{$nhacungcap->id}}">{{$nhacungcap->ten}}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('loai_soi_id','Loại Sợi: ')}}
                                                    <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                        @foreach($danh_sach_loai_soi as  $loaisoi)
                                                            <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('khoi_luong','Khối Lượng Đặt (kg) :')}}
                                                    {{Form::number('khoi_luong',null,array('class'=>'form-control','require'=>''))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('han_chot','Hạn Chót :')}}
                                                    {{Form::date('han_chot',\Carbon\Carbon::now(),array('class'=>'form-control'))}}
                                               </div>
                                               
                                               <div class="form-group">
                                                    {{Form::label('ngay_gio_dat_hang','Ngày Giờ Đặt Hàng : ')}}
                                                    {{Form::date('ngay_gio_dat_hang',\Carbon\Carbon::now(),array('class'=>'form-control'))}}
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
                        
                        <button type="button" id="capnhatdonhangcongtybtn"class="btn btn-info" data-toggle="modal" data-target="#capnhapdonhangcongtymodal">Cập Nhật Đơn Hàng</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhapdonhangcongtymodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Đơn Hàng Công Ty</h4>
                                        </div>
                                          {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group','id'=>'capnhatdonhangcongty' ])}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('ma_don_hang','Mã Đơn Hàng : ')}}
                                                    {{Form::text('ma_don_hang',null,array('class'=>'form-control disable','disabled'=>''))}}
                                                </div>
                                                <div class="form-group">
                                                   {{Form::label('nha_cung_cap_id','Nhà Cung Cấp : ')}}
                                                   <select name="nha_cung_cap_id" id="nha_cung_cap_id" class="form-control" required="required">
                                                       @foreach($danh_sach_nha_cung_cap as $nhacungcap)
                                                            <option value="{{$nhacungcap->id}}">{{$nhacungcap->ten}}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('loai_soi_id','Loại Sợi: ')}}
                                                    <select name="loai_soi_id" id="loai_soi_id" class="form-control" required="required">
                                                        @foreach($danh_sach_loai_soi as  $loaisoi)
                                                            <option value="{{$loaisoi->id}}">{{$loaisoi->ten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               <div class="form-group">
                                                    {{Form::label('khoi_luong','Khối Lượng Đặt (kg) :')}}
                                                    {{Form::number('khoi_luong',null,array('class'=>'form-control','require'=>''))}}
                                               </div>
                                               <div class="form-group">
                                                    {{Form::label('han_chot','Hạn Chót :')}}
                                                    {{Form::date('han_chot',null,array('class'=>'form-control'))}}
                                               </div>
                                               
                                               <div class="form-group">
                                                    {{Form::label('ngay_gio_dat_hang','Ngày Giờ Đặt Hàng : ')}}
                                                    {{Form::date('ngay_gio_dat_hang',\Carbon\Carbon::now(),array('class'=>'form-control'))}}
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
                    <tbody id="bodytable">
                        @foreach($danh_sach_don_hang as $don_hang)  
                            <tr id="{{$don_hang->id}}" data-toggle="modal" data-target="#capnhapdonhangcongtymodal">
                                
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
                <ol class="breadcrumb center">
                    <li class="active center">
                        <span><strong> {{$danh_sach_don_hang->links()}} </strong></span> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        $("#adddonhangcongtybtn").click(function(){
            $.ajax({
                method:"GET",
                url:"manage_kho_don_hang_cong_ty/create",
                success:function(data){
                    $("#ma_don_hang").val(data);
                },
                fail:function(){
                    alert('Server không trả về Kết Quả !!!');
                }
            })
        });
        $("#bodytable tr").click(function(){
             var id = $(this).attr("id");
             $.ajax({
                 method:"GET",
                 url:"ajax/manage_kho_don_hang_cong_ty/"+id,
                 success:function(data){
                     console.log(data);
                     $("#capnhatdonhangcongty").attr("action","manage_kho_don_hang_cong_ty/"+data.id);
                     $("#capnhatdonhangcongty #ma_don_hang").val(data.id);
                     $("#capnhatdonhangcongty #nha_cung_cap_id").val(data.nha_cung_cap_id);
                     $("#capnhatdonhangcongty #loai_soi_id").val(data.loai_soi_id);
                     $("#capnhatdonhangcongty #khoi_luong").val(data.khoi_luong);
                     var hanchot = data.han_chot.split(' ')[0];
                     var ngaygiodathang = data.ngay_gio_dat_hang.split(' ')[0];
                     $("#capnhatdonhangcongty #han_chot").val(hanchot);
                     $("#capnhatdonhangcongty #ngay_gio_dat_hang").val(ngaygiodathang);
                 },
                 fail:function(){
                     alert("Server không trả về Kết Quả");
                 }
             })
        });
    </script>
@endsection