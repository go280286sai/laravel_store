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
    public function product_gallery(): HasMany
    {
        return $this->hasMany(Product_gallery::class);
    }

    /**
     * @return HasMany
     */
    public function product_descriptions(): HasMany
    {
        return $this->hasMany(Product_description::class);
    }

    public static function add_to_cart($id, $qty): string
    {
        $is_product = Product::find($id);
        $amount = $is_product->amount;
        $amount < $qty ? $qty = $amount : $qty;
        if (Session::has('cart') && Session::get('cart') != []) {
            $products = Session::get('cart');
            foreach ($products as $product) {
                if ($product->id == $is_product->id) {
                    (($product->qty + $qty)<=$amount)? $product->qty += $qty:$product->qty = $amount;
                    Session::put('cart', $products);
                    return "Success";
                }
            }
            $is_product->qty = $qty;
            $products[] = $is_product;
            Session::put('cart', $products);
            return "Success";
        } else {
            $products = array();
            $is_product->qty = $qty;
            $products[] = $is_product;
            Session::put('cart', $products);
        }
        return "Success";
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

    /**
     * @param int $id
     * @param int $qty
     * @return void
     */
    public static function updateCart(int $id, int $qty): void
    {
        $products = Session::get('cart');
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $product['qty'] = $qty;
            }
        }
        Session::put('cart', $products);
    }

    /**
     * @return void
     */
    public static function translate(): void
    {
        $products = self::join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
            ->select('products.id', 'title')
            ->where('language_id', Language::getStatus()->id)
            ->get();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            foreach ($cart as $item) {
                foreach ($products as $product) {
                    if ($item->id == $product->id) {
                        $item->title = $product->title;
                    }
                }
            }
            Session::put('cart', $cart);
        }
    }

//    public static function getView(int $id)
//    {
//        return Main_category::join('categories', 'categories.id', '=', 'main_categories.id')
//            ->join('products', 'products.category_id', '=', 'categories.id')
//            ->join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
//            ->select('main_categories.title as main_title', 'categories.title as category_title', 'products.id', 'product_descriptions.product_id', 'product_descriptions.title as title', 'price', 'slug', 'img', 'old_price')
//            ->where('product_descriptions.product_id', $id)
//            ->where('product_descriptions.language_id', Language::getStatus()->id)->get();
//    }
}
