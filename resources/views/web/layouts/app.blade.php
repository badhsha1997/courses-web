<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    @stack('css')
</head>
<body>
<div class="container py-3">
    <header>
        <div class="pb-3 mb-4 border-bottom">
            <a href="{{ url('/') }}" class="text-dark text-decoration-none">
                <h1 class="h3">{{ config('app.name') }}</h1>
            </a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@stack('js')
</body>
</html>
