<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_gallery extends Model
{
    use HasFactory;

    /**
     * @param int $id
     * @param string $img
     * @return void
     */
    public static function add(int $id, string $img): void
    {
        $obj = new self();
        $obj->product_id = $id;
        $obj->img = $img;
        $obj->save();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function get(int $id): mixed
    {
    return self::where('product_id', $id)->get();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
