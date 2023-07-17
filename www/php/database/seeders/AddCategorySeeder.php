<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j = 1; $j <= 3; $j++) {
            for ($i = 1; $i <= 5; $i++) {
                $obj = new Category();
                $obj->language_id = $j;
                $obj->title = 'Category ' . $i;
                $obj->description = 'Description ' . $i;
                $obj->keywords = 'Keywords ' . $i;
                $obj->content = 'Content ' . $i;
                $obj->save();
            }
        }
    }
}
