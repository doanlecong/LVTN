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
    }
}
