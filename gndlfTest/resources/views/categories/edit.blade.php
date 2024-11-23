@extends('dashboard')

@section('content')
<h2>Редактировать категорию</h2>
<form id="edit-category-form" action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}" placeholder="Название категории" required>
    <button type="submit" id="edit-category-button" disabled>Обновить</button>
</form>

<style>
    #edit-category-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #edit-category-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('edit-category-form');
        const button = document.getElementById('edit-category-button');
        const input = form.querySelector('input[name="name"]');

        function checkFormValidity() {
            button.disabled = !input.value.trim();
        }

        input.addEventListener('input', checkFormValidity);

        form.addEventListener('submit', function(event) {
            if (button.disabled) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection