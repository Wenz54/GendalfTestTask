@extends('dashboard')

@section('content')
<h2>Добавить категорию</h2>
<form id="add-category-form" action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Название категории" required>
    <button type="submit" id="add-category-button" disabled>Создать</button>
</form>

<style>
    #add-category-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #add-category-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('add-category-form');
        const button = document.getElementById('add-category-button');
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