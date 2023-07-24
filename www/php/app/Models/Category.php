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
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return BelongsToMany
     */
    public function main_categories(): BelongsTo
    {
        return $this->belongsTo(Main_category::class, 'main_category_id', 'id');
    }

    /**
     * @return Collection
     */
    public static function getList(): Collection
    {
        return Main_category::all();
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
