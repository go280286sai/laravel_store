<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Main_category;
use App\Models\Product;
use App\Models\Product_gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function view(string $id)
    {
        $product = Product::getView($id);
        $images = Product_gallery::get($id);
        if (count($product) == 0) {
            abort(404);
        }
        return view('products.product', [
            'product' => $product[0],
            'images' => $images,
            'title' => $product[0]->title,
        ]);
    }

    public function category(int $id): View
    {
        $categories = Category::find($id);
        return view('products.category', [
            'categories' => $categories
        ]);
    }

    public function parent(int $id): View
    {
        $parent = Main_category::find($id);
        return view('products.parent', [
            'parent' => $parent
        ]);
    }


}
