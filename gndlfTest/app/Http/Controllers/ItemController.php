<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Это отображает товарчики
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Это открывает форму создания
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    // Это сохраняет
    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Товар успешно добавлен');
    }

    // Вот это отображает форму редактирования
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    // Вот это обновляет товар админпанельке
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Товар успешно обновлен');
    }

    // Вот это удаляет товар админпанельке
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Товар успешно удален');
    }

    // Прикольчик для получения списка товаров через API с навигацией
    public function apiIndex(Request $request)
    {
        $name = $request->query('name');
        $items = Item::when($name, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(10); // 10 товаров на страницу

        return response()->json(['items' => $items]);
    }

    // Штука для получения инфы о конкретном товаре через API
    public function apiShow($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['error_code' => 404, 'error_message' => 'Item not found'], 404);
        }
        return response()->json(['item' => $item]);
    }
}