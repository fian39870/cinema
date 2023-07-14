<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionAdmin extends Controller
{
    public function index()
    {
        $getUser = Auth::user();
        $transactions =  Ticket::with(['user', 'movie'])->get();
        return view('pages.admin.transaksi.transaksi', compact('transactions', 'getUser'));
    }
    public function create()
    {
        $getUser = Auth::user();
        $user = User::all();
        $movie = Movie::all();
        $transactions =  Ticket::with(['user', 'movie'])->get();
        return view('pages.admin.transaksi.create', compact('user', 'movie', 'transactions', 'getUser'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_user' => 'required',
            'film' => 'required',
            'nomor_kursi' => 'required',
            'total_pembayaran' => 'required',
        ]);
        $ticket = new Ticket();
        $ticket->user_id = $validatedData['nama_user'];
        $ticket->movie_id = $validatedData['film'];
        $ticket->seat_number = $validatedData['nomor_kursi'];
        $ticket->total_cost = $validatedData['total_pembayaran'];
        $ticket->save();

        return redirect()->route('transaction')->with('success', 'Movie created successfully');
    }
    public function edit($id)
    {
        $getUser = Auth::user();
        $transactions = Ticket::with(['user', 'movie'])->findOrFail($id);
        $user = User::all();
        $selectedUser = $transactions->user_id;
        $movie = Movie::all();
        $selectedMovie = $transactions->movie_id;
        return view('pages.admin.transaksi.edit', compact('transactions', 'selectedUser', 'user', 'selectedMovie', 'movie', 'getUser'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_user' => 'required',
            'film' => 'required',
            'nomor_kursi' => 'required',
            'total_pembayaran' => 'required',
        ]);
        $ticket = Ticket::findOrFail($id);
        $ticket->user_id = $validatedData['nama_user'];
        $ticket->movie_id = $validatedData['film'];
        $ticket->seat_number = $validatedData['nomor_kursi'];
        $ticket->total_cost = $validatedData['total_pembayaran'];
        $ticket->save();
        return redirect()->route('transaction')->with('success', 'Transaksi Berhasil Diperbarui');
    }
    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('transaction')->with('success', 'Movie deleted successfully');
    }
}
