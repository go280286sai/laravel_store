<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function mains(): BelongsTo
    {
        return $this->belongsTo(Main::class);
    }

    /**
     * @return HasMany
     */
    public function category_descriptions(): HasMany
    {
        return $this->hasMany(Category_description::class);
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    /**
     * @return Collection
     */
    public static function getList(): Collection
    {
        return Main_category::where('language_id', Language::getStatus()->id)->get();
    }

    /**
     * @param int $id
     * @return object
     */
    public static function get(int $id): object
    {
        return self::find($id);
    }
}
