<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdGetRequest;
use App\Models\Language;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(Request $request): View
    {
        if (Session::has('wishlist')) {
            $wishlists = Session::get('wishlist');
        } else {
            $wishlists = [];
        }

        return view('products.wishlist', ['products' => $wishlists, 'lang' => Language::getStatus()->id]);
    }

    public function get(): int
    {
        if (Session::has('wishlist')) {
            $wishlists = Session::get('wishlist');

            return count($wishlists);
        }

        return 0;
    }

    public function add(Request $request): bool
    {
        $id = $request->input('id');
        Wishlist::add($id);

        return true;
    }

    public function remove(IdGetRequest $request): RedirectResponse
    {
        $id = $request->input('id');
        Wishlist::remove($id);

        return redirect()->back();
    }
}
