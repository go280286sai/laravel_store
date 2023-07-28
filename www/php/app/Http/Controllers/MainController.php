<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Get main page
     * @return View
     * @author Aleksander Storchak <go280286sai@gmail.com>
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
     * Get a set of records by hits
     * @param int $limit
     * @return object
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function get_hits(int $limit): object
    {
        if (Cache::has('hit')) {
            return Cache::get('hit');
        } else {
            $hit = Product::where('hit', '>', 0)
                ->orderBy('hit', 'DESC')
                ->limit($limit)
                ->get();
            Cache::put('hit', $hit);
        }
        return $hit;
    }
}
