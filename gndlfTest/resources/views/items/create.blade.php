@extends('dashboard')

@section('content')
<h2>Добавить товар</h2>
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Название">
    <textarea name="description" placeholder="Описание"></textarea>
    <input type="number" name="price" placeholder="Цена">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Создать</button>
</form>
@endsection