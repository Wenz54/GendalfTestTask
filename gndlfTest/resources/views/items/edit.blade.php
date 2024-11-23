@extends('dashboard')

@section('content')
<h2>Редактировать товар</h2>
<form id="edit-item-form" action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $item->name }}" placeholder="Название" required>
    <textarea name="description" placeholder="Описание" required>{{ $item->description }}</textarea>
    <input type="number" name="price" value="{{ $item->price }}" placeholder="Цена" required>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" id="edit-item-button" disabled>Обновить</button>
</form>

<style>
    #edit-item-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #edit-item-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('edit-item-form');
        const button = document.getElementById('edit-item-button');
        const inputs = form.querySelectorAll('input[name="name"], textarea[name="description"], input[name="price"], select[name="category_id"]');

        function checkFormValidity() {
            let isValid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                }
            });
            button.disabled = !isValid;
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkFormValidity);
        });

        form.addEventListener('submit', function(event) {
            if (button.disabled) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection