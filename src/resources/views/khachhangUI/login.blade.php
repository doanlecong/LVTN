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

    
    <!--<link href="css/themify-icons.css" rel="stylesheet">-->
    <link href='css/dosis-font.css' rel='stylesheet' type='text/css'>
  </head>

  <body class="login">
    @if (Session::has('fail'))
	
        <div class="alert alert-danger " role="alert">
            <h4 class="text-center"><strong>Success:</strong> {{ Session::get('fail') }}</h4>
        </div>

    @endif
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           {{Form::open(['url'=>'loginKhachHang','method'=>'POST', 'class'=> 'form-group','id'=>'formdangnhap','onsubmit'=>'return validateForm();' ])}}
                
                <h1>Đăng Nhập Tài Khoản</h1>
                <div>
                    <input type="text" class="form-control" name="tendangnhap" id="tendangnhap" placeholder="Username" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" name="matkhau" id="matkhau" placeholder="Password" required="" />
                </div>
                
                <div>
                    <!--<a class="btn btn-warning" type="submit">Đăng Nhập</a>-->
                    
                    <button type="submit" class="btn btn-default submit">Đăng Nhập</button>
                    
                    <a class="reset_pass" href="#">Quên Mật Khẩu</a>
                </div>

                <div class="clearfix"></div>

                <!--<div class="separator">
                    <p class="change_link">New to site?
                    <a href="#signup" class="to_register"> Create Account </a>
                    </p>-->

                    <div class="clearfix"></div>
                    <br />

                    <div>
                    <h1>ABCXYZ</h1>
                    <p>©2017 All Rights Reserved. </p>
                    </div>
                </div>
                
            {{Form::close()}}
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <!--<form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>-->
          </section>
        </div>
      </div>
    </div>
    


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/core-min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/hmac-sha512.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/sha512.js"></script>-->
    <script>
        function validateForm(){
            var tendanhnhap = $("#formdangnhap #tendangnhap").val();
            var matkhau =  $("#formdangnhap #matkhau").val();

            if(tendangnhap =="" ||matkhau ==""){
                alert('Thiếu Thông Tin');
                return false;

            }else{
                return true;
            }
            
        }
        window.onload=function(){
            NProgress.start();
            NProgress.set(0.4);
            NProgress.set(0.4);            
            NProgress.inc(); 
            NProgress.done();
        }
    </script>
  </body>
</html>
