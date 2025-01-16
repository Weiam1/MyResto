<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        FaqCategory::factory(3)->create(); // إنشاء 3 تصنيفات للأسئلة الشائعة
    }
}
