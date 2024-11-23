@extends('dashboard')

@section('content')
<h2>Добавить пользователя</h2>
<form id="add-user-form" action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Имя" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit" id="add-user-button" disabled>Создать</button>
</form>

<style>
    #add-user-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #add-user-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('add-user-form');
        const button = document.getElementById('add-user-button');
        const inputs = form.querySelectorAll('input');

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