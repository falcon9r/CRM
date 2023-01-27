<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get();
        return response()->json($categories);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::query()->create($data);
        return $this->MessageAdd();
    }

    public function show($id)
    {
        $category = Category::query()->findOrFail($id);
        return response()->json($category);
    }

    public function update(UpdateRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->validated());
        return $this->MessageUpdate();
    }

    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        $category->update([
            'is_active' => false
        ]);
        return $this->MessageDelete();
    }
}
