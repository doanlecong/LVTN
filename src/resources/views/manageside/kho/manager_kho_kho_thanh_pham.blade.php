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
        #addform{
            background:linear-gradient(to top right, #ff00ff 0%, #9900cc 100%);
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
                        <i class="fa fa-dashboard fa-2x pull-left"> </i> <span class="pull-left" style="font-size:20px;"><strong>Danh Sách Cây Thành Phẩm</strong>  </span>
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
                    
                        <button type="button" id="addcaythanhphambtn" class="btn btn-primary" data-toggle="modal" data-target="#addcaythanhphammodal">Thêm Cây Thành Phẩm</button>
                        <!--Modal cua them loai soi -->
                        <div class="modal fade" id="addcaythanhphammodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><strong>Thêm Cây Thành Phẩm</strong></h4>
                                        </div>
                                        {{Form::open(['url'=>'manage_kho_kho_thanh_pham','method'=>'POST', 'class'=> 'form-group','id'=>'addcaythanhpham'])}}
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4><strong>Thông Tin Chung</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('malonhuom','Mã Lô Nhuộm :')}}
                                                            <select name="malonhuom" id="malonhuom" class="form-control" required="required">
                                                                <option value="">Mời Chọn Lô Nhuộm Nhập Cây Thành Phẩm</option>
                                                                @foreach($list_lonhuom as $lonhuom)
                                                                    <option value="{{$lonhuom->id}}">{{$lonhuom->id}}---{{$lonhuom->loai_vai->ten}}---{{$lonhuom->mau->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('mau','Màu Sắc : ')}}
                                                            {{Form::text('mau',null,['class'=>'form-control','disabled'=>''])}}
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
                                                        <h4><strong>Thông Tin Cây Thành Phẩm</strong> 
                                                            <button type="button" id="addform" title="Thêm Ô Nhập Cây Thành Phẩm" class="btn btn-info pull-right">
                                                                <i class="fa fa-plus fa-1x"> </i>
                                                            </button>
                                                        </h4>
                                                        <div>
                                                            <div class="form-group">
                                                                {{Form::label('loaivai','Loại Vải : ')}}
                                                                {{Form::text('loaivai',null,['class'=>'form-control','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('macaythanhpham','Mã Cây Thành Phẩm : ')}}
                                                                {{Form::text('macaythanhpham',null,['class'=>'form-control','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('macaymoc','Mã Cây Mộc : ')}}
                                                                <select name="macaymoc" id="macaymoc" class="form-control" required="required">
                                                                    <option value="" >Danh Sách Cây Mộc Liên Quan Sẽ Được Thêm Vào Khi Chọn Lô Nhuộm</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('kichco','Khổ Vải (Rộng :mét) : ')}}
                                                                
                                                                <select name="kichco" id="kichco" class="form-control" required="required">
                                                                    <option value="0.5">0.5 Mét</option>
                                                                    <option value="1.0">1.0 Mét</option>
                                                                    <option value="1.5">1.5 Mét</option>
                                                                    <option value="2.0">2.0 Mét</option>
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('so_met','Số Mét : ')}}
                                                                {{Form::number('so_met',null,['class'=>'form-control','required'=>'','min'=>'1'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('dongia','Đơn Giá (VND): ')}}
                                                                {{Form::number('dongia',null,['class'=>'form-control','required'=>'','readonly'=>'readonly'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('thanhtien','Thành Tiền (VND): ')}}
                                                                {{Form::number('thanhtien',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            </div>
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
                        
                        <button type="button" id="capnhatcaythanhphambtn"class="btn btn-info" data-toggle="modal" data-target="#capnhatcaythanhphammodal">Cập Nhật Cây Thành Phẩm</button>
                        <!--Modal cua cap nhat loai soi-->
                        <div class="modal fade" id="capnhatcaythanhphammodal" role="dialog">
                            <div class="vertical-helper">
                                <div class="modal-dialog modal-lg vertical-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Cập Nhật Cây Thành Phẩm </h4>
                                        </div>
                                        {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'capnhatcaythanhpham'])}}
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h4><strong>Thông Tin Chung</strong></h4>
                                                        <div class="form-group">
                                                            {{Form::label('malonhuom','Mã Lô Nhuộm :')}}
                                                            <select name="malonhuom" id="malonhuom" class="form-control"  disabled required="required">
                                                                <option value="">Mời Chọn Lô Nhuộm Nhập Cây Thành Phẩm</option>
                                                                @foreach($list_lonhuom as $lonhuom)
                                                                    <option value="{{$lonhuom->id}}">{{$lonhuom->id}}---{{$lonhuom->loai_vai->ten}}---{{$lonhuom->mau->ten}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('mau','Màu Sắc : ')}}
                                                            {{Form::text('mau',null,['class'=>'form-control','disabled'=>''])}}
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
                                                        <h4><strong>Thông Tin Cây Thành Phẩm</strong> 
                                                            <button type="button" id="addform" title="Thêm Ô Nhập Cây Thành Phẩm" class="btn btn-info pull-right">
                                                                <i class="fa fa-plus fa-1x"> </i>
                                                            </button>
                                                        </h4>
                                                        <div>
                                                            <div class="form-group">
                                                                {{Form::label('loaivai','Loại Vải : ')}}
                                                                {{Form::text('loaivai',null,['class'=>'form-control','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('macaythanhpham','Mã Cây Thành Phẩm : ')}}
                                                                {{Form::text('macaythanhpham',null,['class'=>'form-control','disabled'=>''])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('macaymoc','Mã Cây Mộc : ')}}
                                                                <select name="macaymoc" id="macaymoc" class="form-control">
                                                                    <option value="" >Danh Sách Cây Mộc Liên Quan Sẽ Được Thêm Vào Khi Chọn Lô Nhuộm</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('kichco','Khổ Vải (Rộng :mét) : ')}}
                                                                
                                                                <select name="kichco" id="kichco" class="form-control" required="required">
                                                                    <option value="0.5">0.5 Mét</option>
                                                                    <option value="1.0">1.0 Mét</option>
                                                                    <option value="1.5">1.5 Mét</option>
                                                                    <option value="2.0">2.0 Mét</option>
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('so_met','Số Mét : ')}}
                                                                {{Form::number('so_met',null,['class'=>'form-control','required'=>'','min'=>'1'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('dongia','Đơn Giá (VND): ')}}
                                                                {{Form::number('dongia',null,['class'=>'form-control','required'=>'','readonly'=>'readonly'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('thanhtien','Thành Tiền (VND): ')}}
                                                                {{Form::number('thanhtien',null,['class'=>'form-control','disabled'=>''])}}
                                                            </div>
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
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Cây Thành Phẩm</th>
                            <th>Mã Cây Mộc</th>
                            <th>Màu</th>
                            <th>Khổ Vải (mét)</th>
                            <th>Số Mét</th>
                            <th>Đơn Giá (VND/m)</th>
                            <th>Thành Tiền</th>
                            <th>Mã Lô Nhuộm</th>
                            <th>Kho</th>
                            <th>Ngày Giờ Nhập Kho</th>
                            <th>Mã Hóa Đơn Xuất</th>
                            <th>Tình Trạng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="bodytable"> 
                        @foreach($list_caythanhpham as $caythanhpham)  
                            <tr id="{{$caythanhpham->id}}" data-toggle="modal" data-target="#capnhatcaythanhphammodal">
                                
                                <td>{{$caythanhpham->id}}</td>
                                <td>{{$caythanhpham->cay_vai_moc_id}}</td>
                                <td style="background-color:{{$caythanhpham->mau->ma_mau}}">{{$caythanhpham->mau->ten}}</td>
                                <td>{{$caythanhpham->kich_co}}</td>
                                <td>{{$caythanhpham->so_met}}</td>
                                <td>{{$caythanhpham->don_gia}}</td>
                                <td>{{$caythanhpham->don_gia*$caythanhpham->so_met}}</td>
                                <td>{{$caythanhpham->lo_nhuom_id}}</td>
                                <td>{{$caythanhpham->kho->ten}}</td>
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
    <script>
        $("#malonhuom").change(function(){
            var id  = $(this).val();
            if(id !=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxselectlonhuom/manage_kho_kho_thanh_pham/'+id,
                    success:function(data){
                        console.log(data);
                        $("#addcaythanhpham #mau").css('background',data[0].mau.ma_mau);
                        $("#addcaythanhpham #mau").val(data[0].mau.ten);
                        $("#addcaythanhpham #loaivai").val(data[0].loai_vai.ten);
                        $("#addcaythanhpham #macaymoc").empty();
                        $("#addcaythanhpham #macaythanhpham").val("");
                        $("#addcaythanhpham #dongia").val("");
                        $("#addcaythanhpham #thanhtien").val("");
                        
                        var lengthdatacaymoc = data[1].length;
                        if(lengthdatacaymoc!=0){
                            $("#addcaythanhpham #macaythanhpham").val(data[2]);
                            $("#addcaythanhpham #macaymoc").append("<option value=''>Mời Chọn Cây Mộc</option>");
                            for(i = 0 ; i<lengthdatacaymoc;i++){
                            
                                $("#addcaythanhpham #macaymoc").append("<option value ='"+data[1][i].id+"'>Mã : "+data[1][i].id+"---Dài : "+data[1][i].so_met+" mét ---Ngày Dệt : "+data[1][i].ngay_gio_det.toString()+"</option>");

                            }
                        $("#addcaythanhpham #dongia").val(data[0].loai_vai.don_gia);
                            
                        }else{
                            $("#addcaythanhpham #macaymoc").append("<option value=''>Không Tồn Tại Cây Mộc Nào Trong Lô Nhuộm</option>");
                            
                        }
                        
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            }
        });
        $("#addcaythanhpham #so_met").change(function(){
            var dongia  = $("#addcaythanhpham #dongia").val();
            var somet = $(this).val();

            if(somet > 0){
                $("#addcaythanhpham #thanhtien").val(dongia*somet);
            }
            else{
                $(this).val("");
                $("#addcaythanhpham #thanhtien").val("");
                
            }
        });
        $("#capnhatcaythanhpham #so_met").change(function(){
            var dongia  = $("#capnhatcaythanhpham #dongia").val();
            var somet = $(this).val();

            if(somet > 0){
                $("#capnhatcaythanhpham #thanhtien").val(dongia*somet);
            }
            else{
                $(this).val("");
                $("#capnhatcaythanhpham #thanhtien").val("");
                
            }
        });
        $("#bodytable tr").click(function(){
            var id =  $(this).attr('id');
            $.ajax({
                method:"GET",
                url:"ajaxUpdate/manage_kho_kho_thanh_pham/"+id,
                success:function(data){
                    $("#capnhatcaythanhpham").attr('action','manage_kho_kho_thanh_pham/'+id);
                    
                    $("#capnhatcaythanhpham #malonhuom").val(data.lo_nhuom_id);
                    $("#capnhatcaythanhpham #mau").val(data.lo_nhuom.mau.ten);
                    $("#capnhatcaythanhpham #kho_id").val(data.kho_id);

                    var dateConvert =  new Date(data.ngay_gio_nhap_kho).toISOString();
                    var dateString =  dateConvert.substring(0,dateConvert.lastIndexOf("."));
                    
                    $("#capnhatcaythanhpham #ngay_gio_nhap_kho").val(dateString);
                    $("#capnhatcaythanhpham #loaivai").val(data.loai_vai.ten);
                    $("#capnhatcaythanhpham #macaythanhpham").val(data.id);
                    if(data.kich_co== 1 || data.kich_co== 2){
                        console.log(data.kich_co);
                        $("#capnhatcaythanhpham #kichco").val(data.kich_co+".0");
                    }else{
                        $("#capnhatcaythanhpham #kichco").val(data.kich_co);
                    }
                    
                    $("#capnhatcaythanhpham #dongia").val(data.don_gia);
                    $("#capnhatcaythanhpham #so_met").val(data.so_met).change();
                },
                fail:function(xhr){
                    alert(xhr);
                }
            }).then(function(){
                var idlonhuom = $("#capnhatcaythanhpham #malonhuom").val();
                $.ajax({
                    method:"GET",
                    url:'ajaxUpdateListCayMocSanCo/manage_kho_kho_thanh_pham/'+idlonhuom,
                    success:function(data){
                        var lengthcaymoc = data.length;
                        $("#capnhatcaythanhpham #macaymoc").empty();

                        if(lengthcaymoc !=0){
                            for(i= 0; i<lengthcaymoc ; i++){
                                $("#capnhatcaythanhpham #macaymoc").append("<option value=''>Mời Chọn Cây Mộc , Nếu Không Thông Tin Cây Mộc Liên Quan Sẽ Giữ Nguyên</option>");
                                $("#capnhatcaythanhpham #macaymoc").append("<option value ='"+data[i].id+"'>Mã : "+data[i].id+"---Dài : "+data[i].so_met+" mét ---Ngày Dệt : "+data[i].ngay_gio_det.toString()+"</option>");
                                
                            }
                        }else{
                                $("#capnhatcaythanhpham #macaymoc").append("<option value=''>Không Có Cây Mộc Khác, Thông tin cây mộc sẽ được giữ nguyên</option>");
                            
                        }
                        
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            });
        });
    </script>
@endsection