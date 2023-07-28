<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Main;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Get selected product
     * @param string $slug
     * @return View
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function view(string $slug): View
    {
        $product = Product::where('slug', $slug)->first();
        if ($product == null) {
            abort(404);
        }
        $path = Product::get_path_product($product->id);
        return view('products.product', [
            'product' => $product,
            'lang'=>Language::getStatus()->id,
            'path'=> $path
        ]);
    }

    /**
     * Get selected category
     * @param int $id
     * @return View
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function category(int $id): View
    {
        $categories = Category::find($id);
        $path = Category::get_path_category($categories->id);
        return view('products.category', [
            'categories' => $categories,
            'path' => $path
        ]);
    }

    /**
     * Get main category
     * @param int $id
     * @return View
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function parent(int $id): View
    {   $lang = Language::getStatus()->id;
        $parent = Main::find($id);
        return view('products.parent', [
            'parent' => $parent,
            'lang' => $lang
        ]);
    }
}
