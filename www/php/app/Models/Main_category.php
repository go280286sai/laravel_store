<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Main_category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'main_categories';

    /**
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * @param int $lang
     * @param string $title
     * @return void
     */
    public static function add(int $lang, string $title): void
    {
        $obj = new self();
        $obj->language_id = $lang;
        $obj->title = $title;
        $obj->save();
    }

}
