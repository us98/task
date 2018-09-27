<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;

class SiteController extends Controller
{
    public function getLogout()
    {
        auth()->logout();

        return redirect()
                    ->route('login')
                    ->withMessages('<div class="alert alert-success">Anda berhasil keluar dari akun</div>');
    }

    public function getIndex()
    {
        $products = Product::select([
                            'id',
                            'product_name',
                            'product_code',
                            'description',
                            'photos',
                            'price'
                        ])
                        ->take(4)
                        ->get();

        return view('Frontend.pages.site.index',[
            'pageTitle' => 'Selamat Datang di Tokoku',
            'products' => $products
        ]);
    }

    public function getProductShow($id)
    {
        $product = Product::select([
                            'id',
                            'product_name',
                            'product_code',
                            'description',
                            'photos',
                            'price',
                        ])
                        ->where([
                            'id'=>$id
                        ])
                        ->firstOrFail();

        return view('Frontend.pages.product.show',[
            'pageTitle' => $product->product_name,
            'product' => $product
        ]);
    }
}
