<?php

use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stagiaire',StagiaireController::class);
