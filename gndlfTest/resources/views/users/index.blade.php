@extends('dashboard')

@section('content')
<h2>Пользователи</h2>
<a href="{{ route('users.create') }}">Добавить пользователя</a>
<table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="actions">
                <a href="{{ route('users.edit', $user->id) }}">Редактировать</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; padding:0; color:#007bff; cursor:pointer;">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection