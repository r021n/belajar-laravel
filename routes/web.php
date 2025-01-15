<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    $movies = [
        [
            "title" => "Oppenheimer",
            "description" => "A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bombs that brought an end to World War II.",
            "release_date" => "2023-07-21",
            "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon"],
            "genres" => ["Drama", "History", "Thriller"],
            "image" => "https://m.media-amazon.com/images/M/MV5BN2JkMDc5MGQtZjg3YS00NmFiLWIyZmQtZTJmNTM5MjVmYTQ4XkEyXkFqcGc@._V1_.jpg",
        ],
        [
            "title" => "Barbie",
            "description" => "Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.",
            "release_date" => "2023-07-19",
            "cast" => ["Margot Robbie", "Ryan Gosling", "Issa Rae"],
            "genres" => ["Adventure", "Comedy", "Fantasy"],
            "image" => "https://m.media-amazon.com/images/M/MV5BYjI3NDU0ZGYtYjA2YS00Y2RlLTgwZDAtYTE2YTM5ZjE1M2JlXkEyXkFqcGc@._V1_.jpg",
        ],
    ];
    return view('welcome', ["movies" => $movies]);
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
