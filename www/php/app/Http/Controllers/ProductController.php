<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Main;
use App\Models\Main_category;
use App\Models\Product;
use App\Models\Product_gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function view(string $slug)
    {
        $product = Product::where('slug', $slug)->get();
        if (count($product) == 0) {
            abort(404);
        }
        return view('products.product', [
            'product' => $product[0],
            'lang'=>Language::getStatus()->id
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
    {   $lang = Language::getStatus()->id;
        $parent = Main::find($id);
        return view('products.parent', [
            'parent' => $parent,
            'lang' => $lang
        ]);
    }


}
