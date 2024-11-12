@extends('dashboard')

@section('content')
<h2>Редактировать пользователя</h2>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" placeholder="Имя">
    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Обновить</button>
</form>
@endsection