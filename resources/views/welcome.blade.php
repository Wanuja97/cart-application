<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brightly</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
  

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container d-flex justify-content-center align-content-center">
        <div class=" ">
            @if (Route::has('login'))
            <div class="px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-info">Home</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-warning">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>

</body>

</html>