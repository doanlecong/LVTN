@extends('index')
@section('title',' | Hóa đơn xuất')
@section('stylecss')
    <style>
        .modal-dialog{
            background:rgba(56, 33, 53, 0.78);
            width:90%;
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
<!--Modal của form thêm hóa đơn xuất-->
<button id='btnShow_modalThemHoaDonXuat' style='display:none' data-toggle="modal" data-target="#modalThemHoaDonXuat">addHoaDonXuat</button>
<div class="modal fade" id="modalThemHoaDonXuat" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm hóa đơn xuất</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_hoa_don_xuat', 'method'=>'POST', 'id'=>'formThemHoaDonXuat', 'class'=>'form-group', 'onsubmit'=>'return validateForm();'])}}
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <fieldset>
                               <legend style='color:gray'><small><i>Thông tin hóa đơn:</i></small></legend>

                                <div class="form-group">
                                    {{Form::label('don_hang_khach_hang_id', 'Đơn hàng khách hàng: *')}}
                                    <select class='form-control' required name='don_hang_khach_hang_id' id='don_hang_khach_hang_id' value=''>
                                    @foreach($dhkhs as $dhkh)
                                        <option value="{{ $dhkh->id }}">#{{ $dhkh->id }} - {{ $dhkh->khach_hang->ten }} - {{ $dhkh->loai_vai->ten }} - {{ $dhkh->mau->ten }} - {{ $dhkh->tong_so_met }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{Form::label('ngay_gio_xuat_hoa_don', 'Ngày giờ xuất hóa đơn: *')}}
                                    <input class='form-control' required name='ngay_gio_xuat_hoa_don' type='datetime-local' id='ngay_gio_xuat_hoa_don' step='1' />
                                </div>
                                <div class="form-group">
                                    {{Form::label('nhan_vien_xuat_id', 'Nhân viên xuất: *')}}
                                    {{Form::select('nhan_vien_xuat_id', $nhanViens, null, array('class'=>'form-control', 'required'))}}
                                </div>
                                
                            </fieldset>
                            </div>


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <fieldset>
                               <legend style='color:gray'><small><i>Hóa đơn này xuất những cây vải sau:</i></small></legend>


                                <div class="form-group">
                                    {{Form::label('danh_sach_cay_vai', 'Chọn những cây vải cần xuất: *')}}
                                    <div style='height:185px; overflow:auto;' id='danh_sach_cay_vai'>
                                    </div>
                                </div>

                            </fieldset>
                            </div>

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

<!--Modal của form cập nhật thông tin hóa đơn xuất-->
<button id='btnShow_modalCapNhatHoaDonXuat' style='display:none' data-toggle="modal" data-target="#modalCapNhatHoaDonXuat">editHoaDonXuat</button>
<div class="modal fade" id="modalCapNhatHoaDonXuat" role="dialog">
    <div class="vertical-helper">
        <div class="modal-dialog modal-lg vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật thông tin hóa đơn xuất</h4>
                </div>
                {{Form::open(['url'=>'manage_ban_hang_hoa_don_xuat', 'method'=>'PUT', 'id'=>'formCapNhatHoaDonXuat', 'class'=> 'form-group'])}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('id', 'Mã hóa đơn xuất: *')}}
                            {{Form::text('id', null, array('disabled','class'=>'form-control','required','maxlength'=>191))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('don_hang_khach_hang_id', 'Đơn hàng khách hàng: *')}}
                            <select disabled class='form-control' required name='don_hang_khach_hang_id' id='don_hang_khach_hang_id' value=''>
                            @foreach($dhkhs as $dhkh)
                                <option value="{{ $dhkh->id }}">#{{ $dhkh->id }} - {{ $dhkh->khach_hang->ten }} - {{ $dhkh->loai_vai->ten }} - {{ $dhkh->mau->ten }} - {{ $dhkh->tong_so_met }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('ngay_gio_xuat_hoa_don', 'Ngày giờ xuất hóa đơn: *')}}
                            <input disabled class='form-control' required name='ngay_gio_xuat_hoa_don' type='datetime-local' id='ngay_gio_xuat_hoa_don' step='1' />
                        </div>
                        <div class="form-group">
                            {{Form::label('nhan_vien_xuat_id', 'Nhân viên xuất: *')}}
                            {{Form::select('nhan_vien_xuat_id', $nhanViens, null, array('disabled', 'class'=>'form-control', 'required'))}}
                        </div>
                        
                        <div class="form-group" id='danh_sach_cay_vai'>
                            {{Form::label('danh_sach_cay_vai', 'Danh sách cây vải xuất: *')}}
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Quản Lý Hóa Đơn Xuất
            </h1>

            @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif
            <ol class="breadcrumb">
                <li class="active">
                    <div class ="row ">
                    
                        <button type="button" class="addHoaDonXuat btn btn-primary">Thêm Hóa Đơn Xuất</button>
                    
                    </div>
                </li>
            </ol>
                
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Mã hóa đơn xuất</th>
                            <th>Đơn hàng khách hàng</th>
                            <th>Khách hàng</th>
                            <th>Ngày giờ xuất hóa đơn</th>
                            <th>Nhân viên xuất</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($hdxs->count() == 0)
                            <tr><td style='text-align: center;' colspan='6'>CHƯA CÓ HÓA ĐƠN XUẤT NÀO ĐƯỢC TẠO</td></tr>
                        @endif

                        @foreach($hdxs as $hdx)
                           <tr class='editHoaDonXuat' id='{{ $hdx->id }}'>
                                <td>{{$hdx->id}}</td>
                                <td>
                                    #{{$hdx->don_hang_khach_hang->id}}
                                    : {{$hdx->don_hang_khach_hang->loai_vai->ten}}
                                    - {{$hdx->don_hang_khach_hang->mau->ten}}
                                </td>
                                <td>{{$hdx->khach_hang->ten}}</td>
                                <td>{{$hdx->ngay_gio_xuat_hoa_don}}</td>
                                <td>{{$hdx->nhan_vien_xuat->ten}}</td>
                                <td>
                                    <input type="checkbox" value='{{$hdx->deleted_at != null}}' disabled value="xoa">
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
        $(form+' #don_hang_khach_hang_id').val(data.don_hang_khach_hang_id);
        $(form+' #ngay_gio_xuat_hoa_don').val(data.ngay_gio_xuat_hoa_don.replace(" ", "T"));
        $(form+' #nhan_vien_xuat_id').val(data.nhan_vien_xuat_id);
        alert(data.cay_vai_thanh_phams)
    }

    function fillFormCapNhatHoaDonXuat(id) {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_hoa_don_xuat/'+id,
            success: function(data) {
                $('#formCapNhatHoaDonXuat').attr('action', 'manage_ban_hang_hoa_don_xuat/'+id);
                fillForm('#formCapNhatHoaDonXuat', data);
                $('#formCapNhatHoaDonXuat #don_hang_khach_hang_id').focus().val(($this).val());
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    function fillFormThemHoaDonXuat() {
        $.ajax({
            method: 'get',
            async: true,
            url: 'ajax/manage_ban_hang_hoa_don_xuat_create',
            success: function(data) {
                // fillForm('#formThemHoaDonXuat', data);

                var date = new Date();
                date = new Date(date.getTime() - date.getTimezoneOffset()*60000);
                $('#formThemHoaDonXuat #ngay_gio_xuat_hoa_don').val(date.toJSON().slice(0,19));

                $('#formThemHoaDonXuat #don_hang_khach_hang_id').focus().val(($this).val());
            },
            fail:function(){
                alert('Server không trả vể Kết Quả!!!');
            }
        })
    }

    $(document).ready(function() {
        // khi chọn đơn hàng -> show ra list những cây vải hiện có trong kho, đáp ứng yêu cầu loại vải và màu của đơn hàng đó
        $('#formThemHoaDonXuat #don_hang_khach_hang_id').change(function() {
            var dhkh_id = $(this).val();

            $.ajax({
                method: 'get',
                async: true,
                url: 'ajax/danh_sach_cay_vai_phu_hop_don_hang/'+dhkh_id,
                success: function(data) {
                    // alert(data[0]['so_met']);

                    // xóa list cũ
                    var divDanhSachCayVai = $('#formThemHoaDonXuat #danh_sach_cay_vai');
                    divDanhSachCayVai.html('');
                    // show list cây vải mới tương ứng với đơn hàng đã chọn
                    var listCheckBox = '';
                    if (data.length == 0) listCheckBox = '<br> Hiện tại không có cây vải nào trong kho <br> có loại vải và màu phù hợp yêu cầu đơn hàng bạn chọn! <br><br> Vui lòng chọn một đơn hàng khác!';
                    for (var i=0; i<data.length; ++i) {
                        listCheckBox += '<input type="checkbox" name="danh_sach_cay_vai[]" value="' + data[i]['id'] + '" /> #' +
                            data[i]['id'] +
                            ' - ' + data[i]['so_met'] + 'm' +
                            ' * ' + data[i]['don_gia'] + ' vnd';

                        if (data[i]['kich_co'] != null) listCheckBox += ' (khổ: ' + data[i]['kich_co'] + ')';

                        listCheckBox += ' <br />';
                    }
                    divDanhSachCayVai.html(listCheckBox);
                },
                fail: function() {
                    alert('Server không trả vể Kết Quả!!!');
                }
            })
        });

        $('#formThemHoaDonXuat select').prop('selectedIndex', -1);

        $('.addHoaDonXuat').click(function() {
            
            fillFormThemHoaDonXuat();

            $('#btnShow_modalThemHoaDonXuat').click();
        });

        $('.editHoaDonXuat').click(function() {
            var id = $(this).attr('id');
            fillFormCapNhatHoaDonXuat(id);

            $('#btnShow_modalCapNhatHoaDonXuat').click();
        });
    });

    function validateForm() {
        var checkbox = document.getElementsByName('danh_sach_cay_vai[]');
        for(var i=0; i< checkbox.length; i++) {
            if(checkbox[i].checked)
                return true;
        }

        alert("Cần chọn ít nhất 1 cây vải để xuất !");
        return false;
    }
</script>
@endsection
