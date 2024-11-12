<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория успешно обновлена');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена');
    }

    // Метод для получения списка категорий через API с постраничной навигацией
    public function apiIndex(Request $request)
    {
        $name = $request->query('name');
        $categories = Category::when($name, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(10); // 10 категорий на страницу

        return response()->json(['categories' => $categories]);
    }

    // Метод для получения информации о конкретной категории через API
    public function apiShow($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error_code' => 404, 'error_message' => 'Category not found'], 404);
        }
        return response()->json(['category' => $category]);
    }
}