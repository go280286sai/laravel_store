<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function getList()
    {
        return Category::where('language_id', Language::getStatus()->id)->get();
    }
}
