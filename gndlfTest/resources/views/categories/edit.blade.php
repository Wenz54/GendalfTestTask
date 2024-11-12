@extends('dashboard')

@section('content')
<h2>Редактировать категорию</h2>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}" placeholder="Название категории">
    <button type="submit">Обновить</button>
</form>
@endsection