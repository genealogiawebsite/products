<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/products')
    ->as('products.')
    ->group(function () {
        require 'app/products.php';
        require 'app/pictures.php';
    });
