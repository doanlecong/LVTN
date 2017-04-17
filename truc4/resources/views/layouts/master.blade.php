<html>
    <head>
        <title>@yield('title')</title>
        <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css' />
        <script src='/js/jquery-3.2.1.min.js'></script>
        <script src='/js/bootstrap.min.js'></script>
        <script>
            $(document).ready(function(){
                var firstInput = $('.btn, :input:visible:enabled:not([readonly])').eq(0);
                firstInput.focus();
                firstInput.val(firstInput.val());

                var date = new Date();
                date = new Date(date.getTime() - date.getTimezoneOffset()*60000);
                $('input[type=datetime-local].init').val(date.toJSON().slice(0,19));
            });
        </script>
        <style>
            th, td {
                font-size: 0.75em;
            }
            p {
                margin-bottom: 6px;
            }
            p label {
                width: 170px !important;
            }
            p input, p select, p textarea {
                width: 330px !important;
            }
            .btn {
                width: 500px !important;
            }
        </style>
    </head>
    <body style='margin:5px;'>

        @if (Session::has('flash_message'))
            <div class='alert alert-info'>
                {{ Session::pull('flash_message') }}
            </div>
        @endif

        @if (Session::has('errors'))
            <div class='alert alert-danger'>
                @foreach ($errors->all() as $error)
                    <p> {{ $error }} </p>
                @endforeach
            </div>
        @endif

        <h3 style='color:blue'>
            <i>@yield('title')</i>
        </h3>

        @yield('content')
    </body>
</html>
