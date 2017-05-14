@extends('index')
@section('title',' | Trang Quản Lý Tổng')
@section('left_nav')
   @include('manageside.leftside_nav');
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Quản Lý Tổng <small>Chào!!</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Chọn chức năng bên cạnh
                </li>
            </ol>
        </div>
    </div>
@endsection