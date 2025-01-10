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
            display: flex; /* Use flexbox for better layout */
            flex-direction: column; /* Stack children vertically */
            min-height: 100vh; /* Ensure the body takes at least full viewport height */
            margin: 0; /* Remove default margin */
        }
        .content {
            flex: 1; /* Allow content to grow and fill available space */
            padding: 2rem; /* Add padding for better spacing */
        }
    </style>
</head>
<body>

    @include('layout.user_navbar')
    
    <div class="content">
        @yield('content')
    </div>

</body>
</html>