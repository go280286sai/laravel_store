<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j = 1; $j <= 3; $j++) {
            for ($i = 1; $i <= 5; $i++) {
                $obj = new Product();
                $obj->category_id = $j;
                $obj->slug = 'Category-cat-' . $i;
                $obj->price = 10*$i;
                $obj->old_price = 10*$i-5;
                $obj->status = 1;
                $obj->hit = 1;
                $obj->img = 'uploads/img/no-image.jpg';
                $obj->is_download = 1;
                $obj->save();
            }
        }
    }
}
