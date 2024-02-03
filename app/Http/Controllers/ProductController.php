<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variation;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $variations = Variation::all();
        return view('products.index', ['products' => $products, 'variations' => $variations]);
    }

    public function getallproducts() {
        $products = Product::all();

        return response()
        ->json($products, 200, [], JSON_PRETTY_PRINT)
        ->header('Content-Type', 'application/json');

        // return view('products.getallproducts', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        // dd($request->file());

        // $data = $request->validate([
        //     'title' => 'required',
        //     'sku' => 'required|numeric',
        //     'description' => 'nullable',
        //     'price' => 'required|decimal:0,2',
        //     'saleprice' => 'required|decimal:0,2',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $request->validate([
            'title' => 'required',
            'sku' => 'required|numeric',
            'description' => 'nullable',
            'price' => 'required|decimal:0,2',
            'saleprice' => 'required|decimal:0,2',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null;
        }

        Product::create([
            'title' => $request->input('title'),
            'sku' => $request->input('sku'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'saleprice' => $request->input('saleprice'),
            'image' => $imagePath,
        ]);

        // $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }

    public function edit(Product $product) {

        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {

        $data = $request->validate([
            'title' => 'required',
            'sku' => 'required|numeric',
            'description' => 'nullable',
            'price' => 'required|decimal:0,2',
            'saleprice' => 'required|decimal:0,2',
            'image' => 'required',
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated');
    }


    public function delete(Product $product) {

        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product deleted!');

    }




    /* variations functions */

    public function createvariation() {
        return view('products.createvariation');
    }

    public function storevariation(Request $request) {

        $data = $request->validate([
            'productid' => 'required',
            'name' => 'required',
            'sku' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'saleprice' => 'required|decimal:0,2',
            'kleur' => 'required',
            'maat' => 'required',
            'extraoption' => 'nullable',
            'price_eo' => 'decimal:0,2',
        ]);

        $newVariation = Variation::create($data);

        return redirect(route('product.index'));
    }

    public function editvariation(Varation $varation) {

        return view('variation.editvariation', ['varation' => $varation]);
    }

    public function deletevariation(Varation $varation) {

        $varation->delete();

        return redirect(route('product.index'))->with('success', 'Product deleted!');

    }

    public function getallvariations($variation) {
        // $variation = Variation::all();

        $productid = $variation; // Replace 1 with the actual productid you're interested in

        $variations = Variation::where('productid', $productid)->get();

        return response()
        ->json($variations, 200, [], JSON_PRETTY_PRINT)
        ->header('Content-Type', 'application/json');

        // return view('products.getallproducts', ['products' => $products]);
    }

}
