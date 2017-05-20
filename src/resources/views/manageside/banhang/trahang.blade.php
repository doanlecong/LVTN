@extends('index')
@section('title',' | Trang trả hàng')
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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách cây vải đã bị trả lại
            </h1>

            @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif
            <ol class="breadcrumb">
                <li class="active">
                    <div class ="row ">
                        <a href='tra_hang/create' type="button" class="btn btn-primary">Khách trả hàng</a>
                    </div>
                </li>
            </ol>
                
            <div class="row" style="padding:10px;">
                
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID hóa đơn xuất</th>
                            <th>ID cây vải</th>
                            <th>Loại vải</th>
                            <th>Màu</th>
                            <th>Khổ</th>
                            <th>Số mét</th>
                            <th>Đơn giá</th>
                            <th>Kho</th>
                            <th>Ngày giờ trả lại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($list->count() == 0)
                            <tr><td style='text-align: center;' colspan='10'>CHƯA CÓ CÂY VẢI NÀO BỊ TRẢ LẠI</td></tr>
                        @endif

                        @foreach($list as $it)
                            <tr>
                                <td>{{ $it->id }}</td>
                                <td>{{ $it->hoa_don_xuat_id }}</td>
                                <td>{{ $it->cay_vai_thanh_pham_id }}</td>
                                <td>{{ $it->loai_vai->ten }}</td>
                                <td>{{ $it->mau->ten }}</td>
                                <td>{{ $it->kich_co }}</td>
                                <td>{{ $it->so_met }}</td>
                                <td>{{ $it->don_gia }}</td>
                                <td>{{ $it->kho->id }}</td>
                                <td>{{ $it->ngay_gio_tra_lai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

@endsection
