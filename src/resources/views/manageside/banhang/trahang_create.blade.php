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
                Trang trả lại hàng
            </h1>

            @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif

            <div class="row" style="padding:10px;">
                
                <div class='row'>
                    <div class='col-sm-4'>
                        <div class='row'>
                            <fieldset>
                                <legend style='margin-bottom:5px;'>Lọc theo: <i>Loại vải + Màu</i></legend>
                                <div class='col-sm-6'>
                                    @foreach ($loaivais as $lv)
                                        <input type="checkbox" name='loaivai[]' value='{{$lv->id}}' /> {{$lv->ten}}
                                        <br/>
                                    @endforeach
                                </div>
                                <div class='col-sm-6'>
                                    @foreach ($maus as $m)
                                        <input type="checkbox" name='mau[]' value='{{$m->id}}' /> {{$m->ten}}
                                        <br/>
                                    @endforeach
                                </div>
                            </fieldset>

                        </div>
                    </div>


                    <div class='col-sm-1'></div>


                    <div class='row col-sm-7'>
                        {{Form::open(['url'=>'tra_hang', 'method'=>'POST', 'class'=>'form-group'])}}
                            <fieldset>
                                <legend style='margin-bottom:5px;'>Danh sách cây vải đã xuất</legend>
                                <div id='danhsachcayvai' class='col-sm-12'>
                                    @foreach ($cayvais as $cv)
                                        <input type="checkbox" id='cayvai{{$cv->id}}' name='cayvai[]' value='{{$cv->id}}' />
                                        <label for='cayvai{{$cv->id}}'>
                                            #{{$cv->id}} - {{$cv->loai_vai->ten}} - {{$cv->mau->ten}} - {{$cv->so_met}}m * {{$cv->don_gia}}vnd
                                            @if ($cv->kich_co)
                                                (khổ: {{$cv->kich_co}}m)
                                            @endif
                                        </label>
                                        <br/>
                                    @endforeach
                                </div>
                            </fieldset>
                            
                            <div class='row' style='margin-top:15px'>
                                <button type="submit" class="btn btn-large btn-block btn-success">Trả lại hàng</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>

                <div class='row' style='margin-top:15px'>
                    <button onclick="window.location.href='/tra_hang';" type="button" class="btn btn-large btn-block btn-default">Quay về trang danh sách</button>
                </div>

            </div>
        </div>
    </div>

@endsection
