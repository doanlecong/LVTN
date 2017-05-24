   <li>
        <a href="/khachhangUI" data-toggle="collapse" data-target="#demo">
            <i class="fa fa-fw fa-dashboard"></i> Trang Khách Hàng <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
   </li>
   <li>
        <a href="/khachHangDaDangnhap" data-toggle="collapse" data-target="#demo">
            <i class="fa fa-fw fa-dashboard"></i> Trang Khách Hàng Đã Đăng Nhập <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
   </li>
    <li>
        <a href="/loginKhachHang" data-toggle="collapse" data-target="#demo">
            <i class="fa fa-fw fa-dashboard"></i> Trang Login Khách Hàng <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
   </li>
   <li class="active">
        <!--<a href="{{url('/')}}"><i class="fa fa-fw fa-dashboard"></i> Quản Lý Kho</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Kho <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo" class="collapse">
            <li>
                <a href="{{url('/manage_kho_loai_soi')}}"> Loại Sợi</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_nha_cung_cap')}}"> Nhà Cung Cấp</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_don_hang_cong_ty')}}"> Đơn Hàng Công Ty</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_hoa_don_nhap')}}"> Hóa Đơn Nhập</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_phieu_xuat_soi')}}"> Phiếu Xuất Sợi</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_kho_cay_moc')}}"> Kho Mộc</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_phieu_xuat_moc')}}"> Phiếu Xuất Mộc</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_xuat_moc')}}"> Xuất Mộc</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_kho_thanh_pham')}}"> Kho Thành Phẩm</a>
            </li>
            <li>
                <a href="{{url('/manage_kho_xuat_thanh_pham')}}"> Xuất Vải Thành Phẩm</a>
            </li>
        </ul>
    </li>
    <li> 
        <!--<a href="{{url('/manage_san_xuat')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Quản Lý Sản Xuất</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Sản Xuất <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo1" class="collapse">
            <li>
                <a href="{{url('/manage_san_xuat_mau')}}">Màu</a>
            </li>
            <li>
                <a href="{{url('/manage_san_xuat_lo_nhuom')}}">Lô Nhuộm</a>
            </li>
        </ul>
    </li>
    <li>
        <!--<a href="{{url('/manage_ban_hang')}}"><i class="fa fa-fw fa-table"></i> Quản Lý Bán Hàng</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
            <i class="fa fa-fw fa-dashboard"></i> Quản Lý Bán Hàng <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo2" class="collapse">
            <li>
                <a href="{{url('/manage_ban_hang_khach_hang')}}">Khách Hàng</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang_don_hang')}}">Đơn Hàng</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang_hoa_don_xuat')}}">Hóa Đơn Xuất</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang_thanh_toan')}}">Thanh Toán</a>
            </li>
            <li>
                <a href="{{url('/manage_ban_hang_chi_cong_ty')}}">Chi Công Ty</a>
            </li>
        </ul>
    </li>
    <li>
        <!--<a href="{{url('/manage_thong_ke')}}"><i class="fa fa-fw fa-edit"></i>Thống Kê</a>-->
        <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
            <i class="fa fa-fw fa-dashboard"></i> Thống Kê <i class="fa fa-fw fa-caret-down pull-right"></i>
        </a>
        <ul id="demo3" class="collapse">
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê sợi theo số lượng tiêu thụ của loại sợi trong năm</a>
            </li>
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê mộc theo số lượng sản xuất của loại vải trong năm</a>
            </li>
            <li>
                <a href="{{url('/manage_thong_ke')}}">Thống kê thành phẩm theo loại vải bán chạy nhất trong năm</a>
            </li>
        </ul>
    </li>