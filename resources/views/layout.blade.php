<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap.css') }}">
    <style>
        #quando-principal{
            margin-top: 4em;
            border: 1px solid black;
            border-radius: 2em;
            background-color: lightblue;
            min-height: 40em;
            padding: 3em;
        }
    </style>
</head>
<body>
    <header>
        @component('navbar')
        @endcomponent
    </header>
    <main>
        <div class="container">
        <br><br>
            <h4 style="text-align: center">@yield('titulo')</h4>
            <div id="quando-principal">
                @yield('conteudo')
            </div>
        </div>
    </main>
    <footer>
        <script type="text/javascript" src="{{ asset('vendor/jquery-3.3.1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('main.js') }}"></script>
    </footer>
</body>
</html>