<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Your Application') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Add a favicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script> <!-- Added defer for better loading performance -->

    <style>
        body {
            position: absolute;
            top: 0 px;
            right: 0 px;
            bottom: 0 px;
            left: 0 px;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
            padding: 2rem;
            min-height: calc(100vh - 56px);
        }
    </style>
</head>
<body>

    @include('layout.anon_navbar')
    
    <div class="content">
        @yield('content')
    </div>

</body>
</html>