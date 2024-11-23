@extends('dashboard')

@section('content')
<h2>Добавить товар</h2>
<form id="add-item-form" action="{{ route('items.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Название" required>
    <textarea name="description" placeholder="Описание" required></textarea>
    <input type="number" name="price" placeholder="Цена" required>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" id="add-item-button" disabled>Создать</button>
</form>

<style>
    #add-item-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #add-item-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('add-item-form');
        const button = document.getElementById('add-item-button');
        const inputs = form.querySelectorAll('input, textarea, select');

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