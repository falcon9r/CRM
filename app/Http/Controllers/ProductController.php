<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->get();
        return response()->json($products);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Product::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        return response()->json(Product::query()->findOrFail($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        $product = Product::query()->findOrFail($id);
        $product->update($request->validated());
        return $this->MessageUpdate();
    }

    public function destroy($id)
    {
        $product = Product::query()->findOrFail($id);
        $product->update([
            'is_active' => false
        ]);
        return $this->MessageDelete();
    }
}
