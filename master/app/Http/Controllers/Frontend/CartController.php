<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::join('products','products.id','=','cart.product_id')
                        ->select([
                            'products.product_name',
                            'products.product_code',
                            'products.photos',
                            'products.price',
                            'cart.quantity',
                            'cart.id'
                        ])
                        ->where([
                            'cart.user_id' => auth()->user()->id
                        ])->get();

        return view('Frontend.pages.cart.index',[
            'pageTitle' => 'My Cart',
            'carts' => $carts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty'=>'required|numeric'
        ]);

        $product = Product::select([
                            'id',
                            'price'
                        ])
                        ->where([
                            'id'=>$request->product_id
                        ])
                        ->firstOrfail();

        try {
            $cart = Cart::firstOrCreate([
                            'user_id'=>auth()->user()->id,
                            'product_id'=>$product->id
                        ]);
            $cart->price = $product->price;
            $cart->quantity = $cart->quantity + $request->qty;
            $cart->save();

            return redirect()
                    ->route('frontend.carts.index')
                    ->withMessages('<div class="alert alert-success">Produk berhasil dimasukkan kedalam keranjang</div>');
        }catch(Exception $e) {
            abort(500);   
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $cart = Cart::find($id);
            $cart->delete();

            return redirect()
                    ->route('frontend.carts.index')
                    ->withMessages('<div class="alert alert-success">Produk telah dihapus dari keranjang</div>');
        }catch(Exception $e) {
            abort(500);   
        }
    }
}
