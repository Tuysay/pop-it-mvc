<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('auth','admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/add_disciplines', [Controller\Site::class, 'add_disciplines']);
Route::add(['GET', 'POST'], '/add_department', [Controller\Site::class, 'add_department']);
Route::add(['GET', 'POST'], '/add_employee', [Controller\Site::class, 'add_employee']);
Route::add(['GET', 'POST'], '/add_posts', [Controller\Site::class, 'add_posts']);
Route::add(['GET','POST'], '/profile', [Controller\Site::class, 'profile']);
Route::add(['GET','POST'], '/employee_search', [Controller\Site::class, 'employee_search']);
Route::add(['GET','POST'], '/disciplines_swap', [Controller\Site::class, 'disciplines_swap']);
Route::add(['GET','POST'], '/add_admin_employee', [Controller\Site::class, 'add_admin_employee']);

Route::add(['GET'], '/add', [Controller\Site::class, 'add']);


