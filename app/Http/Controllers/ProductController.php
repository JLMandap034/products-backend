<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $query = Product::with('category');
        
        if (isset($data['search']) && $data['search']) {
            $query = $query->where('name', 'like', '%'.$data['search'].'%');
            $query = $query->orWhere('description', 'like', '%'.$data['search'].'%');
        }

        if (isset($data['category_id']) && $data['category_id']) {
            $query = $query->where('category_id', $data['category_id']);
        }

        return $query->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
    
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
    
        $product->update($request->all());
    
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
