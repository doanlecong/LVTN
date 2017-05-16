@extends('index')
@section('title',' | Trang Thanh Toán ')
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
                            <li class="active" id="tabli1"><a href="#tab1primary" data-toggle="tab"><h4>Thanh Toán </h4></a></li>
                            <li id="tabli2"><a href="#tab2primary" data-toggle="tab"><h4>Cập Nhật Thanh Toán </h4></a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                        <h3 class="panel-title">Thông tin Thanh Toán </h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body" id="xuatmoc">
                                <div class="row">
                        
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lựa Chọn Khách Hàng </h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'manage_ban_hang_thanh_toan','method'=>'POST', 'class'=> 'form-group' ,'id'=>'thanhtoanform','onsubmit'=>'return validateForm();'])}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{Form::label('khachhang','Khách Hàng :')}}
                                                    
                                                                <select name="khachhang" id="khachhang" class="form-control" required="required">
                                                                    @if($listkhachhang->count() !=0)
                                                                        <option value="">Mời Chọn Khách Hàng </option>
                                                                        @foreach($listkhachhang as $khachhang)
                                                                            <option value="{{$khachhang->id}}">{{$khachhang->id}} -- {{$khachhang->ten}} -- Công Nợ Hiện Tại : {{$khachhang->cong_no}} @if($khachhang->ghi_chu !=NULL) --- Dư Tài Khoản :{{$khachhang->ghi_chu}}  @endif</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="">Không có Khách Hàng Nào trong Hệ thống</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <hr>
                                                            <h5 class="text-danger"><strong>Thông tin Thanh Toán</strong> </h5>
                                                            <div class="form-group">
                                                                {{Form::label('sotien','Số Tiền(VND) :',['class'=>'text-danger','id'=>'lable1'])}}
                                                                {{Form::number('sotien',null,['class'=>'form-control','required'=>'required','style'=>'color:red;'])}}
                                                            </div>
                                                            <h6 class="text-danger">Xác nhận lại số tiền</h6>
                                                            <div class="form-group">
                                                                {{Form::label('sotien1','Số Tiền Xác Nhận(VND) :',['class'=>'text-danger','id'=>'lable2'])}}
                                                                {{Form::number('sotien1',null,['class'=>'form-control','required'=>'required','style'=>'color:red;'])}}
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-large btn-block btn-warning">Thực Hiện Thanh Toán</button>
                                                        </div>
                                                    {{Form::close()}}
                                                    
                                                    
                                                    
                                                </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" id="donhanglienquan">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Đơn Hàng Liên Quan </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <h5><strong>Danh Sách Các Đơn Hàng Liên Quan</strong></h5>
                                                    <div id="danhsachdonhang">
                                                        <ul class="list-group">
                                                            <!--<li class="list-group-item">New <span class="badge">12</span></li>
                                                            <li class="list-group-item">Deleted <span class="badge">5</span></li> 
                                                            <li class="list-group-item">Warnings <span class="badge">3</span></li> -->
                                                        </ul>
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
                                        <h3 class="panel-title">Cập Nhật Thanh Toán</h3>
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
                                                   
                                                       
                                                </div>
                                        </div>
                                        
                                    </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Chỉnh sửa thông tin xuất vải thành phẩm <small>(Cập nhật lại thông tin của một số cây thành phẩm đã được xuất : Chưa Xuất / Đã Xuất)</small></h3>
                                                </div>
                                                <div class="panel-body">
                                                    
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
        var ChuSo=new Array(" không "," một "," hai "," ba "," bốn "," năm "," sáu "," bảy "," tám "," chín ");
        var Tien=new Array( "", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ");

        //1. Hàm đọc số có ba chữ số;
        function DocSo3ChuSo(baso)
        {
            var tram;
            var chuc;
            var donvi;
            var KetQua="";
            tram=parseInt(baso/100);
            chuc=parseInt((baso%100)/10);
            donvi=baso%10;
            if(tram==0 && chuc==0 && donvi==0) return "";
            if(tram!=0)
            {
                KetQua += ChuSo[tram] + " trăm ";
                if ((chuc == 0) && (donvi != 0)) KetQua += " linh ";
            }
            if ((chuc != 0) && (chuc != 1))
            {
                    KetQua += ChuSo[chuc] + " mươi";
                    if ((chuc == 0) && (donvi != 0)) KetQua = KetQua + " linh ";
            }
            if (chuc == 1) KetQua += " mười ";
            switch (donvi)
            {
                case 1:
                    if ((chuc != 0) && (chuc != 1))
                    {
                        KetQua += " mốt ";
                    }
                    else
                    {
                        KetQua += ChuSo[donvi];
                    }
                    break;
                case 5:
                    if (chuc == 0)
                    {
                        KetQua += ChuSo[donvi];
                    }
                    else
                    {
                        KetQua += " lăm ";
                    }
                    break;
                default:
                    if (donvi != 0)
                    {
                        KetQua += ChuSo[donvi];
                    }
                    break;
                }
            return KetQua;
        }

        //2. Hàm đọc số thành chữ (Sử dụng hàm đọc số có ba chữ số)

        function DocTienBangChu(SoTien)
        {
            var lan=0;
            var i=0;
            var so=0;
            var KetQua="";
            var tmp="";
            var ViTri = new Array();
            if(SoTien<0) return "Số tiền âm ";
            if(SoTien==0) return "Không ";
            if(SoTien>0)
            {
                so=SoTien;
            }
            else
            {
                so = -SoTien;
            }
            if (SoTien > 8999999999999999)
            {
                //SoTien = 0;
                return "Số quá lớn!";
            }
            ViTri[5] = Math.floor(so / 1000000000000000);
            if(isNaN(ViTri[5]))
                ViTri[5] = "0";
            so = so - parseFloat(ViTri[5].toString()) * 1000000000000000;
            ViTri[4] = Math.floor(so / 1000000000000);
            if(isNaN(ViTri[4]))
                ViTri[4] = "0";
            so = so - parseFloat(ViTri[4].toString()) * 1000000000000;
            ViTri[3] = Math.floor(so / 1000000000);
            if(isNaN(ViTri[3]))
                ViTri[3] = "0";
            so = so - parseFloat(ViTri[3].toString()) * 1000000000;
            ViTri[2] = parseInt(so / 1000000);
            if(isNaN(ViTri[2]))
                ViTri[2] = "0";
            ViTri[1] = parseInt((so % 1000000) / 1000);
            if(isNaN(ViTri[1]))
                ViTri[1] = "0";
            ViTri[0] = parseInt(so % 1000);
            if(isNaN(ViTri[0]))
                    ViTri[0] = "0";
                if (ViTri[5] > 0)
                {
                    lan = 5;
                }
                else if (ViTri[4] > 0)
                {
                    lan = 4;
                }
                else if (ViTri[3] > 0)
                {
                    lan = 3;
                }
                else if (ViTri[2] > 0)
                {
                    lan = 2;
                }
                else if (ViTri[1] > 0)
                {
                    lan = 1;
                }
                else
                {
                    lan = 0;
                }
                for (i = lan; i >= 0; i--)
                {
                tmp = DocSo3ChuSo(ViTri[i]);
                KetQua += tmp;
                if (ViTri[i] > 0) KetQua += Tien[i];
                if ((i > 0) && (tmp.length > 0)) KetQua += ',';//&& (!string.IsNullOrEmpty(tmp))
                }
            if (KetQua.substring(KetQua.length - 1) == ',')
            {
                    KetQua = KetQua.substring(0, KetQua.length - 1);
            }
            KetQua = KetQua.substring(1,2).toUpperCase()+ KetQua.substring(2);
            return KetQua;//.substring(0, 1);//.toUpperCase();// + KetQua.substring(1);
        }
       $("#thanhtoanform #khachhang").change(function(){
            var id = $(this).val();
            $("#thanhtoanform #sotien").val("");
            $("#thanhtoanform #sotien1").val("");
            $("#danhsachdonhang ul").empty();
            if(id!=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxselectkhachhang/manage_ban_hang_thanh_toan/'+id,
                    success:function(data){
                        var lengthlist = data.length;
                        if(lengthlist != 0 ){
                            for(var i = 0 ; i < lengthlist ; i++ ){
                                 $("#danhsachdonhang ul").append("<li class='list-group-item' style='border-color: blueviolet;'>Mã Đơn Hàng : "+data[i].id+" -- Loại Vải : "+data[i].loai_vai.ten+" -- Màu : "+data[i].mau.ten+" -- Tổng Số Mét : "+data[i].tong_so_met+" -- Chiết Khấu :"+data[i].chiet_khau+"% <span class='label label-info' style='font-size: 0.9em;'>Thành Tiền : "+data[i].tong_so_met*data[i].loai_vai.don_gia*(100-data[i].chiet_khau)/100+" VND</span></li>")
                            }
                        }else{  

                            $("#danhsachdonhang ul").append("<h5 class='text-danger'><strong>Không Có Đơn Hàng Nào Thuộc Khách Hàng Đang Chọn<strong></h5>");
                        }
                       
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            }
            
       });
       $("#thanhtoanform #sotien , #thanhtoanform #sotien1").change(function(){
            var sotien  = $("#thanhtoanform #sotien").val();
            console.log('1 :'+sotien );
            var sotien1  = $("#thanhtoanform #sotien1").val();
            console.log('2 :'+sotien1 );
            $("#thanhtoanform #lable1").text("Số Tiền(VND) : "+DocTienBangChu(sotien)+" Đồng");
            $("#thanhtoanform #lable2").text("Số Tiền Xác Nhận(VND) : "+DocTienBangChu(sotien1)+" Đồng");
            
            if(sotien =="" || sotien1 ==""){
            $()
            }else if(sotien <= 0 ||sotien1 <= 0  ){
                alert('Nhập Sai THông Tin');
                $("#thanhtoanform #sotien").val("");
                $("#thanhtoanform #sotien1").val("");
            }else if(sotien!=sotien1){
                alert('Không Trùng Khớp');
                $("#thanhtoanform #sotien").val("");
                $("#thanhtoanform #sotien1").val("");   
            }
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
            var so = $("#thanhtoanform #sotien").val();
            if(so==0 ||so ==""){
                alert("Số Tiền Nhập Sai !");
                return false;
            }
            return true;
        }
    </script>
@endsection