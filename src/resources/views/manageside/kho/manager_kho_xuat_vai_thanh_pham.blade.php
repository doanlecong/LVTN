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
        #danhsachcaythanhphamchoxuat label{
            font-size:15px;
        }
        #danhsachcaythanhphamchoxuat input{
            width:15px;
            height : 15px;
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
                            <li class="active" id="tabli1"><a href="#tab1primary" data-toggle="tab"><h4>Xuất Vải Thành Phẩm</h4></a></li>
                            <li id="tabli2"><a href="#tab2primary" data-toggle="tab"><h4>Cập Nhật Xuất Vải Thành Phẩm</h4></a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                        <h3 class="panel-title">Thông tin xuất vải thành phẩm</h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body" id="xuatmoc">
                                <div class="row">
                        
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lựa chọn xuất vải thành phẩm</h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'manage_kho_xuat_thanh_pham','method'=>'POST', 'class'=> 'form-group' ,'id'=>'addphieuxuatthanhpham','onsubmit'=>'return validateForm();'])}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{Form::label('ma_phieu_xuat_thanh_pham_id','Mã Phiếu Xuất Vải Thành Phẩm : ')}}
                                                                
                                                                <select name="ma_phieu_xuat_thanh_pham_id" id="ma_phieu_xuat_thanh_pham_id" class="form-control" required="required">
                                                                    @if( $hoadonchuaxuat->count() >0)
                                                                        <option value="">---Mời Chọn Hóa Đơn Xuất Vải Thành Phẩm ---</option>
                                                                        @foreach($hoadonchuaxuat as $hoadon)
                                                                            <option value="{{$hoadon->id}}">{{$hoadon->id}}---{{$hoadon->don_hang_khach_hang->loai_vai->ten}}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="">---Hiện Tại Không Có Hóa Đơn Xuất ---</option>
                                                                    @endif
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <hr>
                                                            <h5><strong>Chọn Cây Thành Phẩm Muốn Xuất</strong></h5><br>
                                                            <div class="form-group" id="danhsachcaythanhphamchoxuat">
                                                                {{Form::label('','Mời Chọn Hóa Đơn Xuất Để Hiện Thị Danh Sách : ')}}
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                            <button type="submit" class="btn btn-large btn-block btn-warning">Xuất Cây Thành Phẩm</button>
                                                            
                                                            <!--<button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Đóng</button>-->
                                                        </div>
                                                    {{Form::close()}}
                                                </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="xuatcaythanhpham">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Đơn Hàng Khách Hàng liên quan <small>(Thông tin lấy từ hệ thống bán hàng)</small> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        {{Form::label('ma_donhang','Mã Đơn Hàng Khách Hàng : ')}}
                                                        {{Form::text('ma_donhang',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                     <div class="form-group">
                                                        {{Form::label('ten_khachhang','Khách Hàng : ')}}
                                                        {{Form::text('ten_khachhang',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('loai_vai','Loại Vải : ')}}
                                                        {{Form::text('loai_vai',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('mau','Màu Vải : ')}}
                                                        {{Form::text('mau',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('tong_so_met','Tổng Số Mét Vải Đặt(m) : ')}}
                                                        {{Form::text('tong_so_met',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('dagiao','Tổng Số Mét Vải Đã Giao(m) : ')}}
                                                        {{Form::text('dagiao',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('ngay_gio_dat_hang','Ngày Giờ Đặt Hàng : ')}}
                                                        {{Form::text('ngay_gio_dat_hang',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
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
                                        <h3 class="panel-title">Cập Nhật Thông Tin Xuất Vải Thành Phẩm</h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body">
                                <div class="row" id="capnhatxuatthanhpham">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary" >
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Phiếu xuất thành phẩm liên quan <small> (Lựa chọn phiếu xuất thành phẩm đã từng được xuất)</small></h3>
                                                </div>
                                                <div class="panel-body" >
                                                   
                                                        <div class="form-group">
                                                            {{Form::label('donhangkh','Đơn Hàng Khách Hàng :')}}
                                                            <select name="donhangkh" id="donhangkh" class="form-control" required="required">
                                                                <option value="">Mời Chọn Đơn Hàng Khách Hàng Đã Đặt</option>
                                                                @foreach($donhangkhachhang as $donhang)
                                                                    <option value="{{$donhang->id}}">Mã : {{$donhang->id}} -- Loại Vải : {{$donhang->loai_vai->ten}} -- Màu : {{$donhang->mau->ten}} -- Khách Hàng : {{$donhang->khach_hang->ten}} -- Số Lượng : {{$donhang->tong_so_met}} mét</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                         <div class="form-group">
                                                            {{Form::label('loai_vai','Loại Vải : ')}}
                                                            {{Form::text('loai_vai',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_cay_thanh_pham','Tổng Số Cây Thành Phẩm Đã Xuất : ')}}
                                                            {{Form::text('tong_cay_thanh_pham',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('tong_so_met','Tổng Số Mét Vải (m) : ')}}
                                                            {{Form::text('tong_so_met',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            {{Form::label('ngay_gio_dat_hang','Ngày Giờ Đặt Hàng : ')}}
                                                            {{Form::text('ngay_gio_dat_hang',null,['class'=>'form-control','readonly'=>'readonly'])}}
                                                            
                                                        </div>
                                                        
                                                        
                                                           
                                                       
                                                    
                                                </div>
                                        </div>
                                        
                                    </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Chỉnh sửa thông tin xuất vải thành phẩm <small>(Cập nhật lại thông tin của một số cây thành phẩm đã được xuất : Chưa Xuất / Đã Xuất)</small></h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'chinhsuaxuatthanhpham'])}}
                                                        <div class="modal-body" id="datacaythanhpham">
                                                            <div class="form-group">
                                                                {{Form::label('hoadonxuat','Danh Sách Hóa Đơn Xuất Liên Quan : ')}}
                                                                <select name="hoadonxuat" id="hoadonxuat" class="form-control" required="required">
                                                                    <option value="">Mời Chọn Đơn Hàng Để Hiện Ra Danh Sách Hóa Đơn Liên Quan</option>
                                                                </select>
                                                            </div>
                                                            <h5><strong>Danh Sách Cây Thành Phẩm Đã Được Xuất <small>(Chỉ chỉnh sửa lại khi có sai xót khi xuất)</small></strong></h5><br>
                                                            <div id="listcaythanhphamlienquan">
                                                                
                                                            </div>
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
        $("#addphieuxuatthanhpham #ma_phieu_xuat_thanh_pham_id").change(function(){
            var id  = $(this).val();
            $("#addphieuxuatthanhpham #danhsachcaythanhphamchoxuat").empty();
             if(id != ""){
                 $.ajax({
                    method:"GET",
                    url:'ajaxselecthoadon/manage_kho_xuat_thanh_pham/'+id,
                    success:function(data){
                          var danhsachcaythanhpham = $("#addphieuxuatthanhpham #danhsachcaythanhphamchoxuat");
                          //$("#addphieuxuatthanhpham #loai_vai_id").val(data.don_hang_khach_hang.loai_vai.ten)
                          danhsachcaythanhpham.empty();
                          danhsachcaythanhpham.append("<lable>Mời Chọn Danh Sách Cây Thành Phẩm (<small>Lấy ra từ hóa đơn</small>) :</option>");
                          for(i = 0 ;i<data[0].danh_sach_cay_thanh_pham_cho_xuat.length;i++){
                              console.log(i);   
                              danhsachcaythanhpham.append(" <div class='checkbox'>"
                                                                    +"<label><input name='caythanhpham[]' type='checkbox' value='"+data[0].danh_sach_cay_thanh_pham_cho_xuat[i].cay_vai_thanh_pham.id+"'>Mã : "+data[0].danh_sach_cay_thanh_pham_cho_xuat[i].cay_vai_thanh_pham.id+" --Kích Cỡ : "+data[0].danh_sach_cay_thanh_pham_cho_xuat[i].cay_vai_thanh_pham.kich_co+" mét -- Dài : "+data[0].danh_sach_cay_thanh_pham_cho_xuat[i].cay_vai_thanh_pham.so_met+"</label>"
                                                            +"</div>")
                          }
                          $("#xuatcaythanhpham #ma_donhang").val(data[0].don_hang_khach_hang_id);
                          $("#xuatcaythanhpham #ten_khachhang").val(data[0].don_hang_khach_hang.khach_hang.ten);
                          $("#xuatcaythanhpham #loai_vai").val(data[0].don_hang_khach_hang.loai_vai.ten);
                          $("#xuatcaythanhpham #mau").val(data[0].don_hang_khach_hang.loai_vai.ten);
                          $("#xuatcaythanhpham #mau").css("background-color",data[0].don_hang_khach_hang.mau.ma_mau);
                          $("#xuatcaythanhpham #tong_so_met").val(data[0].don_hang_khach_hang.tong_so_met);
                          $("#xuatcaythanhpham #dagiao").val(data[1]);
                          $("#xuatcaythanhpham #ngay_gio_dat_hang").val(data[0].don_hang_khach_hang.ngay_gio_dat_hang);
                          
                          
                          
                    },      
                    fail:function(xhr){
                        alert(xhr);
                    }
                 });
             }else{
                 $("#addphieuxuatthanhpham #danhsachcaythanhphamchoxuat").append('<lable>Mời Chọn Hóa Đơn Xuất Để Hiện Thị Danh Sách :</lable> ');
             }
        });
        $("#capnhatxuatthanhpham #donhangkh").change(function(){
            var id = $(this).val();
            $("#capnhatxuatthanhpham #loai_vai").val("");
            $("#capnhatxuatthanhpham #tong_cay_thanh_pham").val("");
            $("#capnhatxuatthanhpham #tong_so_met").val("");
            $("#capnhatxuatthanhpham #ngay_gio_dat_hang").val("");
            
            
            if(id !=""){
                $.ajax({
                    method:"GET",
                    url:"ajaxselectdonhang/manage_kho_xuat_thanh_pham/"+id,
                    success:function(data){
                        $("#capnhatxuatthanhpham #loai_vai").val(data[0].loai_vai.ten);
                        $("#capnhatxuatthanhpham #tong_cay_thanh_pham").val(data[1]);
                        $("#capnhatxuatthanhpham #tong_so_met").val(data[2]);
                        $("#capnhatxuatthanhpham #ngay_gio_dat_hang").val(data[0].ngay_gio_dat_hang);

                        $("#chinhsuaxuatthanhpham #hoadonxuat").empty();
                        if(data[0].hoa_don_xuats.length != 0){
                            $("#chinhsuaxuatthanhpham #hoadonxuat").append("<option value=''>Mời Chọn Hóa Đơn Xuất</option>");
                            for(var i = 0 ; i<data[0].hoa_don_xuats.length; i++){
                                $("#chinhsuaxuatthanhpham #hoadonxuat").append("<option value='"+data[0].hoa_don_xuats[i].id+"'>Mã :"+data[0].hoa_don_xuats[i].id+" -- Ngày Xuất : "+data[0].hoa_don_xuats[i].ngay_gio_xuat_hoa_don +" Nhân Viên: "+data[0].hoa_don_xuats[i].nhan_vien_xuat.ten+"</option>");
                                
                            }
                        }
                        else{
                            $("#chinhsuaxuatthanhpham #hoadonxuat").append("<option value=''>Không có Hóa Đơn Xuât Nào Trong Đơn Hàng Này</option>");                            
                        }
                        
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                });
            }else{
                $("#chinhsuaxuatthanhpham #hoadonxuat").empty();
                $("#chinhsuaxuatthanhpham #hoadonxuat").append("<option>Mời Chọn Đơn Hàng Để Hiện thị Danh Sách Hóa Đơn Liên Quan</option>");
                $("#datacaythanhpham #listcaythanhphamlienquan").empty();
                $("#btnsubmitchinhsua").hide();
                
                
            }
        });
        $("#chinhsuaxuatthanhpham #hoadonxuat").change(function(){
            var id = $(this).val();
            if(id!=""){
                $.ajax({
                    method:"GET",
                    url: 'ajaxHoaDonChange/manage_kho_xuat_thanh_pham/'+id,
                    success:function(data){
                        var soluongcaythanhpham = data.length;
                        if(soluongcaythanhpham != 0 ){
                            $("#chinhsuaxuatthanhpham").attr('action','update/manage_kho_xuat_thanh_pham/'+id);
                            var danhsachcayvai = $("#datacaythanhpham #listcaythanhphamlienquan");
                            danhsachcayvai.empty();
                            $("#btnsubmitchinhsua").show();
                            
                            for(var i = 0 ; i<soluongcaythanhpham ; i++){
                                danhsachcayvai.append("<div class='form-group' id='form"+i+"'></div>");
                                $("#listcaythanhphamlienquan #form"+i).append("<div class='input-group input-group-md' id='inputgroup"+i+"'></div>");
                                $("#inputgroup"+i).append("<label for='selectspan"+i+"' class='input-group-addon'>Cây Vải Số : "+data[i].id+"--- Dài : "+data[i].so_met+"--- Ngày Nhập Kho : "+data[i].ngay_gio_nhap_kho.toString()+"</label>");
                                $("#inputgroup"+i).append("<span class='input-group-addon' id='selectspan"+i+"'></span>");
                                $("#selectspan"+i).append("<select name='select"+data[i].id+"' onChange='changeColor(this)' id='select"+data[i].id+"' class='form-control' >"
                                                                +"<option value='Chưa Xuất'>Chưa Xuất</option>"
                                                                +"<option value='Đã Xuất'>Đã Xuất</option>"
                                                           +"</select>");
                                $("#select"+data[i].id).val(data[i].tinh_trang);
                                $("#datacaymoc #form"+i).hide();
                                $("#datacaymoc #form"+i).fadeIn();
                            }
                        }else {
                            $("#datacaythanhpham #listcaythanhphamlienquan").empty();
                            $("#datacaythanhpham #listcaythanhphamlienquan").append("<p>Hoá Đơn Xuất Được Chọn Hiện Chưa Có Cây Thành Phẩm Được xuất ! Mời Chuyển Sang Xuất Vải Thành Phẩm</p>");
                            $("#datacaythanhpham #listcaythanhphamlienquan").append("<button type='button' id='xuatmockhiphieurong'class='btn btn-default' href='#tab1primary' data-toggle='tab'>Xuất Vải Thành Phẩm</button>");

                            $("#btnsubmitchinhsua").hide();
                        }
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
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
            var checkbox = document.getElementsByName('caythanhpham[]');
            var ln = 0;
            for(var i=0; i< checkbox.length; i++) {
                if(checkbox[i].checked)
                    ln++
            }
            if(ln==0 ){
                alert("Không Có Cây Mộc Nào Được Chọn !");
                return false;
            }
            return true;
        }
    </script>
@endsection