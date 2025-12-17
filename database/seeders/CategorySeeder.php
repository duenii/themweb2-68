<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use WithoutModelEvents;
    public function run()
    {
        // Category::create([
        //     'name' => 'ทุนวิจัย'
        // ]);

        // Category::create([
        //     'name' => 'ประชุม/อบรม'
        // ]);

        Category::create([
            'name' => 'กิจกรรมหน่วยงาน'
        ]);

        Category::create([
            'name' => 'ข่าวประชาสัมพันธ์'
        ]);
    }
}
