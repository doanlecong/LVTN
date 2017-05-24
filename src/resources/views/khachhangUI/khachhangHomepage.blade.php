<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Meetup is a free responsive single page bootstrap template by designerdada.com">
  <meta name="author" content="Akash Bhadange">
  <title>Công Ty Vải ABCXYZ | Chào mừng quý khách</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/themify-icons.css" rel="stylesheet">
  <link href='css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link href="/css/nprogress/nprogress.css" rel="stylesheet">
  <script src="/js/nprogress.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  <style>
      #inputsearch{
        width: 150px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color:white;
        background-image: url('images/searchicon.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
      }
      #inputsearch:focus{
        width:500px;
      }
  </style>
</head>
    <body id="page-top" data-spy="scroll" data-target=".side-menu">
      <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">ABCXYZ</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left">
                <!--<div class="form-group">-->
                  <!--<input type="text" class="form-control" placeholder="Search">-->
                  <input type="text" id="inputsearch" name="search"  class="form-control" placeholder="Search..">
                <!--</div>-->
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/loginKhachHang')}}">Đăng Nhập</a></li>
                <!--<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li>-->
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
      </nav>
      <nav class="side-menu">
        <ul>
          <li class="hidden active">
            <a class="page-scroll" href="#page-top"></a>
          </li>
          <li>
            <a href="#home" class="page-scroll">
              <span class="menu-title">Home</span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#speakers" class="page-scroll">
              <span class="menu-title">Lý Do Chọn Mua</span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#tickets" class="page-scroll">
              <span class="menu-title">Danh Mục Sản Phẩm</span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#schedule" class="page-scroll">
              <span class="menu-title">Liên Hệ</span>
              <span class="dot"></span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="container-fluid">
        <!-- Start: Header -->
        <div class="row hero-header" id="home">
          <div class="col-md-7">
            <img src="images/logo.png" class="logo">
            <h1>Công Ty Cổ Phần Cung Cấp Vải ABCXYZ</h1>
            <h3>Chào mừng bạn !</h3>
            <div id="ngaythang">
              <!--<h4>17<sup>th</sup>  May, 2017</h4>-->
            </div>
            <a href="#" class="btn btn-lg btn-red">Mua Vải Ngay<span class="ti-arrow-right"></span></a>

          </div>
          <div class="col-md-5 hidden-xs">
            <img src="images/logo.png" class="rocket animated bounce">
          </div>
        </div>
        <!-- End: Header -->
      </div>
      <div class="container">
        <!-- Start: Desc -->
        <div class="row me-row content-ct">
          <h2 class="row-title">Những Lý Do Mà Bạn Nên Mua Vải Của Công Ty Chúng Tôi</h2>
          <div class="col-md-4 feature">
            <span class="ti-ticket"></span>
            <h3>Vải Được Sản Xuất Với Công Nghệ ABCSDD</h3>
            <p>Với Công Nghệ ABCSDD , vải sẽ cho chất lượng tốt bền màu .</p>
          </div>
          <div class="col-md-4 feature">
            <span class="ti-microphone"></span>
            <h3>An Toàn Với Cả Da Nhạy Cảm</h3>
            <p>Quy Trình Sản Xuất Không Sử Dụng Bất Kỳ Chất Hóa Học Nào Có Khả Năng Gây Hại Cho Con Người </p>
          </div>
          <div class="col-md-4 feature">
            <span class="ti-world"></span>
            <h3>Sản Phẩm Đã Được Nhiều Nơi Ưa Chuộng</h3>
            <p>Trong Năm 2016 , Công Ty Chúng Tôi Đã Xuất Sản Phẩm Đến 23 Quốc Gia của 5 Châu Lục .</p>
          </div>
        </div>
        <!-- End: Desc -->

        <!-- Start: Speakers -->
        <div class="row me-row content-ct speaker" id="speakers">
          <h2 class="row-title">Sản Phẩm Công Ty Sản Xuất!!</h2>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/cotton-fabric.png" class="speaker-img">
            <h3>Vải Cotton</h3>
            <p> Vải cotton được tổng hợp được làm từ nguyên liệu thiên nhiên trong đó nguyên liệu chính là sợi bông và các chất hóa học tạo thành, cotton đang được sử dụng rộng rãi</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/cvc-fabric.png" class="speaker-img">
            <h3>Vải CVC</h3>
            <p>CVC” là chữ viết tắt tiếng Anh  “Chief Value of Cotton”, tạm dịch là “Xơ bông giá trị cao”. Vải hỗn hợp của xơ polyester với xơ bông, trong đó tỷ lệ thành phần xơ bông trong sợi.</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/kaki-fabric.png" class="speaker-img">
            <h3>Vải Kaki</h3>
            <p>Vải kaki thông thường được làm từ cotton 100%. Tuy nhiên trên thị trường còn có một loại vải kaki khác chứa thành phần sợi tổng hợp được đan chéo với sợi cotton.</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/poly-fabric.png" class="speaker-img">
            <h3>Vải Polyester</h3>
            <p>Vải Polyester là loại vải được dệt hoàn toàn bằng 100% polyester Ưu điểm: giá thành sản phẩm thấp, hình in sắc nét và khó bay màu, học sinh, sinh viên ưa chuộng.</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/tc-fabric.png" class="speaker-img">
            <h3>Vải TC</h3>
            <p>Thành phần gồm 35 % xơ cotton & 65% xơ PE. Cho cảm giác ngoài độ mềm mại của vải, vẫn còn độ “đứng vải” của PE>Là chất liệu trung bình khi làm áo thun đa phần sử dụng.</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="images/lua-fabric.png" class="speaker-img">
            <h3>Vải Lụa</h3>
            <p>Lụa là một loại vải mịn, mỏng được dệt bằng tơ. Loại lụa tốt nhất được dệt từ tơ tằm. Người ta nuôi tằm lấy tơ xe sợi dệt thành lụa. Đây là một nghề có từ rất lâu đời.</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
        <!-- End: Speakers -->
      </div>

      <!-- Start: Tickets -->
      <!--<div class="container-fluid tickets" id="tickets">
        <div class="row me-row content-ct">
          <h2 class="row-title">Buy Tickets</h2>
          <div class="col-md-4 col-sm-6 col-md-offset-2">
            <h3>Early Bird Ticket</h3>
            <p class="price">$399</p>
            <p>All days entry pass for all the events.</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(6 remaining)</small></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <h3>Workshop Pass</h3>
            <p class="price">$199</p>
            <p>Entry pass for each workshop</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(42 remaining)</small></a>
          </div>
        </div>
      </div>-->
      <!-- End: Tickets -->

      <!-- Start: Schedule -->
      <!--<div class="container">
        <div class="row me-row schedule" id="schedule">
          <h2 class="row-title content-ct">Event Schedule</h2>
          <div class="col-md-12">
            
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#day-1" aria-controls="home" role="tab" data-toggle="tab">Day 01 <small class="hidden-xs">(20<sup>th</sup>, October)</small></a></li>
              <li role="presentation"><a href="#day-2" aria-controls="profile" role="tab" data-toggle="tab">Day 02 <small class="hidden-xs">(21<sup>st</sup>, October)</small></a></li>
              <li role="presentation"><a href="#day-3" aria-controls="messages" role="tab" data-toggle="tab">Day 03 <small class="hidden-xs">(22<sup>nd</sup>, October)</small></a></li>
            </ul>

            
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="day-1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-1.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10am to 10:30am</h4>
                        <h5>THE DESIGNER’S GUIDE TO BEING ESSENTIAL</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-2.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10:45am to 11:30am</h4>
                        <h5>MODULAR DESIGN AT WORK</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-3.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">12:00pm to 01:30pm</h4>
                        <h5>AN INTRODUCTION TO TOUCH AND POINTER EVENTS</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-4.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">02:00pm to 03.30pm</h4>
                        <h5>WEB FONTS PERFORMANCE</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="day-2">
                <div class="row">
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-4.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10am to 10:30am</h4>
                        <h5>MAKING DOG FOOD PART OF A BALANCED DIET</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-3.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10:45am to 11:30am</h4>
                        <h5>HANDS-ON WEB AUDIO</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-2.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">12:00pm to 01:30pm</h4>
                        <h5>CONVERSION RATE OPTIMIZATION TECHNIQUES IN ECOMMERCE</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-1.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">02:00pm to 03.30pm</h4>
                        <h5>PAPER PROTOTYPING APPLICATIONS</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="day-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-6.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10am to 10:30am</h4>
                        <h5>THE DESIGNER’S GUIDE TO BEING ESSENTIAL</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-5.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">10:45am to 11:30am</h4>
                        <h5>THE DESIGNER’S GUIDE TO BEING ESSENTIAL</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-3.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">12:00pm to 01:30pm</h4>
                        <h5>THE DESIGNER’S GUIDE TO BEING ESSENTIAL</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="images/speaker-4.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">02:00pm to 03.30pm</h4>
                        <h5>THE DESIGNER’S GUIDE TO BEING ESSENTIAL</h5>
                        <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <!-- End: Schedule -->

      <!-- Start: Footer -->
      <div class="container-fluid footer">
        <div class="row contact">
          <div class="col-md-6 contact-form">
            <h3 class="content-ct"><span class="ti-email"></span> Liên Hệ </h3>
            <form class="form-horizontal" data-toggle="validator" role="form">
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Tên<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" placeholder="you@youremail.com" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Tin Nhắn<sup>*</sup></label>
                <div class="col-sm-9">
                  <textarea id="message" class="form-control" rows="3" required></textarea>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" id="submit" name="submit" class="btn btn-yellow pull-right">Gửi <span class="ti-arrow-right"></span></button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-4 col-md-offset-1 content-ct">
            <h3><span class="ti-twitter"></span> Twitter Feed</h3>
            <p>Lorem <a href="#">#Ipsum</a> is a dummy text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
            <hr>
            <p>Lorem Ipsum is a <a href="#">#dummy</a> text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
            <hr>
            <p>Lorem Ipsum is a <a href="#">#dummy</a> text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
          </div>
        </div>
        <div class="row footer-credit">
          <div class="col-md-6 col-sm-6">
            <p>&copy; 2017, All rights reserved.</p>
          </div>
          <div class="col-md-6 col-sm-6"> 
            <ul class="footer-menu">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Condition</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End: Footer -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/scrolling-nav.js"></script>
      <script src="js/validator.js"></script>
      <!-- Google Analytics -->
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29231762-2', 'auto');
      ga('send', 'pageview');
      function hienthingaythang(){
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var date = new Date();
        var ngay = date.getDate();
        var thang = month[date.getMonth()];
        var nam = date.getFullYear();
        $("#ngaythang").append("<h4>"+ngay+"<sup>th</sup>  "+thang+" , "+nam+"</h4>");
      };
      function cal2function(){
        NProgress.start();
        NProgress.set(0.4);
        NProgress.set(0.4);            
        NProgress.inc(); 
        NProgress.done();
        hienthingaythang();
      }
      window.onload= cal2function;
      </script>
    </body>
    </html>