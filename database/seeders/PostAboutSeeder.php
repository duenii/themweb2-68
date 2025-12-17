<?php

namespace Database\Seeders;

use App\Models\PostAbout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostAbout::create([
            'title' => 'ประกาศ/ข่าว',
            'users_id' => 1
        ]);

        PostAbout::create([
            'title' => 'ใบสมัครแบบฟอร์ม',
            'users_id' => 1
        ]);

        PostAbout::create([
            'title' => 'ระบบสารสนเทศ ',
            'users_id' => 1
        ]);

        PostAbout::create([
            'title' => 'ข้อมูลเผยแพร่',
            'users_id' => 1
        ]);

        PostAbout::create([
            'title' => 'ข้อมูลหน่วยงาน ',
            'users_id' => 1
        ]);

        PostAbout::create([
            'title' => 'ติดต่อเรา',
            'users_id' => 1
        ]);
    }
}
