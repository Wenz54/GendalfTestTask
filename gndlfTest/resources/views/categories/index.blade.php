@extends('dashboard')

@section('content')
<h2>Категории</h2>
<a href="{{ route('categories.create') }}">Добавить категорию</a>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td class="actions">
                <a href="{{ route('categories.edit', $category->id) }}">Редактировать</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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