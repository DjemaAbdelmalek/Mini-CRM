<?php

use App\Livewire\ClientComponent;
use App\Livewire\RoleComponent;
use App\Livewire\User;
use App\Livewire\ZoneComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles',RoleComponent::class)->name('roles');
Route::get('/users',User::class)->name('users');
Route::get('/clients',ClientComponent::class)->name('clients');
Route::get('/zones',ZoneComponent::class)->name('zones');
