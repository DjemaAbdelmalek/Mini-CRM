<?php

use App\Livewire\RoleComponent;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles',RoleComponent::class)->name('roles');
Route::get('/users',User::class)->name('users');
