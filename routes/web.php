<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/disciplines', [Controller\Site::class, 'disciplines']);
Route::add(['GET', 'POST'], '/department', [Controller\Site::class, 'department']);
Route::add(['GET', 'POST'], '/employee', [Controller\Site::class, 'employee']);
Route::add(['GET', 'POST'], '/posts', [Controller\Site::class, 'posts']);
Route::add(['GET','POST'], '/search_employee', [Controller\Site::class, 'search_employee']);
//Route::add(['GET','POST'], '/employee_department', [Controller\Site::class, 'employee_department']);

