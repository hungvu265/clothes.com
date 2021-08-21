<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanpham')->insert([
        	['hinhanh' => '1.jpg','ten' => 'Giày nike Downshifer','created_at' => now()],
        	['ten' => 'Quần','created_at' => now()],
            ['ten' => 'Giày','created_at' => now()],
            ['ten' => 'Phụ kiện','created_at' => now()]
        ]);
    }
}
