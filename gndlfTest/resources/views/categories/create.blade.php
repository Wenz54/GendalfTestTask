@extends('dashboard')

@section('content')
<h2>Добавить категорию</h2>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Название категории">
    <button type="submit">Создать</button>
</form>
@endsection