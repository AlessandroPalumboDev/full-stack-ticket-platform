<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Template</title>
    {{-- <link rel="icon" href="{{ Vite::asset('resources/img/pipistrello.jpg') }}"> --}}

    @vite('resources/js/app.js')
</head>
<body>
    @include('shared.header')
    <main>

        @yield('main')

    </main>
    @include('shared.footer')

</body>
</html>