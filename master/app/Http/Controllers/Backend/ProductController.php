<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use DB;
use Image;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::select([
                        'id',
                        'product_name',
                        'product_code',
                        'description',
                        'photos',
                        'price'
                    ])
                    ->get();

        return view('Backend.pages.product.index',[
            'pageTitle' => 'Product',
            'products' => $products
        ]);
    }

    
    public function create()
    {
        return view('Backend.pages.product.create',[
            'pageTitle' => 'Insert Product',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:products,product_name,'.$request->name,
            'code' => 'required|max:30|unique:products,product_code,'.$request->code,
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric'
        ]); 

        try{
            DB::transaction(function() use($request){
                $product = new Product;
                $product->product_name = $request->name;
                $product->product_code = $request->code;
                $product->description = $request->description;
                $product->price = $request->price;

                if($request->hasFile('image') ){
                    if($request->file('image')->isValid() ){

                        $file = str_slug('Product-'.str_random(5).'-' ) . $request->file('image')->getClientOriginalName();
                        $product->photos = $file;
                        
                        $request->file('image')->move('./upload/files/img/products/',$file);
                    }
                }

                $product->save();
            });
                return back()
                    ->withMessages('<div class="alert alert-success" > Product telah ditambah </div>');
        }catch(Exception $e){
            abort(500);
        }

    }

    public function show(Product $product)
    {
        
    }

    public function edit($product)
    {
        $product = Product::select([
                        'id',
                        'product_name',
                        'product_code',
                        'description',
                        'photos',
                        'price'
                    ])
                    ->where([
                        'id' => $product
                    ])
                    ->first();

        return view('Backend.pages.product.edit',[
            'pageTitle' => 'Edit Product',
            'product' => $product
        ]);
    }

    public function update(Request $request, $product)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:30',
            'description' => 'required',
            'image' => 'image',
            'price' => 'required|numeric'
        ]); 

        try{
            DB::transaction(function() use($request,$product){
                $product = Product::find($product);
                $product->product_name = $request->name;
                $product->product_code = $request->code;
                $product->description = $request->description;
                $product->price = $request->price;

                if($request->hasFile('image') ){
                    if($request->file('image')->isValid() ){

                        $file = str_slug('Product-'.str_random(5).'-' ) . $request->file('image')->getClientOriginalName();
                        $product->photos = $file;
                        
                        $request->file('image')->move('./upload/files/img/products/',$file);
                    }
                }

                $product->save();
            });
                return back()
                    ->withMessages('<div class="alert alert-success" > Product telah diupdate </div>');
        }catch(Exception $e){
            abort(500);
        }
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();

        return back()
                ->withMessages('<div class="alert alert-danger" > Product telah dihapus </div>');
    }
}
