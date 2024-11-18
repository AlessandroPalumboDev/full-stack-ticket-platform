@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row ">
            <div class="col d-flex flex-column-reverse bg-danger justify-content-center">
                <img class="" src="{{ Vite::asset('resources/img/pipistrello.jpg')}}" alt="">
                <ul>
                    <li><a href="#">prova list item e link</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Full-Stack Ticket Platform!</h1>
</body>
</html> --}}
