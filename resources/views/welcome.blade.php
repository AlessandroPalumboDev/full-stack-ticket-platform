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