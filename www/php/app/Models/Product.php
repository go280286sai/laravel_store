<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function product_gallery(): HasMany
    {
        return $this->hasMany(Product_gallery::class);
    }

    public function product_descriptions(): HasMany
    {
        return $this->hasMany(Product_description::class);
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function add_to_cart($id, $qty): string
    {
        $is_product = Product::find($id);
        $amount = $is_product->amount;
        $amount < $qty ? $qty = $amount : $qty;
        if (Session::has('cart') && Session::get('cart') != []) {
            $products = Session::get('cart');
            foreach ($products as $product) {
                if ($product->id == $is_product->id) {
                    (($product->qty + $qty) <= $amount) ? $product->qty += $qty : $product->qty = $amount;
                    Session::put('cart', $products);

                    return 'Success';
                }
            }
            $is_product->qty = $qty;
            $products[] = $is_product;
            Session::put('cart', $products);

            return 'Success';
        } else {
            $products = [];
            $is_product->qty = $qty;
            $products[] = $is_product;
            Session::put('cart', $products);
        }

        return 'Success';
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
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
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function updateCart(int $id, int $qty): void
    {
        $products = Session::get('cart');

        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $is_product = Product::find($id);
                $amount = $is_product->amount;
                $amount < $qty ? $qty = $amount : $qty;
                $product['qty'] = $qty;
            }
        }
        Session::put('cart', $products);
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
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

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function get_category(int $id): array
    {
        $obj = self::find($id);
        $arr = [];
        $arr['category_id'] = $obj->category_id;
        foreach ($obj->product_descriptions as $product) {
            if ($product->language_id == Language::getStatus()->id) {
                $arr['title_product'] = $product->title;
            }
        }

        return $arr;
    }

    /**
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function get_path_product(int $id): array
    {
        $path = [];
        $path['product_id'] = $id;
        $products = Product::get_category($id);
        $path['title_product'] = $products['title_product'];
        $path['category_id'] = $products['category_id'];
        $category = Category::get_main($products['category_id']);
        $path['main_id'] = $category['main_id'];
        $path['title_category'] = $category['title_category'];
        $path['title_main'] = Main::get_title($category['main_id']);

        return $path;
    }

    /**
     * @return void
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public static function clear(): void
    {
        Session::remove('cart');
    }
}
