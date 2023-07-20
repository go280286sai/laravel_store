<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
    use HasFactory;

    protected $table = 'main_categories';

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public static function add(int $lang, string $title)
    {
        $obj = new self();
        $obj->language_id = $lang;
        $obj->title = $title;
        $obj->save();
    }

}
