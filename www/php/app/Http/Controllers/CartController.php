<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product;
use Exception;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $carts = Session::get('cart');
        return view('carts.cart', ['carts' => $carts]);
    }

    public function getAll()
    {   Product::translate();
        return Response::json(Session::get('cart'));
    }

    public function add(Request $request): JsonResponse|RedirectResponse
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);
        $id = $request->input('id');
        $qty = $request->input('qty');
        $product = Product::getProducts($id, $qty);
        if (!$product) {
            throw new Exception('Product not found');
        }
        if($request->ajax()) {
            return Response::json(['status'=>true]);
        }
        return redirect()->back();
    }

    public function remove(Request $request): JsonResponse|RedirectResponse
    {
        $id = $request->input('id');
        Product::removeCart($id);
        if ($request->ajax()) {
            return Response::json(['status'=>true]);
        }
        return redirect()->back();
    }

    public function editAmount(Request $request): JsonResponse|RedirectResponse
    {
        $id = $request->input('id');
        $qty = $request->input('qty');
        Product::updateCart($id, $qty);
        if ($request->ajax()) {
            return Response::json(['status'=>true]);
        }
        return redirect()->back();
    }
}
