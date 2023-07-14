<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieClient extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $firstMovie = $movies->first();
        $category = Category::all();
        return view('pages.client.index', compact('movies', 'category', 'firstMovie'));
    }
    public function detail($id){
        $movie = Movie::findOrFail($id);
        $category = Category::all();
        $findIdProduk = Movie::find($id);
        $selectedCategory = $findIdProduk->category_id;
        $relatedMovies = Movie::where('category_id', $selectedCategory)->where('id', '!=', $id)->get();
        return view('pages.client.movieDetail', compact('movie', 'category', 'relatedMovies'));
    }
}
