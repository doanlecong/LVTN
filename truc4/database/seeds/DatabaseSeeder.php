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
        DB::delete('delete from kho');
        DB::delete('delete from nhan_vien');
        DB::delete('delete from khach_hang');
        DB::delete('delete from users');

        $this->nhan_vien_seeder();
        $this->khach_hang_seeder();
        $this->kho_seeder();


        echo 'SUCCESS' . "\n\n" ;
        //echo ($this->user['truc']->nhan_vien) . "\n\n";
        //echo ($this->user['truc']->khach_hang ?: 'null') . "\n\n";
    }

    public function nhan_vien_seeder()
    {
        $this->user['truc'] = App\User::firstOrCreate(
            [
                'username' => 'truc',
                'email' => 'truc193204@gmail.com',
                'password' => '123abc',
                'type' => 'N',
            ],
            [
                'chu_tai_khoan_id' => 0,
            ]
        );

        $this->nhan_vien['truc'] = App\NhanVien::firstOrCreate(
            ['so_dien_thoai' => '+84 163 222 8 000'],
            [
                'user_id' => $this->user['truc']->id,
                'ten' => 'Vũ Duy Trúc',
                'cmnd' => '272277194',
                'ngay_sinh' => date('1994-04-20'),
                'dia_chi' => '606/49/2C, đường 3 tháng 2, phường 14, quận 10, Tp Hồ Chí Minh',
                'gioi_tinh' => 'M',
                'chuc_vu' => 'Lập trình viên',
                'quyen_han' => 0,
                'luong' => 0,
                //'ghi_chu' => '',
            ]
        );

        $this->user['truc']->update([
            'chu_tai_khoan_id' => $this->nhan_vien['truc']->id,
        ]);
    }

    public function khach_hang_seeder()
    {
        $this->user['doan'] = App\User::firstOrCreate(
            [
                'username' => 'doan',
                'email' => 'thitgaluoc94@gmail.com',
                'password' => 'thitgaluoc94',
                'type' => 'K',
            ],
            [
                'chu_tai_khoan_id' => 0,
            ]
        );

        $this->khach_hang['doan'] = App\KhachHang::firstOrCreate(
            ['so_dien_thoai' => '0982503643'],
            [
                'user_id' => $this->user['doan']->id,
                'ten' => 'Lê Công Doãn',
                'dia_chi' => 'Hóc Môn, Tp Hồ Chí Minh',
                //'ghi_chu' => '',
            ]
        );

        $this->user['doan']->update([
            'chu_tai_khoan_id' => $this->khach_hang['doan']->id,
        ]);
    }

    public function kho_seeder()
    {
        $this->kho['kho_soi_1'] = App\Kho::firstOrCreate([
            'ten' => 'Kho sợi 1',
            'dia_chi' => '268 Lý Thường Kiệt, phường 14, quận 10, Tp Hồ Chí Minh',
            'so_dien_thoai' => '(08) 408 8888',
            //'ghi_chu' => '',
        ],
        [
            'dien_tich' => 1234.123,
            'nhan_vien_quan_ly_id' => $this->nhan_vien['truc']->id,
        ]);
    }
}
