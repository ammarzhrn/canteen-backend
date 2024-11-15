<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
        ->when($request->input('name'),function($query, $name){
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,heic|max:2048',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('products', $filename, 'public');

        $data = $request->all();
        $data['image'] = $filename;

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,heic|max:2048',
            'category' => 'required',
        ]);

        $data = ([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'category' => $request->category,
        ]);

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }
}
