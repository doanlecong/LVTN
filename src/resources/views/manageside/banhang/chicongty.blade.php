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
                            <li class="active" id="tabli1"><a href="#tab1primary" data-toggle="tab"><h4>Chi Công Ty</h4></a></li>
                            <li id="tabli2"><a href="#tab2primary" data-toggle="tab"><h4>Cập Nhật Chi Công Ty</h4></a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <div class ="row ">
                                        <h3 class="panel-title">Thông tin Chi Công Ty</h3>
                                    </div>
                                </li> 
                            </ol>
                            <div class="panel-body" id="xuatmoc">
                                <div class="row">
                        
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lựa Chọn Nhà Cung Cấp </h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{Form::open(['url'=>'manage_ban_hang_chi_cong_ty','method'=>'POST', 'class'=> 'form-group' ,'id'=>'chiform','onsubmit'=>'return validateForm();'])}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{Form::label('nhacungcap','Nhà Cung Cấp :')}}
                                                    
                                                                <select name="nhacungcap" id="nhacungcap" class="form-control" required="required">
                                                                    @if($listnhacungcap->count() !=0)
                                                                        <option value="">Mời Chọn Nhà Cung Cấp</option>
                                                                        @foreach($listnhacungcap as $nhacungcap)
                                                                            <option value="{{$nhacungcap->id}}">{{$nhacungcap->id}} -- {{$nhacungcap->ten}} -- Công Nợ Hiện Tại : {{$nhacungcap->cong_no}} @if($nhacungcap->ghi_chu !=NULL) --- Dư Tài Khoản :{{$nhacungcap->ghi_chu}}  @endif</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="">Không có Nhà Cung Cấp Nào trong Hệ thống</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <hr>
                                                            <h5 class="text-danger"><strong>Thông tin Chi </strong> </h5>
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
                                <div class="row" id="capnhatchi">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary" >
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lựa Chọn Thông Tin Nhà Cung Cấp </h3>
                                                </div>
                                                <div class="panel-body" >
                                                    <div class="form-group">
                                                        {{Form::label('nhacungcap','Nhà Cung Cấp : ')}}
                                                        <select name="nhacungcap" id="nhacungcap" class="form-control" required="required">
                                                            <option value="">Mời Chọn Nhà Cung Cấp</option>
                                                            @foreach($listnhacungcap as $nhacungcap)
                                                                <option value="{{$nhacungcap->id}}">{{$nhacungcap->id}} -- Tên : {{$nhacungcap->ten}} -- Công Nợ Hiện Tại : {{$nhacungcap->cong_no}} @if($nhacungcap->ghi_chu !=NULL) -- Dư Tài Khoản :{{$nhacungcap->ghi_chu}}  @endif</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                    </div>
                                                     <div class="form-group">
                                                        {{Form::label('danhsachchi','Các Đợt Chi Công Ty : ')}}
                                                        
                                                        <select name="danhsachchi" id="danhsachchi" class="form-control" required="required">
                                                            <option value="">Mời Chọn Nhà Cung Cấp Để Hiển Thị Danh Sách</option>
                                                        </select>
                                                        
                                                    </div>
                                                       
                                                </div>
                                        </div>
                                        
                                    </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Chỉnh sửa thông tin đợt Chi được chọn <small>(Cập nhật lại thông tin  *** Chỉ Chỉnh Sửa Khi Có Sai Xót)</small></h3>
                                                </div>
                                                <div class="panel-body">
                                                {{Form::open(['url'=>'','method'=>'PUT', 'class'=> 'form-group' ,'id'=>'capnhatchiform','onsubmit'=>'return validateForm1();'])}}
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            {{Form::label('chiid',' Mã Chi : ')}}
                                                            {{Form::text('chiid',null,['class'=>'form-control','disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('sotienOld','Số Tiền Trước Đó : ',['id'=>'labelsotienOld'])}}
                                                            {{Form::text('sotienOld',null,['class'=>'form-control','disabled'=>''])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('sotienNew','Số Tiền Chỉnh Sửa  : ',['class'=>'text-danger','id'=>'lable3'])}}
                                                            {{Form::number('sotienNew',null,['class'=>'form-control text-danger','required'=>'required','style'=>'color:red;'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label('sotienxacnhan',' Xác Nhận Số Tiền : ',['class'=>'text-danger','id'=>'lable4'])}}
                                                            {{Form::number('sotienxacnhan',null,['class'=>'form-control text-danger','required'=>'required','style'=>'color:red;'])}}
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-large btn-block btn-warning">Cập Nhật Thông Tin Chi Ngân</button>
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
       $("#chiform #nhacungcap").change(function(){
            var id = $(this).val();
            $("#chiform #sotien").val("");
            $("#chiform #sotien1").val("");
            $("#danhsachdonhang ul").empty();
            if(id!=""){
                $.ajax({
                    method:"GET",
                    url:'ajaxselectnhacungcap/manage_ban_hang_chi_cong_ty/'+id,
                    success:function(data){
                        var lengthlist = data.length;
                        if(lengthlist != 0 ){
                            for(var i = 0 ; i < lengthlist ; i++ ){
                                 $("#danhsachdonhang ul").append("<li class='list-group-item' style='border-color: blueviolet;'>Mã Đơn Hàng : "+data[i].id+" -- Loại Sợi : "+data[i].loai_soi.ten+" -- Khối lượng đặt : "+data[i].khoi_luong+" kg</li>")
                            }
                        }else{  

                            $("#danhsachdonhang ul").append("<h5 class='text-danger'><strong>Không Có Đơn Hàng Nào Thuộc Nhà Cung Cấp Đang Chọn<strong></h5>");
                        }
                       
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            }
            
       });
       $("#chiform #sotien , #chiform #sotien1").change(function(){
            var sotien  = $("#chiform #sotien").val();
            console.log('1 :'+sotien );
            var sotien1  = $("#chiform #sotien1").val();
            console.log('2 :'+sotien1 );
            $("#chiform #lable1").text("Số Tiền(VND) : "+DocTienBangChu(sotien)+" Đồng");
            $("#chiform #lable2").text("Số Tiền Xác Nhận(VND) : "+DocTienBangChu(sotien1)+" Đồng");
            
            if(sotien =="" || sotien1 ==""){
            $()
            }else if(sotien <= 0 ||sotien1 <= 0  ){
                alert('Nhập Sai THông Tin');
                $("#chiform #sotien").val("");
                $("#chiform #sotien1").val("");
            }else if(sotien!=sotien1){
                alert('Không Trùng Khớp');
                $("#chiform #sotien").val("");
                $("#chiform #sotien1").val("");   
            }
       });

       $("#capnhatchi #nhacungcap").change(function(){
            var id = $(this).val();
            $("#capnhatchi #danhsachchi").empty();
            if(id != ""){
                $.ajax({
                    method:"GET",
                    url:'ajaxchangeNhacungcap/manage_ban_hang_thanh_toan/'+id,
                    success:function(data){
                        var lengthdata = data.length;
                        $("#capnhatchi #danhsachchi").append("<option value=''>Mời Chọn Đợt Chi Công Ty</option>");
                        if(lengthdata != 0){
                            for( var i = 0 ; i < lengthdata ; i++){
                                $("#capnhatchi #danhsachchi").append("<option value='"+data[i].id+"'>"+data[i].id+" -- Số Tiền : "+data[i].so_tien+" -- Ngày Thanh Toán : "+data[i].ngay_gio+"</option>");
                            }
                        }else {
                            $("#capnhatchi #danhsachchi").append("<option value=''>Không Có Đợi Chi Công Ty Nào</option>");
                        }
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                });
            }
       });
       $("#capnhatchi #danhsachchi").change(function(){
            var id = $(this).val();
            if( id!= ""){
                $.ajax({
                    method:"GET",
                    url:"ajaxselectChicongty/manage_ban_hang_chi_cong_ty/"+id,
                    success:function(data){
                        console.log(data);
                        $("#capnhatchiform").attr('action','manage_ban_hang_chi_cong_ty/'+data.id);
                        $("#capnhatchiform #chiid").val(data.id);
                        $("#capnhatchiform #sotienOld").val(data.so_tien);
                        $("#capnhatchiform #labelsotienOld").text("Số Tiền Trước Đó : "+DocTienBangChu(data.so_tien) +" đồng");
                        
                        
                        
                    },
                    fail:function(xhr){
                        alert(xhr);
                    }
                })
            }
       });

        $("#capnhatchiform #sotienNew , #capnhatchiform #sotienxacnhan").change(function(){
            var sotien  = $("#capnhatchiform #sotienNew").val();
            console.log('1 :'+sotien );
            var sotien1  = $("#capnhatchiform #sotienxacnhan").val();
            console.log('2 :'+sotien1 );
            $("#capnhatchiform #lable3").text("Số Tiền(VND) : "+DocTienBangChu(sotien)+" Đồng");
            $("#capnhatchiform #lable4").text("Xác Nhận Số Tiền(VND) : "+DocTienBangChu(sotien1)+" Đồng");
            
            if(sotien =="" || sotien1 ==""){
                $();
            }else if(sotien < 0 ||sotien1 < 0  ){
                alert('Nhập Sai THông Tin');
                $("#capnhatchiform #sotienNew").val("");
                $("#capnhatchiform #sotienxacnhan").val("");
            }else if(sotien!=sotien1){
                alert('Không Trùng Khớp');
                $("#capnhatchiform #sotienNew").val("");
                $("#capnhatchiform #sotienxacnhan").val("");   
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
            var so = $("#chiform #sotien").val();
            if(so==0 ||so ==""){
                alert("Số Tiền Nhập Sai !");
                return false;
            }
            return true;
        }
        function validateForm1(){
            var so = $("#capnhatchiform #sotienNew").val();
            if( so ==""){
                alert("Số Tiền Nhập Sai !");
                return false;
            }
            return true;
        }
    </script>
@endsection