<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $products = [
        ['id' => 1, 'name' => 'iPhone 15', 'price' => 25000000],
        ['id' => 2, 'name' => 'Samsung S24', 'price' => 22000000],
    ];

    public function index()
    {
        // $products = session()->get('products', self::$products);
        $products = Product::All();
        $title = "Product list";

        return view('product.index', compact('products', 'title'));
    }

    public function detail($id = 123)
    {
        // $products = session()->get('products', self::$products);
        // $product = collect($products)
        //     ->firstWhere('id', $id);

        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        return view('product.detail', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product deleted successfully!');
    }

    public function add()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        // $products = session()->get('products', self::$products);

        // $products[] = [
        //     'id' => count($products) + 1,
        //     'name' => $request->name,
        //     'price' => $request->price,
        // ];

        //session()->put('products', $products);

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        // ]);

        $product->save();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product added successfully!');
    }
}

