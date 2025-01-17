<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%; 
            margin: 0; 
            padding: 0; 
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1; 
        }

        footer {
            background-color: #343a40; 
            color: white; 
            padding: 1rem; 
            width: 100%; 
            position: relative; 
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="card">
        <div class="card-body">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    @include('layouts.footer')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
