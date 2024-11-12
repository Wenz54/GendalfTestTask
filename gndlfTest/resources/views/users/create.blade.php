@extends('dashboard')

@section('content')
<h2>Добавить пользователя</h2>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Имя">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Создать</button>
</form>
@endsection