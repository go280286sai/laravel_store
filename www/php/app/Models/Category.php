<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function mains(): BelongsTo
    {
        return $this->belongsTo(Main::class);
    }

    public function category_descriptions(): HasMany
    {
        return $this->hasMany(Category_description::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function get(int $id): object
    {
        return self::find($id);
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function get_main(int $id): array
    {
        $obj = self::find($id);
        $arr = [];
        $arr['main_id'] = $obj->main_id;
        foreach ($obj->category_descriptions as $item) {
            $arr['title_category'] = $item->title;
        }

        return $arr;
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function get_path_category(int $id): array
    {
        $path = [];
        $path['category_id'] = $id;
        $category = Category::get_main($id);
        $path['main_id'] = $category['main_id'];
        $path['title_category'] = $category['title_category'];
        $path['title_main'] = Main::get_title($category['main_id']);

        return $path;
    }

    public static function remove(int $id)
    {
        self::find($id)->delete();
    }
    public static function add(array $data): void
    {
        $obj = new self();
        $obj->main_id = $data['main'];
        $obj->save();
        $data['category_id'] = $obj->id;
        Category_description::add($data);
    }

    public static function set_update(int $id, int $value)
    {
        $obj = self::find($id);
        $obj->main_id = $value;
        $obj->save();
    }
}
