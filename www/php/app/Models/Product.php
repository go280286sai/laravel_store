<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function product_description(): HasMany
    {
        return $this->hasMany(Product_description::class);
    }

    /**
     * @param int $id
     * @param int $qty
     * @return bool
     */
    public static function getProducts(int $id, int $qty): bool
    {
        $product = self::join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
            ->select('products.id', 'title', 'price', 'slug', 'img', 'amount')
            ->where('products.id', $id)
            ->where('language_id', Language::getStatus()->id)
            ->get();
        if ($qty > $product[0]->amount) {
            $product[0]->qty = $product[0]->amount;
        }  else {
            $product[0]->qty = $qty;
        }
        $obj = new self();
        $obj->add_to_cart($product[0]);
        return true;
    }

    public function add_to_cart(Product $product): void
    {
        if (Session::has('cart')) {
            $products = Session::get('cart');
            foreach ($products as $item) {
                if ($item->id == $product->id) {
                  self::updateCart($item->id, $item->qty + 1);
                    return;
                }
            }
        } else {
            $products = array();
        }
        $products[] = $product;
        Session::put('cart', $products);
    }

    public static function removeCart(int $id): void
    {
            $products = Session::get('cart');
            $filteredArray = array_filter($products, function ($item) use ($id) {
                return $item['id'] !== $id;
            });
            $updatedArray = array_values($filteredArray);
        Session::put('cart', $updatedArray);
    }

    public static function updateCart(int $id, int $qty): void
    {
            $products = Session::get('cart');
            foreach ($products as $item) {
                if ($item->id == $id) {
                    $item->qty = $qty;
                    Session::put('cart', $products);
                    return;
                }
            }
    }
}
