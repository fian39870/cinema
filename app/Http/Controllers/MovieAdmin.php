<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieAdmin extends Controller
{
    public function dashboard()
    {
        $getUser = Auth::user();
        $totalAdmin = User::where('role', 'Admin')->count();
        $totalUser = User::where('role', 'User')->count();
        $totalMovie = Movie::count();
        $totalTransaksi = Ticket::count();
        return view('pages.admin.dashboard', compact('totalMovie', 'totalAdmin','totalUser', 'totalTransaksi', 'getUser'));
    }

    public function index()
    {
        $movies = Movie::with('category')->get();
        $getUser = Auth::user();
        return view('pages.admin.movie.movie', compact('movies', 'getUser'));
    }

    public function create()
    {
        $category = Category::all();
        $getUser = Auth::user();
        return view('pages.admin.movie.create', compact('category', 'getUser'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'age_rating' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'ticket_price' => 'required',
            'category' => 'required'
        ]);
        $movie = new Movie();
        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];
        $movie->age_rating = $validatedData['age_rating'];
        $movie->ticket_price = $validatedData['ticket_price'];
        $movie->category_id = $validatedData['category'];
        $poster = $request->file('poster');
        $posterName = time() . '_' . $poster->getClientOriginalName();
        $poster->move(public_path('poster'), $posterName);
        $movie->poster = $posterName;
        $movie->save();

        return redirect()->route('movie')->with('success', 'Movie created successfully');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $getUser = Auth::user();
        $category = Category::all();
        $selectedCategory = $movie->category_id;
        return view('pages.admin.movie.edit', compact('movie', 'category', 'selectedCategory', 'getUser'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'age_rating' => 'required',
            'ticket_price' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];
        $movie->age_rating = $validatedData['age_rating'];
        $movie->category_id = $validatedData['category'];
        $movie->ticket_price = $validatedData['ticket_price'];

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $posterName = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('poster'), $posterName);
            $movie->poster = $posterName;
        }

        $movie->save();

        return redirect()->route('movie')->with('success', 'Movie updated successfully');
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $posterPath = public_path('poster') . '/' . $movie->poster;

        if (file_exists($posterPath)) {
            unlink($posterPath);
        }
        $movie->delete();
        return redirect()->route('movie')->with('success', 'Movie deleted successfully');
    }
}
