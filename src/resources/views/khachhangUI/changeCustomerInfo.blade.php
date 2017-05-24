<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Công Ty Vải ABCXYZ | Trang Đăng Nhập</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/css/animate/animate.min.css" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/nprogress.js"></script>
    <!-- PNotify -->
    <link href="/js/pnotify/pnotify.css" rel="stylesheet">
    <link href="/js/pnotify/pnotify.buttons.css" rel="stylesheet">
    <link href="/js/pnotify/pnotify.nonblock.css" rel="stylesheet">
    

    <!--<link href="css/themify-icons.css" rel="stylesheet">-->
    <link href='css/dosis-font.css' rel='stylesheet' type='text/css'>
  </head>

  <body class="login">
     <div>
      @if (Session::has('success'))
	
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

     @endif
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           {{Form::open(['url'=>'changeCustomerUserOrPass','method'=>'POST', 'class'=> 'form-group','id'=>'formchangeCustomerInfo','onsubmit'=>'return validateForm();' ])}}
                
                <h1>Change Username Or Password</h1>
                <div>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> Username (Old)</span>
                    <input type="text" class="form-control" name="tendangnhapcu" id="tendangnhapcu" value="{{$khachhang-> ten_dang_nhap}}" readonly="readonly"  />
                </div>
                <div>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> New Username </span>
                    <input type="text" class="form-control" name="tendangnhapmoi" id="tendangnhapmoi" placeholder=" Type New Username" />
                </div>
                <div>
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"> New Password</span>
                    <input type="password" class="form-control" name="matkhaumoi" id="matkhaumoi" placeholder="New Password"  />
                </div>
                 <div>
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"> Retype New Password</span>
                    <input type="password" class="form-control" name="matkhaumoixacnhan" id="matkhaumoixacnhan" placeholder="Retype New Password"  />
                </div>
                <div>
                    
                    <button type="submit" class="btn btn-default submit">Thay Đổi</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">
                        <a href="#signup" class="to_register"> Change Your Infomation Detail </a>
                    
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><a href="{{url('/khachhangUI')}}">ABCXYZ</a></h1>
                        <p>©2017 All Rights Reserved. </p>
                    </div>
                </div>
                
            {{Form::close()}}
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            {{Form::open(['url'=>'changeCustomerInfoDetail','method'=>'POST', 'class'=> 'form-group','id'=>'formchangeCustomerInfo','onsubmit'=>'return validateForm();' ])}}
              <h1>Change Infomation Detail </h1>
              <div>
                <span class="glyphicon glyphicon-user" aria-hidden="true"> Họ&Tên </span>
                <input type="text" class="form-control" placeholder="{{$khachhang->ten}}" title="Họ Tên Khách Hàng" />
              </div>
              <div>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"> Email</span>
                <input type="email" class="form-control" placeholder="{{$khachhang->email}}" title="Email Liên Lạc" />
              </div>
              <div>
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"> Phone </span>
                <input type="text" class="form-control" placeholder="{{$khachhang->so_dien_thoai}}" title="Số Điện Thoại"  />
              </div>
              <div>
                <span class="glyphicon glyphicon-home" aria-hidden="true"> Address </span>              
                <input type="text" class="form-control" placeholder="{{$khachhang->dia_chi}}" title="Địa Chỉ Liên Hệ"  />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Thay Đổi</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signin" class="to_register"> Change Username Or Password</a>
                </p>

                <div class="clearfix"></div>
                <br />

               <div>
                <h1><a href="{{url('/khachhangUI')}}">ABCXYZ</a></h1>
                    <p>©2017 All Rights Reserved. </p>
                </div>
              </div>
            {{Form::close()}}
          </section>
        </div>
      </div>
    </div>
    <!-- PNotify -->
    <script src="/js/pnotify/pnotify.js"></script>
    <script src="/js/pnotify/pnotify.buttons.js"></script>
    <script src="/js/pnotify/pnotify.nonblock.js"></script>
    <script>
        $("#matkhaumoi , #matkhaumoixacnhan").change(function(){
            var matkhaumoi  = $("#matkhaumoi").val();
            var matkhaumoixacnhan = $("#matkhaumoixacnhan").val();
            console.log("@ method change");

            if(matkhaumoi=="" && matkhaumoixacnhan=="") {

            }else{
                if(matkhaumoi != ""){
                    if(matkhaumoixacnhan!="" && matkhaumoi != matkhaumoixacnhan){
                        new PNotify({
                            title: 'Mật Khẩu Không Khớp Nhau',
                            text: 'Kiểm tra lại thông tin của 2 password',
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                        $("#matkhaumoi").val("");
                        $("#matkhaumoixacnhan").val("");
                    } 
                }
            }
        });
        window.onload=function(){
            NProgress.start();
            NProgress.set(0.4);
            NProgress.set(0.4);            
            NProgress.inc(); 
            NProgress.done();
        }
    </script>
    @if(Session::has('fail'))
        <script>
            $(document).ready(function(){
                 new PNotify({
                    title: 'Không Thay Đổi Được THông tin',
                    text: 'Kiểm tra lại thông tin của 2 password',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            })
            
        </script>
    @endif
  </body>
</html>
