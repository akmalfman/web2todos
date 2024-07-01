<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-3">
        <h1>Ini Dashboard</h1>

        @if (Auth::check())
            <h1>Welcome, {{ Auth::user()->name }}</h1>

            @if (Auth::user()->group == 'user')
                <a href="todo">Todo</a>
            @endif

            <a href="/user/logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="/user/logout" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <h1>Welcome, Guest</h1>
            <a href="/user/login">Login</a>
            <a href="/user/register">Register</a>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
