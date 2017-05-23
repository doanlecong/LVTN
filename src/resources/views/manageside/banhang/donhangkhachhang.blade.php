@extends('index')
@section('title',' | Đơn Hàng Khách Hàng')
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
<!--Modal của form thêm đơn hàng khách hàng-->
<button id='btnShow_modalThemDonHangKhachHang' style='display:none' data-toggle="modal" data-target="#modalThemDonHangKhachHang">addDonHangKhachHang</button>
<div class="modal fade" id="modalThemDonHangKhachHang" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm đơn hàng khách hàng</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_don_hang', 'method'=>'POST', 'id'=>'formThemDonHangKhachHang', 'class'=> 'form-group'])}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('khach_hang_id', 'Khách hàng: *')}}
                            {{Form::select('khach_hang_id', $khachHangs, null, array('class'=>'form-control','required'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('loai_vai_id', 'Loại vải: *')}}
                            {{Form::select('loai_vai_id', $loaiVais, null, array('class'=>'form-control','required'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('mau_id', 'Màu: *')}}
                            {{Form::select('mau_id', $maus, null, array('class'=>'form-control','required'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('kich_co', 'Khổ vải:')}}
                            {{Form::number('kich_co', null, array('class'=>'form-control','step'=>'0.01'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('tong_so_met', 'Tổng số mét (Mét): *')}}
                            {{Form::number('tong_so_met', null, array('class'=>'form-control','required','min'=>1,'step'=>'1'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('chiet_khau', 'Chiết Khấu (%): *')}}
                            {{Form::number('chiet_khau', 0, array('class'=>'form-control','required','min'=>0,'max'=>100))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('han_chot', 'Hạn chót:')}}
                            <input class='form-control' name='han_chot' type='datetime-local' id='han_chot' step='1' />
                        </div>
                        <div class="form-group">
                            {{Form::label('ngay_gio_dat_hang', 'Ngày giờ đặt hàng: *')}}
                            <input class='form-control' required name='ngay_gio_dat_hang' type='datetime-local' id='ngay_gio_dat_hang' step='1' />
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

<!--Modal của form cập nhật thông tin đơn hàng khách hàng-->
<button id='btnShow_modalCapNhatDonHangKhachHang' style='display:none' data-toggle="modal" data-target="#modalCapNhatDonHangKhachHang">editDonHangKhachHang</button>
<div class="modal fade" id="modalCapNhatDonHangKhachHang" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật thông tin đơn hàng khách hàng</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_don_hang', 'method'=>'PUT', 'id'=>'formCapNhatDonHangKhachHang', 'class'=> 'form-group'])}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('id', 'Mã đơn hàng khách hàng: *')}}
                            {{Form::text('id', null, array('disabled','class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('khach_hang_id', 'Khách hàng: *')}}
                            {{Form::select('khach_hang_id', $khachHangs, null, array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('loai_vai_id', 'Loại vải: *')}}
                            {{Form::select('loai_vai_id', $loaiVais, null, array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('mau_id', 'Màu: *')}}
                            {{Form::select('mau_id', $maus, null, array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('kich_co', 'Khổ vải:')}}
                            {{Form::number('kich_co', null, array('class'=>'form-control','step'=>'0.01'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('tong_so_met', 'Tổng số mét: *')}}
                            {{Form::number('tong_so_met', null, array('class'=>'form-control','required','step'=>'1'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('chiet_khau', 'Chiết Khấu (%): ')}}
                            {{Form::number('chiet_khau', null, array('class'=>'form-control','required','min'=>1,'max'=>100))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('han_chot', 'Hạn chót:')}}
                            <input class='form-control' name='han_chot' type='datetime-local' id='han_chot' step='1' />
                        </div>
                        <div class="form-group">
                            {{Form::label('ngay_gio_dat_hang', 'Ngày giờ đặt hàng: *')}}
                            <input class='form-control' name='ngay_gio_dat_hang' type='datetime-local' id='ngay_gio_dat_hang' step='1' />
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
            Trang Quản Lý Đơn Hàng Khách Hàng <!--<small>Chào!!</small>-->
        </h1>

        @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

        @endif

        <ol class="breadcrumb">
            <li class="active">
                <div class ="row ">
                
                    <button type="button" class="addDonHangKhachHang btn btn-primary">Thêm Đơn Hàng Khách Hàng</button>
                
                </div>
            </li>
        </ol>
            
        <div class="row" style="padding:10px;">
            
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Tên loại vải</th>
                        <th>Màu</th>
                        <th>Khổ</th>
                        <th>Tổng số mét</th>
                        <th>Chiết Khấu (%)</th>
                        <th>Đã giao</th>
                        <th>Bị trả lại</th>
                        <th>Còn lại</th>
                        <th>Hạn chót</th>
                        <th>Ngày giờ đặt hàng</th>
                        <th>Tình trạng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dhkhs->count() == 0)
                        <tr><td style='text-align: center;' colspan='12'>CHƯA CÓ ĐƠN HÀNG KHÁCH HÀNG NÀO ĐƯỢC TẠO</td></tr>
                    @endif

                    @foreach($dhkhs as $dhkh)
                        <tr class='editDonHangKhachHang' id='{{ $dhkh->id }}'>
                            <td>{{$dhkh->id}}</td>
                            <td>{{$dhkh->khach_hang->ten}}</td>
                            <td>{{$dhkh->loai_vai->ten}}</td>
                            <td>{{$dhkh->mau->ten}}</td>
                            <td>{{$dhkh->kich_co}}</td>
                            <td>{{$dhkh->tong_so_met}}</td>
                            <td>{{$dhkh->chiet_khau}}</td>
                            <td>{{$dhkh->so_met_da_giao}}</td>
                            <td>{{$dhkh->so_met_bi_tra_lai}}</td>
                            <td>{{$dhkh->so_met_con_lai}}</td>
                            <td>{{$dhkh->han_chot}}</td>
                            <td>{{$dhkh->ngay_gio_dat_hang}}</td>
                            <td>{{$dhkh->tinh_trang}}</td>
                            <td>
                                <input type="checkbox" value='{{$dhkh->deleted_at != null}}' disabled value="xoa">
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
        $(form+' #khach_hang_id').val(data.khach_hang_id);
        $(form+' #loai_vai_id').val(data.loai_vai_id);
        $(form+' #mau_id').val(data.mau_id);
        $(form+' #kich_co').val(data.kich_co);
        $(form+' #tong_so_met').val(data.tong_so_met);
        $(form+' #chiet_khau').val(data.chiet_khau);
        
        $(form+' #ngay_gio_dat_hang').val(data.ngay_gio_dat_hang.replace(" ", "T"));
        $(form+' #han_chot').val(data.han_chot.replace(" ", "T"));
    }

    function fillFormCapNhatDonHangKhachHang(id) {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_don_hang/'+id,
            success: function(data) {
                $('#formCapNhatDonHangKhachHang').attr('action', 'manage_ban_hang_don_hang/'+id);
                fillForm('#formCapNhatDonHangKhachHang', data);
                $('#formCapNhatDonHangKhachHang #khach_hang_id').focus().val($(this).val());
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    function fillFormThemDonHangKhachHang() {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_don_hang_create',
            success: function(data) {
                //fillForm('#formThemDonHangKhachHang', data);

                var date = new Date();
                date = new Date(date.getTime() - date.getTimezoneOffset()*60000);
                $('#formThemDonHangKhachHang #ngay_gio_dat_hang').val(date.toJSON().slice(0,19));

                $('#formThemDonHangKhachHang #khach_hang_id').focus().val($(this).val());
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    $(document).ready(function(){
        $('.addDonHangKhachHang').click(function() {
            fillFormThemDonHangKhachHang();

            $('#btnShow_modalThemDonHangKhachHang').click();
        });

        $('.editDonHangKhachHang').click(function() {
            var id = $(this).attr('id');
            fillFormCapNhatDonHangKhachHang(id);

            $('#btnShow_modalCapNhatDonHangKhachHang').click();
        });
    });
</script>
@endsection