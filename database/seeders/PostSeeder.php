<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::create([
        //     'title' => 'ทุนวิจัย',
        //     'category_id' => 1,
        //     'users_id' => 1,
        //     'publish' => 1,
        //     'gallery_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'ประกาศ/ข่าว',
        //     'category_id' => 2,
        //     'users_id' => 1,
        //     'publish' => 1,
        //     'gallery_id' => 2
        // ]);

        Post::create([
            'title' => 'กิจกรรมหน่วยงาน',
            'category_id' => 1,
            'users_id' => 1,
            'publish' => 1,
            'gallery_id' => 3
        ]);

        Post::create([
            'title' => 'ข่าวประชาสัมพันธ์',
            'category_id' => 2,
            'users_id' => 1,
            'publish' => 1,
            'gallery_id' => 4
        ]);
    }
}
