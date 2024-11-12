@extends('dashboard')

@section('content')
<h2>Редактировать товар</h2>
<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $item->name }}" placeholder="Название">
    <textarea name="description" placeholder="Описание">{{ $item->description }}</textarea>
    <input type="number" name="price" value="{{ $item->price }}" placeholder="Цена">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Обновить</button>
</form>
@endsection