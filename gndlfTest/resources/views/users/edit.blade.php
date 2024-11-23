@extends('dashboard')

@section('content')
<h2>Редактировать пользователя</h2>
<form id="edit-user-form" action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" placeholder="Имя" required>
    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email" required>
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit" id="edit-user-button" disabled>Обновить</button>
</form>

<style>
    #edit-user-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: not-allowed;
    }

    #edit-user-button:not([disabled]) {
        background-color: green;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('edit-user-form');
        const button = document.getElementById('edit-user-button');
        const inputs = form.querySelectorAll('input[name="name"], input[name="email"]');

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