<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(string $slug)
    {
        $lang = Language::getStatus();
        $product = Product::join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
            ->where('slug', $slug)
            ->where('language_id', $lang->id)->first();
        return view('products.product', ['product' => $product]);
    }



}
