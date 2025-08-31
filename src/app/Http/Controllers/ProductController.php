<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Season;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('price', 'desc')->get();
        $products = Product::orderBy('price', 'asc')->get();
        $products = Product::Paginate(6);

        return view('products/index', compact('products'));
    }

    public function find()
    {
        return view('products/search', ['input' => '']);
    }

    public function search(Request $request)
    {
        $product = Product::where('name', 'LIKE', "%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'product' => $product
        ];
        return view('products/search', $param);
    }


    public function register()
    {
        return view('products/register');
    }

    public function store(ProductRequest $request)
    {
        $product = $request->only('name', 'price', 'image','description');
        Product::create($product);
        $products = Product::all();

        return view('products/index',compact('products'));
    }

    public function detail(Request $request)
    {
        $product = Product::all()->first();

        return view('products/detail', compact('product'));
    }

    public function update(ProductRequest $request)
    {
        $product = $request->only('name', 'price', 'image', 'description');
        Product::find($request->id)->update($product);
        return redirect('/products',compact('products'));
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect('/products');
    }
}
