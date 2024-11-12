<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Административная панель</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                width: 80%;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            ul {
                list-style: none;
                padding: 0;
                display: flex;
                justify-content: center;
            }

            ul li {
                margin: 0 10px;
            }

            ul li a {
                text-decoration: none;
                color: #333;
                font-weight: bold;
            }

            ul li a:hover {
                color: #007bff;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table,
            th,
            td {
                border: 1px solid #ddd;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #007bff;
                color: #fff;
            }

            .actions {
                display: flex;
                justify-content: space-around;
            }

            .actions a {
                text-decoration: none;
                color: #007bff;
            }

            .actions a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Административная панель</h1>
            <ul>
                <li><a href="{{ route('items.index') }}">Товары</a></li>
                <li><a href="{{ route('categories.index') }}">Категории</a></li>
                <li><a href="{{ route('users.index') }}">Пользователи</a></li>
            </ul>
            @yield('content')
        </div>
    </body>

    </html>
</x-app-layout>
