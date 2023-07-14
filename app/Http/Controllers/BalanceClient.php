<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceClient extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $category = Category::all();
            $userId = auth()->id();
            $balance = Balance::where('user_id', $userId)->first();
            return view('pages.client.topup', compact('category', 'balance'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

    }
    public function prosesTopup(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Mengecek apakah user memiliki data saldo
        $balance = $user->balances;
        if ($balance) {
            // Jika sudah memiliki saldo, mengupdate jumlah saldo
            $balance->amount = $balance->amount + $validatedData['amount'];
            $balance->save();
        } else {
            // Jika belum memiliki saldo, membuat data saldo baru
            $balance = Balance::create([
                'user_id' => $user->id,
                'amount' => $validatedData['amount'],
            ]);
        }

        return redirect()->back()->with('success', 'Top up successfully');
    }
}
