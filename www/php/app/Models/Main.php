<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Main extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function main_descriptions(): HasMany
    {
        return $this->hasMany(Main_description::class);
    }

    /**
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public static function list()
    {
        if(Cache::has('list')){
            return Cache::get('list');
        } else {
            $list = self::all();
            Cache::put('list', $list);
        }
        return $list;
    }

    public static function get_title(int $id)
    {
        $obj = self::find($id);
        foreach ($obj->main_descriptions as $main_description) {
            if($main_description->language_id == Language::getStatus()->id){
                return $main_description->title;
            }
        }
    }
}
