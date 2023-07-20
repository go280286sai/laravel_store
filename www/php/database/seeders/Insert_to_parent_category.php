<?php

namespace Database\Seeders;


use App\Models\Main_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Insert_to_parent_category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i<=3; $i++){
            Main_category::add($i, 'Parent '.$i);
        }
    }
}
