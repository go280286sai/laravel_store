<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Main_category;
use App\Models\Product;
use App\Models\Product_gallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(string $id)
    {
        $product = Product::getView($id);
        $images = Product_gallery::get($id);
        if(count($product) == 0){
            abort(404);
        }
        return view('products.product', [
            'product' => $product[0],
            'images' => $images,
            'title' => $product[0]->title,
        ]);
    }

    public function category(int $id)
    {
        $categories = Category::find($id);
//        dd($category->products[0]->product_description);
        return view('products.category', [
            'categories' => $categories
        ]);
}


}
