<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\View;

class MovieController extends Controller implements HasMiddleware
{
    //

    private $movies = [];

    public function __construct(){
        $this->movies = [
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
    }

    public static function  middleware() {
        // return [
        //     'isAuth',
        //     new Middleware('isMember', only: ['show']) ,
        // ];
    }

    public function index(){
        $movies = $this->movies;
        return view('movies.index', compact('movies'))->with([
            'titlePage' => 'Movie List',
        ]);
    }

    public function show($id){
        // return $this->movies[$id];
        $movie = $this->movies[$id];
        return view('movies.show', ['movie' => $movie, 'movieId' => $id]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'description' => 'required|min:5',
        ]);

        $newMovie = [
            "title" => $request["title"],
            "description" => $request["description"],
            "release_date" => $request["release_date"],
            "cast" => explode(",", $request["cast"]),
            "genres" => explode(",", $request["genres"]),
            "image" => $request["image"],
        ];

        $this->movies[] = $newMovie;

        return $this->index();
    }

    public function edit($id){
        $movie = $this->movies[$id];
        $movie['cast'] = implode(',', $movie['cast']);
        $movie['genres'] = implode(',', $movie['genres']);
        return view('movies.edit', ['movie' => $movie, 'movieId' => $id]);
    }

    public function update(Request $request, $id){

        $this->movies[$id]['title'] = $request['title'];
        $this->movies[$id]['description'] = $request['description'];
        $this->movies[$id]['release_date'] = $request['release_date'];
        $this->movies[$id]['cast'] = explode(',', $request['cast']);
        $this->movies[$id]['genres'] = explode(',', $request['genres']);
        $this->movies[$id]['image'] = $request['image'];

        return $this->show($id);
    }

    public function destroy($id){
        unset($this->movies[$id]);

        return $this->index();
    }

    public function create(){
        return view('movies.create');
    }
};
