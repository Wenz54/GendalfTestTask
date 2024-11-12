@extends('dashboard')

@section('content')
<h2>Товары</h2>
<a href="{{ route('items.create') }}">Добавить товар</a>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->category->name }}</td>
            <td class="actions">
                <a href="{{ route('items.edit', $item->id) }}">Редактировать</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
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