<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $lang = Language::getStatus()->id;
        if (Cache::has('sliders')) {
            $sliders = Cache::get('sliders');
        } else {
            $sliders = Slider::all();
            Cache::put('sliders', $sliders);
        }
        $products = $this->get_hits($lang,6);
        return view('main.index', compact(['sliders', 'products']));
    }

    /**
     * @param string $lang
     * @param int $limit
     * @return object
     */
    public function get_hits(string $lang, int $limit): object
    {
        return Product::join('product_descriptions', 'products.id', '=', 'product_descriptions.product_id')
            ->where('language_id', $lang)
            ->where('hit', '=', 1)
            ->orderBy('hit', 'DESC')
            ->limit($limit)
            ->get();
    }
}
