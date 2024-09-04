<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return Inertia::render('Test'); // This will get component Test.jsx from the resources/js/Pages/Test.jsx
});
