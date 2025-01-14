<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/movie', function(){
    return view('movies.index');
});

Route::group([
    'prefix' => 'movie',
    'as' => 'movie.'
], function() {

    Route::get('/', [MovieController::class, 'index'])->name('index');
    Route::get('/create', [MovieController::class, 'create'])->name('create');
    Route::get('/{id}', [MovieController::class, 'show'])->name('show');
    Route::post('/', [MovieController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MovieController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MovieController::class, 'update'])->name('update');
    // Route::patch('/{id}', [MovieController::class, 'update']);
    Route::delete('/{id}', [MovieController::class, 'destroy'])->name('destroy');

});

Route::get('/pricing', function(){
    return 'tobe a membership';
});

Route::get('/login', function(){
    return 'Login Page';
})->name('/login');

Route::post('/request', function(Request $request){
    return response('ok')->header('content-type', 'text/plain');
});
