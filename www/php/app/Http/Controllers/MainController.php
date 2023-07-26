<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product;
use App\Models\Product_description;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $lang = Language::getStatus()->id;
        if (Cache::has('sliders')) {
            $sliders = Cache::get('sliders');
        } else {
            $sliders = Slider::all();
            Cache::put('sliders', $sliders);
        }
        $products = $this->get_hits(6);
        return view('main.index', compact(['sliders', 'products', 'lang']));
    }

    /**
     * @param string $lang
     * @param int $limit
     * @return object
     */
    public function get_hits(int $limit): object
    {
//        return Product::join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
//            ->where('language_id', $lang)
//            ->where('hit', '=', 1)
//            ->orderBy('hit', 'DESC')
//            ->limit($limit)
//            ->get();
        if(Cache::has('hit')){
            return Cache::get('hit');
        } else{
           $hit = Product::where('hit', '>', 0)
                ->orderBy('hit', 'DESC')
                ->limit($limit)
                ->get();
            Cache::put('hit', $hit);
        }
        return $hit;
    }
}
