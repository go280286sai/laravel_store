<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_description extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public static function set_update(array $data, int $id): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $obj = self::all()->where('product_id', $id)->where('language_id', $i)->first();
            $obj->title = $data['title_'.$i];
            $obj->description = $data['description_'.$i];
            $obj->keywords = $data['keywords_'.$i];
            $obj->content = $data['content_'.$i];
            $obj->exerpt = $data['exerpt_'.$i];
            $obj->save();
        }
    }

    public static function add(array $data, int $id): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $obj = new self();
            $obj->product_id = $id;
            $obj->language_id = $i;
            $obj->title = $data['title_'.$i];
            $obj->description = $data['description_'.$i];
            $obj->keywords = $data['keywords_'.$i];
            $obj->content = $data['content_'.$i];
            $obj->exerpt = $data['exerpt_'.$i];
            $obj->save();
        }
    }
}
