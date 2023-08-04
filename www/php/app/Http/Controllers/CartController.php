<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Get all entries from cart given language selection
     *
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function getAll(): JsonResponse
    {
        Product::translate();

        return Response::json(Session::get('cart'));
    }

    /**
     * Add to cart
     *
     * @throws Exception
     *
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function add(AddUpdateRequest $request): JsonResponse
    {
        $id = $request->input('id');
        $qty = $request->input('qty');
        $product = Product::add_to_cart($id, $qty);
        if (! $product) {
            throw new Exception('Product not found');
        }

        return Response::json(['status' => true]);
    }

    /**
     * Remove from cart
     *
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function remove(Request $request): JsonResponse
    {
        $id = $request->input('id');
        Product::removeCart($id);

        return Response::json(['status' => true]);
    }

    /**
     * Update cart
     *
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function update(AddUpdateRequest $request): JsonResponse
    {
        $id = $request->input('id');
        $qty = $request->input('qty');
        Product::updateCart($id, $qty);

        return Response::json(['status' => true]);

    }

    /**
     * Remove all items from cart
     * Remove session cart
     *
     * @author Aleksander Storchak <go280286sai@gmail.com>
     */
    public function clear(): RedirectResponse
    {
        Product::clear();

        return redirect()->route('home');
    }

    /**
     * @return View
     */
    public function store(): View
    {
        return view('products.cart');
    }

    public function create()
    {
        //pass
    }
}
