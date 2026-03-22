<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;


Route::get('/', [PublicController::class, 'Home'])->name('home');

Route::resource('articles', ArticleController::class)->only([
	'create',
	'store',
	'show',
	'edit',
	'update'
]);

Route::resource('tags', TagController::class)->only([
	'create',
	'store',
]);