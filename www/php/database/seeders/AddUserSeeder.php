<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new User();
        $obj->name = 'admin';
        $obj->email = 'admin@admin.ua';
        $obj->password = bcrypt('12345678');
        $obj->save();
    }
}
