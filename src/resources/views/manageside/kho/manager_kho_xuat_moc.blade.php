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
        .fade{
            opacity: 0;
            -webkit-transition: opacity 0.1s linear;
                -moz-transition: opacity 0.1s linear;
                -ms-transition: opacity 0.1s linear;
                    -o-transition: opacity 0.1s linear;
                    transition: opacity 0.1s linear;
        }
        .datacaymoc{
            margin-top:5px;
        }
    </style>
@endsection
@section('left_nav')
   @include('manageside.leftside_nav')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--<h1 class="page-header">
                Trang Quản Lý Tổng <small>Chào!!</small>
            </h1>-->
            @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif
            
            
            
            </div>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active" id="tabli1"><a href="#tab1primary" data-toggle="tab"><h4>Xuất Mộc</h4></a></li>
                            <li id="tabli2"><a href="#tab2primary" data-toggle="tab"><h4>Cập Nhật Xuất Mộc</h4></a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                        <h3 class="panel-title">Thông tin xuất mộc</h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body" id="xuatmoc">
                                <div class="row">
                        
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lựa chọn xuất mộc</h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'manage_kho_xuat_moc','method'=>'POST', 'class'=> 'form-group' ,'id'=>'addphieuxuatmoc','onsubmit'=>'return validateForm();'])}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{Form::label('ma_phieu_xuat_moc_id','Mã Phiếu Xuất Mộc : ')}}
                                                                
                                                                <select name="ma_phieu_xuat_moc_id" id="ma_phieu_xuat_moc_id" class="form-control" required="required">
                                                                    <option value="">---Mời Chọn Phiếu Xuất Vải ---</option>
                                                                    @foreach($list_phieuxuat as $phieuxuat)
                                                                        <option value="{{$phieuxuat->id}}">{{$phieuxuat->id}}---{{$phieuxuat->loai_vai->ten}}---{{$phieuxuat->kho->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                            </div>
                                                            <hr>
                                                            <h5><strong>Chọn Cây Mộc Muốn Xuất</strong></h5><br>
                                                            <div class="form-group">
                                                                {{Form::label('ma_cay_moc_id','Mã Cây Mộc : ')}}

                                                                <select name="ma_cay_moc_id" id="ma_cay_moc_id" class="form-control" required="required">
                                                                    <option value="">Mời chọn cây mộc</option>
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('loai_vai_id','Loại Vải : ')}}
                                                                {{Form::text('loai_vai_id',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                {{Form::label('so_met','Số Mét : ')}}
                                                                {{Form::text('so_met',null,['class'=>'form-control','readonly'=>'readonly'])}}

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                            <button type="submit" class="btn btn-large btn-block btn-warning">Xuất Cây Mộc</button>
                                                            
                                                            <!--<button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>-->
                                                        </div>
                                                    {{Form::close()}}
                                                </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Phiếu xuất mộc liên quan</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        {{Form::label('ma_phieu_xuat_moc','Mã Phiếu Xuất Mộc : ')}}
                                                        {{Form::text('ma_phieu_xuat_moc',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('loai_vai','Loại Vải : ')}}
                                                        {{Form::text('loai_vai',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('tong_cay_moc','Tổng Số Cây Mộc Đã Xuất : ')}}
                                                        {{Form::text('tong_cay_moc',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('tong_so_met','Tổng Số Mét Vải (m) : ')}}
                                                        {{Form::text('tong_so_met',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('kho', 'Kho Xuất : ')}}
                                                        {{Form::text('kho',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('nhan_vien_xuat','Nhân Viên Xuất Phiếu : ')}}
                                                        {{Form::text('nhan_vien_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('ngay_gio_xuat','Ngày Giờ Xuất Phiếu : ')}}
                                                        {{Form::text('ngay_gio_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                        
                                    </div>
                        
                                </div>
                            </div>  

                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                             <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                        <h3 class="panel-title">Cập Nhật Thông Tin Xuất Mộc</h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body">
                                <div class="row" id="capnhatxuatmoc">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary" >
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Phiếu xuất mộc liên quan <small> (Lựa chọn phiếu xuất mộc đã từng được xuất)</small></h3>
                                                </div>
                                                <div class="panel-body" >
                                                   
                                                        <div class="form-group">
                                                            {{Form::label('ma_phieu_xuat_moc_id','Mã Phiếu Xuất Mộc : ')}}
                                                            <select name="ma_phieu_xuat_moc_id" id="ma_phieu_xuat_moc_id" class="form-control" required="required">
                                                                    <option value="">---Mời Chọn Phiếu Xuất Vải ---</option>
                                                                    @foreach($list_phieuxuat as $phieuxuat)
                                                                        <option value="{{$phieuxuat->id}}">{{$phieuxuat->id}}---{{$phieuxuat->loai_vai->ten}}---{{$phieuxuat->kho->ten}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <hr>    
                                                        <div class="form-group">
                                                            {{Form::label('loai_vai','Loại Vải : ')}}
                                                            {{Form::text('loai_vai',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_cay_moc','Tổng Số Cây Mộc Đã Xuất : ')}}
                                                            {{Form::text('tong_cay_moc',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_so_met','Tổng Số Mét Vải (m) : ')}}
                                                            {{Form::text('tong_so_met',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('kho', 'Kho Xuất : ')}}
                                                            {{Form::text('kho',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('nhan_vien_xuat','Nhân Viên Xuất Phiếu : ')}}
                                                            {{Form::text('nhan_vien_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('ngay_gio_xuat','Ngày Giờ Xuất Phiếu : ')}}
                                                            {{Form::text('ngay_gio_xuat',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                    
                                                </div>
                                        </div>
                                        
                                    </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Chỉnh sửa thông tin xuất mộc <small>(Cập nhật lại thông tin của một số cây mộc đã được xuất : Chưa Xuất / Đã Xuất)</small></h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'chinhsuaxuatmoc'])}}
                                                        <div class="modal-body" id="datacaymoc">
                                                           
                                                            <h5><strong>Danh Sách Cây Mộc Đã Được Xuất <small>(Chỉ chỉnh sửa lại khi có sai xót khi xuất)</small></strong></h5><br>
                                                           <!--Cho nay se duoc them data dong thong qua jquery :danh sach cac cay moc da duoc xuat trong phieu xuat moc lien quan-->
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                            <button type="submit" id ="btnsubmitchinhsua" class="btn btn-large btn-block btn-warning">Chỉnh Sửa Thông Tin</button>
                                                            
                                                        </div>
                                                    {{Form::close()}}
                                                </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    <script>

        $("#xuatmoc #ma_phieu_xuat_moc_id").change(function(){
            var id = $(this).val();
            $("#xuatmoc #loai_vai_id").val("");
            $("#xuatmoc #so_met").val("");
            
            if(id !=""){
                 $.ajax({
                    method:"GET",
                    url:'ajaxselect/manage_kho_xuat_moc/'+id,
                    success:function(data){
                        // console.log(data.length);
                        // console.log(data[1].loai_vai_id);
                        var macaymocselect = $("#xuatmoc #ma_cay_moc_id");
                        macaymocselect.empty();
                        console.log(data[0].length)
                        if(data[0].length!=0){
                            macaymocselect.attr('title','');
                            macaymocselect.append("<option value=''>Mời Chọn Cây Mộc Muốn Xuất</option>");
                            for(i = 0 ;i<data[0].length;i++){
                                macaymocselect.append("<option value='"+data[0][i].id+"'>"+data[0][i].id+"---- Dài : "+data[0][i].so_met+" mét</option>");
                            }
                        }else{
                            macaymocselect.attr('title','Loại Vải Thuộc Phiếu Xuất Mộc Trong Kho Đã Hết ! Xin Lỗi');
                            macaymocselect.append("<option value='' title='"+"Loại Vải Thuộc Phiếu Xuất Mộc Trong Kho Đã Hết ! Xin Lỗi"+"'>Loại Vải Thuộc Phiếu Xuất Mộc Trong Kho Đã Hết ! Xin Lỗi </option>");
                        }
                       
                        $("#xuatmoc #ma_phieu_xuat_moc").val(data[1].id);
                        $("#xuatmoc #loai_vai").val(data[1].loai_vai.ten);
                        $("#xuatmoc #tong_cay_moc").val(data[1].tong_so_cay_moc);
                        $("#xuatmoc #tong_so_met").val(data[1].tong_so_met);
                        $("#xuatmoc #kho").val(data[1].kho.ten);
                        $("#xuatmoc #nhan_vien_xuat").val(data[1].nhan_vien_xuat.ten);
                        $("#xuatmoc #ngay_gio_xuat").val(data[1].ngay_gio_xuat_kho);
                        
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                });
            }
           
        });
        $("#capnhatxuatmoc #ma_phieu_xuat_moc_id").change(function(){
            var id = $(this).val();
            $("#capnhatxuatmoc #loai_vai_id").val("");
            $("#capnhatxuatmoc #so_met").val("");
            $("#capnhatxuatmoc #loai_vai").val("");
            $("#capnhatxuatmoc #tong_cay_moc").val("");
            $("#capnhatxuatmoc #tong_so_met").val("");
            $("#capnhatxuatmoc #kho").val("");
            $("#capnhatxuatmoc #nhan_vien_xuat").val("");
            $("#capnhatxuatmoc #ngay_gio_xuat").val("");
            $("#datacaymoc").empty();
            if(id!=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxUpdateXuatMoc/manage_kho_xuat_moc/'+id,
                    success:function(data){
                        console.log(data);
                        // Cap nhat cac thong so cua bang phieu xuat moc
                        $("#capnhatxuatmoc #loai_vai").val(data.loai_vai.ten);
                        $("#capnhatxuatmoc #tong_cay_moc").val(data.tong_so_cay_moc);
                        $("#capnhatxuatmoc #tong_so_met").val(data.tong_so_met);
                        $("#capnhatxuatmoc #kho").val(data.kho.ten);
                        $("#capnhatxuatmoc #nhan_vien_xuat").val(data.nhan_vien_xuat.ten);
                        $("#capnhatxuatmoc #ngay_gio_xuat").val(data.ngay_gio_xuat_kho);
                        
                        // Hien thong tin cac cay moc lien quan 
                        var  soluongcaymocdaxuat = data.cay_vai_mocs.length;
                        console.log(soluongcaymocdaxuat);
                        if(soluongcaymocdaxuat == 0){
                            $("#chinhsuaxuatmoc #datacaymoc").append("<h5><strong>Không Có Cây Mộc Được Xuất Trong Phiếu Xuất Này<small>(Chỉ có khi phiếu xuất đã xuất cây mộc)</small></strong></h5><br>");                            
                            $("#chinhsuaxuatmoc #datacaymoc").append("<button type='button' id='xuatmockhiphieurong'class='btn btn-default' href='#tab1primary' data-toggle='tab'>Thực Hiện Xuất Mộc</button>");
                            $("#btnsubmitchinhsua").attr('disabled','disabled');
                           
                            $("#datacaymoc h5, button").hide();
                            $("#datacaymoc h5, button").fadeIn(1000);
                            $("#btnsubmitchinhsua").hide();
                        }
                        else{
                            $("#chinhsuaxuatmoc").attr('action','update/manage_kho_xuat_moc/'+data.id);
                            $("#chinhsuaxuatmoc #datacaymoc").append("<h5><strong>Danh Sách Cây Mộc Đã Được Xuất <small>(Chỉ chỉnh sửa lại khi có sai xót khi xuất)</small></strong></h5><br>");                                
                            $("#btnsubmitchinhsua").removeAttr('disabled');
                            $("#btnsubmitchinhsua").show();
                            for(i = 0 ; i< soluongcaymocdaxuat;i++){
                                 $("#chinhsuaxuatmoc #datacaymoc").append("<div class='form-group' id='form"+i+"'></div>");
                                 $("#datacaymoc #form"+i).append("<div class='input-group input-group-md' id='inputgroup"+i+"'></div>");
                                 $("#inputgroup"+i).append("<label for='selectspan"+data.cay_vai_mocs[i].id+"' class='input-group-addon'>Cây Vải Số : "+data.cay_vai_mocs[i].id+"--- Dài : "+data.cay_vai_mocs[i].so_met+"--- Ngày Dệt : "+data.cay_vai_mocs[i].ngay_gio_det.toString()+"</label>");
                                 $("#inputgroup"+i).append("<span class='input-group-addon' id='selectspan"+i+"'></span>");
                                 $("#selectspan"+i).append("<select name='select"+data.cay_vai_mocs[i].id+"' onChange='changeColor(this)' id='select"+data.cay_vai_mocs[i].id+"' class='form-control' >"
                                                                +"<option value='Chưa Xuất'>Chưa Xuất</option>"
                                                                +"<option value='Đã Xuất'>Đã Xuất</option>"
                                                           +"</select>");
                                 $("#select"+data.cay_vai_mocs[i].id).val(data.cay_vai_mocs[i].tinh_trang);
                                 $("#datacaymoc #form"+i).hide();
                                 $("#datacaymoc #form"+i).fadeIn();
                                 

                            }
                            
                        }

                        

                    },
                    fail:function(xhr){
                        alert(xhr);
                    },
                })
            }
           
        });
        $("#xuatmoc #ma_cay_moc_id").change(function(){
            var id = $(this).val();
            if(id!=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxcaymoc/manage_kho_xuat_moc/'+id,
                    success:function(data){
                        $("#xuatmoc #loai_vai_id").val(data.loai_vai.ten);
                        $("#xuatmoc #so_met").val(data.so_met);
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            }else{
                $("#xuatmoc #loai_vai_id").val("");
                $("#xuatmoc #so_met").val("");
            }
        });
        $(document).ready(function(){
            $("#xuatmockhiphieurong").click(function(){
                $("#tabli1").attr("class","active");
                $("#tabli2").attr("class","");
            });
        });
        function changeColor(abc){
            // if($(this).val().toLowerCase()=="chưa xuất") $(this).css("background-color","red");
            // else{
            //     $(this).css("background-color","white");
            // }
            var value = abc.value;
            console.log(value);
            if(value =="Chưa Xuất"){
                $(abc).css({"background-color":"#c70470","color":"#caff00"});
            }else{
                $(abc).css({"background-color":"white","color":"black"});
            }
        }
        function validateForm(){
            $("#xuatmoc #ma_cay_moc_id");
            $("#xuatmoc #ma_phieu_xuat_moc_id");
            if($("#xuatmoc #ma_cay_moc_id").val()==""||$("#xuatmoc #ma_phieu_xuat_moc_id").val()==""){
                alert('Một Số Trường Còn Thiếu Hoặc Phiếu Xuất Bạn Chọn không tồn tại cây mộc ')
                return false;
            }
            return true;
        }
    </script>
@endsection