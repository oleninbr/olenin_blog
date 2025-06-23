<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => BlogCategory::select('id', 'parent_id', 'title', 'slug')->get()
        ]);
    }

    public function store(Request $request)
    {
        $category = BlogCategory::create($request->validate([
            'title'      => 'required|string|max:255',
            'parent_id'  => 'nullable|integer|exists:blog_categories,id',
            'slug'       => 'nullable|string|max:255',
        ]));
        return response()->json(['data' => $category], 201);
    }

    public function show($id)
    {
        return response()->json([
            'data' => BlogCategory::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->update($request->validate([
            'title'      => 'sometimes|required|string|max:255',
            'parent_id'  => 'nullable|integer|exists:blog_categories,id',
            'slug'       => 'nullable|string|max:255',
        ]));
        return response()->json(['data' => $category]);
    }

    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->delete();
        return response()->json(['message' => 'deleted']);
    }
}
