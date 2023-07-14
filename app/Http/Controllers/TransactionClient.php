<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionClient extends Controller
{
    public function index()
    {
        $userId =  Auth::id();
        $tickets = Ticket::where('user_id', $userId)
            ->with('movie')
            ->get();
        $category = Category::all();
        return view('pages.client.ticketHistory', compact('tickets', 'category'));
    }
    public function show(){
        $userId =  Auth::id();
        $ticket = Ticket::where('user_id', $userId)
            ->with('movie')
            ->get();
        return view('pages.client.ticketPrint', compact('ticket'));
    }
}
