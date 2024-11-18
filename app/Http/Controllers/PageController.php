<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home'); // Assicurati che esista una vista chiamata "home.blade.php"
    }
}
