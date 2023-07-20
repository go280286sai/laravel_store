<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call(AddLangSeeder::class);
    $this->call(Insert_to_parent_category::class);
    $this->call(AddCategorySeeder::class);
    $this->call(AddProductsSeeder::class);
    $this->call(AddProductDescriptionSeeder::class);
    $this->call(SlidersSeeder::class);
    $this->call(Add_ImgSeeder::class);
    }
}
