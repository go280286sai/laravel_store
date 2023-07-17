<?php

namespace Database\Seeders;

use App\Models\Product_description;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j = 1; $j <= 3; $j++) {
            for ($i = 1; $i <= 5; $i++) {
                $obj = new Product_description();
                $obj->product_id = $i;
                $obj->language_id = $j;
                $obj->title = 'Product '.$i;
                $obj->description = 'Description '.$i;
                $obj->keywords = 'Keywords '.$i;
                $obj->content = 'Content '.$i;
                $obj->exerpt = 'Exerpt '.$i;
                $obj->save();
            }
        }
    }
}
