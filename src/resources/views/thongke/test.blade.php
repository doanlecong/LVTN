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
<!-- Chart.js -->
<script src="/js/chart/Chart.min.js"></script>

<div style='width:200px; height:200px;'><canvas id="myChart" width="400" height="400"></canvas></div>
<script>

var ctx = document.getElementById("myChart");
var data = {
    labels: [
        @foreach ($data['maus'] as $mau)
            '{{ $mau->ten }}' ,
        @endforeach
    ],
    datasets: [
        {
            // label: 'count of',
            data: [
                    @foreach ($data['maus'] as $mau)
                        {{ $mau->slCayVai }} ,
                    @endforeach
                ],
            backgroundColor: [
                @foreach ($data['maus'] as $mau)
                    '{{ $mau->ma_mau }}' ,
                @endforeach
            ],
            // hoverBackgroundColor: [
            //     @foreach ($data['maus'] as $mau)
            //         'silver' ,
            //     @endforeach
            // ]
        }]
};
var myChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        legend: {
            display: true,
            position: 'bottom',
        },
        title: {
            display: true,
            text: 'Số cây vải theo màu',
        },
    }
});

</script>


<div style='width:200px; height:200px;'><canvas id="myChart2" width="400" height="400"></canvas></div>
<script>

var ctx = document.getElementById("myChart2");
var data = {
    labels: [
        @foreach ($data['loaiVais'] as $loaiVai)
            '{{ $loaiVai->ten }}' ,
        @endforeach
    ],
    datasets: [
        {
            // label: 'count of',
            data: [
                    @foreach ($data['loaiVais'] as $loaiVai)
                        {{ $loaiVai->slCayVai }} ,
                    @endforeach
                ],
            backgroundColor: [
                '#546E7A', '#8E24AA', '#B0BEC5', '#009688', '#42A5F5', '#AFB42B', '#B71C1C', '#6D4C41'
            ],
        }]
};
var myChart2 = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        legend: {
            display: true,
            position: 'bottom',
        },
        title: {
            display: true,
            text: 'Số cây vải theo loại vải',
        },
    }
});

</script>

@endsection
