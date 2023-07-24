<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function product_description(): HasMany
    {
        return $this->hasMany(Product_description::class);
    }

    /**
     * @return object
     */
    public static function getStatus(): object
    {
        $lang = app()->getLocale();
        return self::where('code', $lang)->get()[0];
    }

}
