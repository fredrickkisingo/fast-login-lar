<!DOCTYPE html>
<html lang ="{{str_replace('_','-',app()->getLocale()) }}">
    <head>
    <meta charset= "UTF-8">
    <meta name ="viewport" content ="width=device-width,initial-scale=1.0">
    <title>Fast Authentication Application</title>
    <link rel="stylesheet"  href="{{asset('css/app.css')}}">
    <link rel="stylesheet"  href="{{asset('css/custom.css')}}">

    <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <header>
        </header>

            <div class="container">
                @include('layouts.messages')
            </div>
        <main>
            @yield('content')
        </main>

        <footer>
        </footer>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>

