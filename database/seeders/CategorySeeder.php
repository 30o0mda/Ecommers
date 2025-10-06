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
    public function run(): void
    {
        $categories = [
            ['id'=>'1','name' => 'ماكولات','description' => 'اشهي اكلات شرقيه وغربيه','image_path' => 'assets/img/makolat.jpg'],
            ['id'=>'2','name' => 'الكترونيات','description' => 'جميع انواع الالكترونيات','image_path' => 'assets/img/alectronyat.jpg'],
            ['id'=>'3','name' => 'كاميرات','description' => 'احدث الكاميرات العالميه','image_path' => 'assets/img/camerat.webp'],
            ['id'=>'4','name' => 'شنط','description' => 'جميع انواع الشنط ','image_path' => 'assets/img/shonat.avif'],
            ['id'=>'5','name' => 'مكياج','description' => 'اشهر مركات المكياج العالميه','image_path' => 'assets/img/makyag.jpg'],
            ['id'=>'6','name' => 'ساعات','description' => 'جميع انواع الساعات','image_path' => 'assets/img/sa3at.webp'],
        ];
        Category::insertOrIgnore($categories);
    }
}
