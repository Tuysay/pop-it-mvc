<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Admin::class, 'signup'])
    ->middleware('auth','admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/add_disciplines', [Controller\Emp::class, 'add_disciplines']);
Route::add(['GET', 'POST'], '/add_department', [Controller\Emp::class, 'add_department']);
Route::add(['GET', 'POST'], '/add_employee', [Controller\Emp::class, 'add_employee']);
Route::add(['GET', 'POST'], '/add_posts', [Controller\Emp::class, 'add_posts']);
Route::add(['GET','POST'], '/profile', [Controller\Emp::class, 'profile']);
Route::add(['GET','POST'], '/employee_search', [Controller\Emp::class, 'employee_search']);
Route::add(['GET','POST'], '/disciplines_swap', [Controller\Emp::class, 'disciplines_swap']);
Route::add(['GET','POST'], '/add_admin_employee', [Controller\Site::class, 'add_admin_employee']);




