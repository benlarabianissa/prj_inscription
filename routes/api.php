<?php
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('users', [UserController::class, 'store']); // Créer un utilisateur
Route::get('users', [UserController::class, 'index']); // Récupérer tous les utilisateurs
Route::get('users/{id}', [UserController::class, 'show']); // Récupérer un utilisateur par ID
Route::put('users/{id}', [UserController::class, 'update']); // Mettre à jour un utilisateur
Route::delete('users/{id}', [UserController::class, 'destroy']); // Supprimer un utilisateur
