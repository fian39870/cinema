<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryClient extends Controller
{
    public function index($id)
    {
        $category = Category::with('movie')->findOrFail($id);
        return view('pages.client.category', compact('category'));
    }
}
