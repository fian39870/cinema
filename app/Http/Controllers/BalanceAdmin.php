<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceAdmin extends Controller
{
    public function index()
    {
        $balances = Balance::with('user')->get();
        $getUser = Auth::user();
        return view('pages.admin.balance.balance', compact('balances', 'getUser'));
    }
    public function create()
    {
        $balances = Balance::all();
        $user = User::all();
        $getUser = Auth::user();
        return view('pages.admin.balance.create ', compact('balances', 'user', 'getUser'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
        ]);

        $balance = new Balance();
        $balance->user_id = $request->input('name');
        $balance->amount = $request->input('amount');
        $balance->save();

        return redirect()->route('balance')->with('success', 'Balance created successfully');
    }
    public function edit($id)
    {
        $getUser = Auth::user();
        $user = User::all();
        $balances = Balance::findOrFail($id);
        $selectedUserId = $balances->user_id;
        return view('pages.admin.balance.edit', compact('balances', 'user', 'selectedUserId', 'getUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
        ]);
        $balance = Balance::findOrFail($id);
        $balance->user_id = $request->input('name');
        $balance->amount = $request->input('amount');
        $balance->save();

        return redirect()->route('balance')->with('success', 'Movie updated successfully');
    }

    public function delete($id)
    {
        $balance = Balance::findOrFail($id);
        $balance->delete();
        return redirect()->route('balance')->with('success', 'Movie deleted successfully');
    }
}
