<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Пользователь успешно добавлен');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлен');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь успешно удален');
    }

    // Метод для получения списка пользователей через API с постраничной навигацией
    public function apiIndex(Request $request)
    {
        $name = $request->query('name');
        $users = User::when($name, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(10); // 10 пользователей на страницу

        return response()->json(['users' => $users]);
    }

    // Метод для получения информации о конкретном пользователе через API
    public function apiShow($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error_code' => 404, 'error_message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);
    }
}