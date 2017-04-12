<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->nhan_vien_seeder();
        $this->kho_seeder();
        $this->loai_soi_seeder();
        $this->nha_cung_cap_seeder();
        $this->don_hang_cong_ty_seeder();
        $this->hoa_don_nhap_seeder();
        $this->phieu_xuat_soi_seeder();
        $this->mau_seeder();
        $this->lonhuom_seeder();
        echo $this->nhan_vien['truc'] . "\n\n" ;
        echo $this->nhan_vien['truc']->khos . "\n\n";
        echo $this->kho['kho_soi_1']->nhan_vien_quan_ly;
    }

    public function nhan_vien_seeder()
    {
        $this->nhan_vien['truc'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'truc'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Vũ Duy Trúc',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                //'email' => 'truc193204@gmail.com',
                'so_dien_thoai' => '+84 163 222 8 000',
                'dia_chi' => '606/49/2C, đường 3 tháng 2, phường 14, quận 10, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
        $this->nhan_vien['doan'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'doan'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Lê Công Doãn',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                'email' => 'doanlecong1811@gmail.com',
                'so_dien_thoai' => '0982503643',
                'dia_chi' => '27/1I tổ 7 . Ấp Chánh 2, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
        $this->nhan_vien['hung'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'hung'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Nguyễn Văn Hùng',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                'email' => 'hungvannguyen1811@gmail.com',
                'so_dien_thoai' => '0982503645',
                'dia_chi' => '27/1I tổ 7 . Ấp Chánh 3, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
        $this->nhan_vien['hoa'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'hoa'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Nguyễn Văn Hùng',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                'email' => 'hungvannguyen111@gmail.com',
                'so_dien_thoai' => '0982503633',
                'dia_chi' => '27/1I tổ 7 . Ấp Chánh 4, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
        $this->nhan_vien['ngoc'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'ngoc'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Lê Xuân Ngọc',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                'email' => 'hungvannguyen181@gmail.com',
                'so_dien_thoai' => '0982503629',
                'dia_chi' => '27/1I tổ 7 . Ấp Chánh 5, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
        $this->nhan_vien['dung'] = App\NhanVien::firstOrCreate(
            ['ten_dang_nhap' => 'dung'],
            [
                'mat_khau' => Hash::make('123abc'),
                'ten' => 'Bùi Quý Dung',
                'cmnd' => '272277194',
                'ngay_sinh' => date('Y-m-d'),
                'email' => 'hungvannguyen@gmail.com',
                'so_dien_thoai' => '0982503623',
                'dia_chi' => '27/1I tổ 7 . Ấp Chánh 6, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );
    }
    public function loai_soi_seeder(){
        $this->loai_soi['cotton']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi Bông Cotton',
            'thong_tin_ky_thuat'=>'Sợi bông được làm từ cây sợi bông – một giống cây trồng rất lâu đời. Trong ngành may mặc và chế biến người ta phân biệt các loại bông trước tiên theo chiều dài của sợi, sau đó đến mùi, màu và độ sạch của cuộn sợi. Sợi bông càng dài thì càng có chất lượng cao.<br><br>Sợi bông là loại sợi thiên nhiên có khả năng hút/ thấm nước rất cao; sợi bông có thể thấm nước đến 65% so với trọng lượng. Sợi bông có khuynh hướng dính bẩn và dính dầu mỡ, dù vậy có thể giặt sạch được. Sợi bông thân thiện với da người (không làm ngứa) và không tạo ra các nguy cơ dị ứng việc khiến cho sợi bông trở thành nguyên liệu quan trọng trong ngành dệt may.<br><br>Sợi bông không hòa tan trong nước, khi ẩm hoặc ướt sẽ dẻo dai hơn khi khô ráo. Sợi bông bền đối với chất kềm, nhưng không bền đối với acid và có thể bị vi sinh vật phân hủy. Dù vậy khả năng chịu được mối mọt và các côn trùng khác rất cao. Sợi bông dễ cháy nhưng có thể nấu trong nước sôi để tiệt trùng.<br><br>Lãnh vực chính của sợi bông là việc ứng dụng trong ngành may mặc. Ngoài ra, sợi bông còn được dùng làm thành phần trong các chất liệu tổng hợp.',
            'khoi_luong_ton'=> 2000,
            'so_thung_ton'=> 20,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'created_by'=> $this->nhan_vien['dung']->id,
            'updated_by'=> $this->nhan_vien['dung']->id,
        ]);
         $this->loai_soi['totam']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi Tở Tằm',
            'thong_tin_ky_thuat'=>'Có 4 loại tơ tằm tự nhiên, tơ của tằm dâu là loại được sản xuất nhiều chiếm 95% sản lượng trên thế giới. Sợi tơ tằm được tôn vinh là "Nữ Hoàng” của ngành dệt mặc dù sản lượng sợi tơ sản xuất ra thấp hơn nhiều so với các loại sợi khác như: bông, đay, gai… nhưng nó vẫn chiếm vị trí quan trọng trong ngành dệt, nó tô đậm màu sắc hàng đầu thế giới về mốt thời trang tơ tằm.<br><br>Đặc điểm chủ yếu của tơ là chiều dài tơ đơn và độ mảnh tơ. Sợi tơ có thể hút ẩm, bị ảnh hưởng bởi nước nóng, axit, bazơ, muối kim loại, chất nhuộm màu. Mặt cắt ngang sợi tơ có hình dạng tam giác với các góc tròn. Vì có hình dạng tam giác nên ánh sáng có thể rọi vào ở nhiều góc độ khác nhau, sợi tơ có vẻ óng ánh tự nhiên.<br><br>Lụa là một loại vải mịn, mỏng được dệt bằng tơ. Loại lụa tốt nhất được dệt từ tơ tằm. Người cầm có thể cảm nhận được vẻ mịn và mượt mà của lụa không giống như các loại vải dệt từ sợi nhân tạo. Quần áo bằng lụa rất thích hợp với thời tiết nóng và hoạt động nhiều vì lụa dễ thấm mồ hôi. Quần áo lụa cũng thích hợp cho thời tiết lạnh vì lụa dẫn nhiệt kém làm cho người mặc ấm hơn.',
            'khoi_luong_ton'=> 360,
            'so_thung_ton'=> 10,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'created_by'=> $this->nhan_vien['dung']->id,
            'updated_by'=> $this->nhan_vien['dung']->id,
        ]);
         $this->loai_soi['polyester']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi Polyester',
            'thong_tin_ky_thuat'=>'Polyester là một loại sợi tổng hợp với thành phần cấu tạo đặc trưng là ethylene (nguồn gốc từ dầu mỏ). Quá trình hóa học tạo ra các polyester hoàn chỉnh được gọi là quá trình trùng hợp. Có bốn dạng sợi polyester cơ bản là sợi filament, xơ, sợi thô, và fiberfill.<br><br>Polyester được ứng dụng nhiều trong ngành công nghiệp để sản xuất các loại sản phẩm như quần áo, đồ nội thất gia dụng, vải công nghiệp, vật liệu cách điện… Sợi Polyester có nhiều ưu thế hơn khi so sánh với các loại sợi truyền thống là không hút ẩm, nhưng hấp thụ dầu. Chính những đặc tính này làm cho Polyester trở thành một loại vải hoàn hảo đối với những ứng dụng chống nước, chống bụi và chống cháy. Khả năng hấp thụ thấp của Polyester giúp nó tự chống lại các vết bẩn một cách tự nhiên. Vải Polyester không bị co khi giặt, chống nhăn và chống kéo dãn. Nó cũng dễ dàng được nhuộm màu và không bị hủy hoại bởi nấm mốc. Vải Polyester là vật liệu cách nhiệt hiệu quả, do đó nó được dung để sản xuất gối, chăn, áo khoác ngoài và túi ngủ.',
            'khoi_luong_ton'=> 1000,
            'so_thung_ton'=> 25,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'created_by'=> $this->nhan_vien['dung']->id,
            'updated_by'=> $this->nhan_vien['dung']->id,
        ]);
         $this->loai_soi['cm_cd']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi CM /Sợi CD',
            'thong_tin_ky_thuat'=>'CM là sợi 100% cotton chải kỹ; CD là sợi 100% cotton chải thô. Sơi này hút ẩm tốt, dễ chịu khi tiếp xúc với da người. Thường dùng để dệt các loại vải mềm, đố lót.',
            'khoi_luong_ton'=> 500,
            'so_thung_ton'=> 10,
            'kho_id'=>$this->kho['kho_soi_2']->id,
            'created_by'=> $this->nhan_vien['ngoc']->id,
            'updated_by'=> $this->nhan_vien['ngoc']->id,
        ]);
        $this->loai_soi['tcm_tcd']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi TCM /Sợi TCD',
            'thong_tin_ky_thuat'=>'TC là sợi với thành phần bao gồm 65% PE và 35% cotton chải kỹ (TCM); 65 % PE, 35 % cotton chải thô (TCD). Sợi này dễ dễ chịu khi tiếp xúc với da người, chịu là (ủi) phẳng, giặt dễ sạch và chóng khô, phù hợp dệt vải áo quần.',
            'khoi_luong_ton'=> 400,
            'so_thung_ton'=> 10,
            'kho_id'=>$this->kho['kho_soi_2']->id,
            'created_by'=> $this->nhan_vien['ngoc']->id,
            'updated_by'=> $this->nhan_vien['ngoc']->id,
        ]);
        $this->loai_soi['cvc']=App\LoaiSoi::firstOrCreate([
            'ten'=>'Sợi CVC (Chief Value of Cotton',
            'thong_tin_ky_thuat'=>'CVC là sợi với thành phần chính là cotton; ví dụ CVC 65% cotton và 35% PE. Vải sợi pha này mang tính chất của cả hai loại sợi cấu thành nên nó là sợi cotton và PE.',
            'khoi_luong_ton'=> 500,
            'so_thung_ton'=> 10,
            'kho_id'=>$this->kho['kho_soi_2']->id,
            'created_by'=> $this->nhan_vien['ngoc']->id,
            'updated_by'=> $this->nhan_vien['ngoc']->id,
        ]);
    }
    public function kho_seeder()
    {
        $this->kho['kho_soi_1'] = App\Kho::firstOrCreate([
            'ten' => 'Kho sợi 1',
            'dien_tich' => 12345678901234567890.1234567890,
            'dia_chi' => '268 Lý Thường Kiệt, phường 14, quận 10, Tp Hồ Chí Minh',
            'so_dien_thoai' => '(08) 408 8888',
            'nhan_vien_quan_ly_id' => $this->nhan_vien['truc']->id,
            //'ghi_chu' => '',
        ]);
        $this->kho['kho_soi_2'] = App\Kho::firstOrCreate([
            'ten' => 'Kho sợi 2',
            'dien_tich' => 12345678901234567890.1234567890,
            'dia_chi' => 'Ấp Chánh 2, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
            'so_dien_thoai' => '(08) 408 2222',
            'nhan_vien_quan_ly_id' => $this->nhan_vien['doan']->id,
            //'ghi_chu' => '',
        ]);
        $this->kho['kho_soi_3'] = App\Kho::firstOrCreate([
            'ten' => 'Kho sợi 3',
            'dien_tich' => 12345678901234567890.1234567890,
            'dia_chi' => 'Ấp Chánh 3, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh',
            'so_dien_thoai' => '(08) 408 2233',
            'nhan_vien_quan_ly_id' => $this->nhan_vien['hung']->id,
            //'ghi_chu' => '',
        ]);
    }
    public function nha_cung_cap_seeder(){
        $this->nha_cung_cap['hai_yen'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Hải Yến',
            'dia_chi'=>'Số 8, Đường số 6, P.Tam Phú, Q.Thủ Đức, Tp.HCM',
            'email'=> 'ctytnhhsoihaiyen@gmail.com',
            'so_dien_thoai'=> '0932041041',
            'fax'=> '(08) 38970962',
            'cong_no'=>44000000,

        ]);
        $this->nha_cung_cap['nam_hung'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Nam Hưng',
            'dia_chi'=>'Số 13, Đường 48C, P.Tân Tạo, Q.Bình Tân, Tp.HCM',
            'email'=> 'ctydetmaynamhung@yahoo.com',
            'so_dien_thoai'=> '(08) 37507398',
            //'fax'=> '(08) 38970962',
            'cong_no'=>11200000,
            
        ]);
        $this->nha_cung_cap['top_net'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Topnet Việt Nam',
            'dia_chi'=>'122 Đường Nguyễn Hoàng, P.An Phú, Q.2, Tp.HCM',
            'email'=> 'salesvietnam.topnet@gmail.com',
            'so_dien_thoai'=> '(08) 62811102',
            //'fax'=> '(08) 38970962',
            'cong_no'=>59000000,
            
        ]);
        $this->nha_cung_cap['thang_loi'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Việt Thắng Lợi',
            'dia_chi'=>'23/6 Nguyễn Ảnh Thủ, Ấp Hưng Lân, Xã Bà Điểm, Huyện Hóc Môn, Tp.HCM',
            'email'=> 'sales@vietthangloi.vn',
            'so_dien_thoai'=> '(08) 37182234',
            'fax'=> '(08) 37182224',
            'cong_no'=>66000000,
            
        ]);
        $this->nha_cung_cap['hue_dat'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Huệ Đạt',
            'dia_chi'=>'Số 85 Phạm Văn Xảo, P.Phú Thọ Hòa, Q.Tân Phú, Tp.HCM',
            'email'=> 'congtyhuedat@gmail.com',
            'so_dien_thoai'=> '(08) 39780228',
            'fax'=> '(08) 39780228',
            'cong_no'=>20200000,
            
        ]);
        $this->nha_cung_cap['nam_viet'] = App\NhaCungCap::firstOrCreate([
            'ten'=>'Nam Việt',
            'dia_chi'=>'Số 86, Tổ 2, Khu phố Bà Tri, P.Tân Hiệp, Xã Tân Uyên, Tỉnh Bình Dương',
            'email'=> 'sales@navipoly.com',
            'so_dien_thoai'=> '+84 0650 3655361',
            'fax'=> '+84 650 3655360',
            'cong_no'=>52000000,
            
        ]);
        
    }
    public function don_hang_cong_ty_seeder(){
        $this->don_hang_cong_ty['don_hang_1'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cotton']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hai_yen']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => 'Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_2'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['totam']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['nam_hung']->id,
            'khoi_luong'=>1000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => ' Chưa Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_3'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['polyester']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['top_net']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => 'Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_4'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cm_cd']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['thang_loi']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => ' Chưa Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_5'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['tcm_tcd']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hue_dat']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => 'Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_6'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cvc']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['nam_viet']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            'tinh_trang' => 'Hoàn Thành',
        ]);
         $this->don_hang_cong_ty['don_hang_7'] = App\DonHangCongTy::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cvc']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['nam_viet']->id,
            'khoi_luong'=>2000,
            'ngay_gio_dat_hang'=> date('Y-m-d H:m:s'),
            //'tinh_trang' => 'Hoàn Thành',
        ]);

    }
    public function hoa_don_nhap_seeder(){
        $this->hoa_don_nhap['hdn1'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_1']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hai_yen']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn2'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_1']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hai_yen']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=>date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn3'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_1']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hai_yen']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn4'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_2']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['nam_hung']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=>date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn5'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_3']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['top_net']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn6'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_4']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['thang_loi']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn7'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_5']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['hue_dat']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_2']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        $this->hoa_don_nhap['hdn8'] = App\HoaDonNhap::firstOrCreate([
            'don_hang_cong_ty_id'=> $this->don_hang_cong_ty['don_hang_6']->id,
            'nha_cung_cap_id'=> $this->nha_cung_cap['nam_viet']->id,
            'so_thung'=>25,
            'khoi_luong_thung'=> 40,
            'don_gia'=>37000,
            'kho_id'=>$this->kho['kho_soi_2']->id,
            'ngay_gio_xuat_hoa_don'=> date('Y-m-d H:m:s'),
            'nhan_vien_nhap_id'=>$this->nhan_vien['ngoc']->id,
        ]);
        
    }
    public function phieu_xuat_soi_seeder(){
        $this->phieu_xuat_soi['p1']=App\PhieuXuatSoi::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cotton']->id,
            'so_thung'=>20,
            'khoi_luong_thung'=>100,
            'tong_khoi_luong_xuat'=>2000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'nhan_vien_xuat_id'=>$this->nhan_vien['ngoc']->id,
            'ngay_gio_xuat_kho'=>date('Y-m-d H:m:s'),
        ]);
        $this->phieu_xuat_soi['p1']=App\PhieuXuatSoi::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['totam']->id,
            'so_thung'=>20,
            'khoi_luong_thung'=>100,
            'tong_khoi_luong_xuat'=>2000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'nhan_vien_xuat_id'=>$this->nhan_vien['ngoc']->id,
            'ngay_gio_xuat_kho'=>date('Y-m-d H:m:s'),
        ]);
        $this->phieu_xuat_soi['p1']=App\PhieuXuatSoi::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['polyester']->id,
            'so_thung'=>20,
            'khoi_luong_thung'=>100,
            'tong_khoi_luong_xuat'=>2000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'nhan_vien_xuat_id'=>$this->nhan_vien['ngoc']->id,
            'ngay_gio_xuat_kho'=>date('Y-m-d H:m:s'),
        ]);
        $this->phieu_xuat_soi['p1']=App\PhieuXuatSoi::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cvc']->id,
            'so_thung'=>20,
            'khoi_luong_thung'=>100,
            'tong_khoi_luong_xuat'=>2000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'nhan_vien_xuat_id'=>$this->nhan_vien['ngoc']->id,
            'ngay_gio_xuat_kho'=>date('Y-m-d H:m:s'),
        ]);
        $this->phieu_xuat_soi['p1']=App\PhieuXuatSoi::firstOrCreate([
            'loai_soi_id'=>$this->loai_soi['cm_cd']->id,
            'so_thung'=>20,
            'khoi_luong_thung'=>100,
            'tong_khoi_luong_xuat'=>2000,
            'kho_id'=>$this->kho['kho_soi_1']->id,
            'nhan_vien_xuat_id'=>$this->nhan_vien['ngoc']->id,
            'ngay_gio_xuat_kho'=>date('Y-m-d H:m:s'),
        ]);
    }
    public function mau_seeder(){
        $this->mau['1']=App\Mau::firstOrCreate([
            'ten'=>'Trắng',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id' => $this->nhan_vien['dung']->id,
        ]);
        $this->mau['2']=App\Mau::firstOrCreate([
            'ten'=>'Đen',
            //'cong_thuc'=>''
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['3']=App\Mau::firstOrCreate([
            'ten'=>'Xanh',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['4']=App\Mau::firstOrCreate([
            'ten'=>'Đỏ',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['5']=App\Mau::firstOrCreate([
            'ten'=>'Vàng',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['6']=App\Mau::firstOrCreate([
            'ten'=>'Tím',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['7']=App\Mau::firstOrCreate([
            'ten'=>'Cam',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['8']=App\Mau::firstOrCreate([
            'ten'=>'Lục',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
        $this->mau['9']=App\Mau::firstOrCreate([
            'ten'=>'Lam',
            //'cong_thuc'=>'',
            'ma_mau'=>'#ffffff',
            'nhan_vien_pha_che_id'=>$this->nhan_vien['dung']->id,
        ]);
    }
    public function lonhuom_seeder(){
        $this->lonhuom['1']=App\LoNhuom::firstOrCreate([
            'loai_vai_id'=>1,
            'mau_id'=>1,
            'nhan_vien_nhuom_id'=>5,
            'ngay_gio_nhuom'=>date('Y:m:d H:m:s'),
        ]);
        $this->lonhuom['1']=App\LoNhuom::firstOrCreate([
            'loai_vai_id'=>2,
            'mau_id'=>2,
            'nhan_vien_nhuom_id'=>5,
            'ngay_gio_nhuom'=>date('Y:m:d H:m:s'),
        ]);
        $this->lonhuom['1']=App\LoNhuom::firstOrCreate([
            'loai_vai_id'=>3,
            'mau_id'=>3,
            'nhan_vien_nhuom_id'=>5,
            'ngay_gio_nhuom'=>date('Y:m:d H:m:s'),
        ]);
        $this->lonhuom['1']=App\LoNhuom::firstOrCreate([
            'loai_vai_id'=>4,
            'mau_id'=>4,
            'nhan_vien_nhuom_id'=>5,
            'ngay_gio_nhuom'=>date('Y:m:d H:m:s'),
        ]);
        $this->lonhuom['1']=App\LoNhuom::firstOrCreate([
            'loai_vai_id'=>5,
            'mau_id'=>5,
            'nhan_vien_nhuom_id'=>5,
            'ngay_gio_nhuom'=>date('Y:m:d H:m:s'),
        ]);
    }
    public function loai_vai_seeder(){
        $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'Cotton sọc thẳng',
            'don_gia'=>50000,
            'loai_soi_id'=>1,
        ]);
         $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'Cotton thun',
            'don_gia'=>50000,
            'loai_soi_id'=>1,
        ]);
         $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'Polyester mỏng',
            'don_gia'=>50000,
            'loai_soi_id'=>3,
        ]);
         $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'Polyester dầy',
            'don_gia'=>50000,
            'loai_soi_id'=>3,
        ]);
         $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'CVC mềm',
            'don_gia'=>50000,
            'loai_soi_id'=>6,
        ]);
         $this->loai_vai[1]=App\LoaiVai::firstOrCreate([
            'ten'=>'CVC cứng',
            'don_gia'=>50000,
            'loai_soi_id'=>6,
        ]);
    }
}