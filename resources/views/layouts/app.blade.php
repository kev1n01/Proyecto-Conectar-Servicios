<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-color: {{ config('branding.primary') }};
            --secondary-color: {{ config('branding.secondary') }};
            --success-color: {{ config('branding.success') }};
            --danger-color: {{ config('branding.danger') }};
            --warning-color: {{ config('branding.warning') }};
            --info-color: {{ config('branding.info') }};
            --light-color: {{ config('branding.light') }};
            --dark-color: {{ config('branding.dark') }};
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .navbar {
            background-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Mi Aplicación</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
