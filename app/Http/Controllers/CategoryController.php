<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_delete', false)->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('is_delete', false)->get();
        return view('category.create', compact('categories'));
    }

    private function validateParentCategory($parentId, $categoryId = null)
    {
        if ($parentId) {
            $parentCategory = Category::find($parentId);

            if (!$parentCategory) {
                return false;
            }

            $currentCategory = $categoryId ? Category::find($categoryId) : null;

            while ($parentCategory) {
                if ($currentCategory && $parentCategory->id === $currentCategory->id) {
                    return false;
                }
                $parentCategory = $parentCategory->parent;
            }
        }

        return true;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        if (!$this->validateParentCategory($request->parent_id)) {
            return redirect()->back()->withErrors(['parent_id' => 'Invalid parent category selected.'])->with('toast_error', 'Circular parent category detected!');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $categories = Category::where('is_delete', false)->where('id', '!=', $category->id)->get();
        return view('category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'parent_id' => 'nullable|exists:categories,id|not_in:' . $category->id,
            'is_active' => 'boolean',
        ]);

        if (!$this->validateParentCategory($request->parent_id, $category->id)) {
            return redirect()->back()->withErrors(['parent_id' => 'Invalid parent category selected.'])->with('toast_error', 'Circular parent category detected!');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->update(['is_delete' => true]);
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
