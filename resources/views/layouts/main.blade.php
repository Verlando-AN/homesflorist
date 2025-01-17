<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" crossorigin="anonymous">

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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p2Cp3oLMZbd1JGFq91rm6E3/qfqcPbppNtFtyA9ViIgjOAGb1wxREYz24jz5zSVN" crossorigin="anonymous"></script>

</body>
</html>
