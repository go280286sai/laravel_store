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

    public static function get_main(int $id): array
    {
        $obj = self::find($id);
        $arr = array();
        $arr['main_id'] = $obj->main_id;
        foreach ($obj->category_descriptions as $item) {
            $arr['title_category'] = $item->title;
        }
        return $arr;
    }
    public static function get_path_category(int $id): array
    {
        $path = array();
        $path['category_id'] = $id;
        $category = Category::get_main($id);
        $path['main_id'] = $category['main_id'];
        $path['title_category'] = $category['title_category'];
        $path['title_main'] = Main::get_title($category['main_id']);
        return $path;
    }
}
