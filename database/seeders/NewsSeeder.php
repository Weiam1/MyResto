<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::factory(20)->create(); // إنشاء 20 خبر عشوائي
    }
}
