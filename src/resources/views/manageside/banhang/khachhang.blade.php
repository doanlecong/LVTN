@extends('index')
@section('title',' | Khách Hàng')
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
<!--Modal của form thêm khách hàng-->
<button id='btnShow_modalThemKhachHang' style='display:none' data-toggle="modal" data-target="#modalThemKhachHang">addKhachHang</button>
<div class="modal fade" id="modalThemKhachHang" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm khách hàng</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_khach_hang', 'method'=>'POST', 'id'=>'formThemKhachHang', 'class'=> 'form-group'])}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('ten', 'Tên khách hàng: *')}}
                            {{Form::text('ten', null, array( 'class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ten_dang_nhap', 'Tên đăng nhập:')}}
                            {{Form::text('ten_dang_nhap', null, array('class'=>'form-control','maxlength'=>50))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('mat_khau', 'Mật khẩu:')}}
                            {{Form::password('mat_khau', array('class'=>'form-control','maxlength'=>50))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('dia_chi','Địa chỉ: *')}}
                            {{Form::text('dia_chi',null,array('class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email','Email:')}}
                            {{Form::email('email',null,array('class'=>'form-control','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('so_dien_thoai','Số điện thoại: *')}}
                            {{Form::text('so_dien_thoai',null,array('class'=>'form-control','required','maxlength'=>20))}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-large btn-block btn-warning">Tạo</button>
                        
                        <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Hủy</button>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

<!--Modal của form cập nhật thông tin khách hàng-->
<button id='btnShow_modalCapNhatKhachHang' style='display:none' data-toggle="modal" data-target="#modalCapNhatKhachHang">editKhachHang</button>
<div class="modal fade" id="modalCapNhatKhachHang" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật thông tin khách hàng</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_khach_hang', 'method'=>'PUT', 'id'=>'formCapNhatKhachHang', 'class'=> 'form-group'])}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('id', 'Mã khách hàng: *')}}
                            {{Form::text('id', null, array('disabled','class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ten', 'Tên khách hàng: *')}}
                            {{Form::text('ten', null, array('class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ten_dang_nhap', 'Tên đăng nhập:')}}
                            {{Form::text('ten_dang_nhap', null, array('class'=>'form-control','maxlength'=>50))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('mat_khau', 'Mật khẩu:')}}
                            {{Form::password('mat_khau', array('class'=>'form-control','maxlength'=>50))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('dia_chi', 'Địa chỉ: *')}}
                            {{Form::text('dia_chi', null, array('class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email:')}}
                            {{Form::email('email', null, array('class'=>'form-control','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('so_dien_thoai', 'Số điện thoại: *')}}
                            {{Form::text('so_dien_thoai', null, array('class'=>'form-control','required','maxlength'=>20))}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-large btn-block btn-warning">Cập nhật</button>
                        
                        <button type="button" class="btn btn-large btn-block btn-default" data-dismiss="modal">Hủy</button>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Quản Lý Khách Hàng <!--<small>Chào!!</small>-->
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard fa-lg"></i><span><strong>    Danh Sách Các Khách Hàng  </strong></span> 
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
                    
                        <button type="button" class="addKhachHang btn btn-primary">Thêm Khách Hàng</button>
                    
                    </div>
                </li>
            </ol>
                
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Công Nợ (VND)</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($list_khachhang->count() == 0)
                            <tr><td colspan="12" style="text-align: center" >CHƯA CÓ KHÁCH HÀNG NÀO ĐƯỢC TẠO</td></tr>
                        @endif

                        @foreach($list_khachhang as $khachhang)
                           <tr class='editKhachHang' id='{{ $khachhang->id }}'>
                                <td>{{$khachhang->id}}</td>
                                <td>{{$khachhang->ten}}</td>
                                <td>{{$khachhang->ten_dang_nhap}}</td>
                                <td>{{$khachhang->dia_chi}}</td>
                                <td>{{$khachhang->email}}</td>
                                <td>{{$khachhang->so_dien_thoai}}</td>
                                <td>{{$khachhang->cong_no}}</td>
                                <td>
                                    <input type="checkbox" value='{{$khachhang->deleted_at != null}}' disabled value="xoa">
                                </td>
                           </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

<script>
    function fillForm(form, data) {
        $(form+' #id').val(data.id);
        $(form+' #ten').val(data.ten);
        $(form+' #ten_dang_nhap').val(data.ten_dang_nhap);
        //$(form+' #mat_khau').val(data.mat_khau);
        $(form+' #dia_chi').val(data.dia_chi);
        $(form+' #email').val(data.email);
        $(form+' #so_dien_thoai').val(data.so_dien_thoai);
    }

    function fillFormCapNhatKhachHang(id) {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_khach_hang/'+id,
            success: function(data) {
                $('#formCapNhatKhachHang').attr('action', 'manage_ban_hang_khach_hang/'+id);
                fillForm('#formCapNhatKhachHang', data);
                $('#formCapNhatKhachHang #ten').focus().val($(this).val().toLowerCase());
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    function fillFormThemKhachHang() {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_khach_hang_create',
            success: function(data) {
                //fillForm('#formThemKhachHang', data);
                var currdata = $(this).val()
                $('#formThemKhachHang #ten').focus().val(currdata);
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    $(document).ready(function(){
        $('.addKhachHang').click(function() {
            fillFormThemKhachHang(id);

            $('#btnShow_modalThemKhachHang').click();
        });

        $('.editKhachHang').click(function() {
            var id = $(this).attr('id');
            fillFormCapNhatKhachHang(id);

            $('#btnShow_modalCapNhatKhachHang').click();
        });
    });
</script>
@endsection