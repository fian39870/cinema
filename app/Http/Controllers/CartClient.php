<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartClient extends Controller
{
    public function index()
    {
        $userId =  Auth::id();
        $cart = Cart::where('user_id', $userId)
            ->with('movie')
            ->get();

        $subtotal = 0;
        foreach ($cart as $cartItem) {
            $subtotal += $cartItem->movie->ticket_price * $cartItem->quantity;
        }
        $category = Category::all();
        return view('pages.client.cart', compact('cart', 'subtotal', 'category'));
    }
    public function addToCart(Movie $movie, Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $validator = Validator::make($request->all(), [
                'quantity' => 'required|integer|min:1',
                'seat_number' => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Periksa apakah tiket dengan nomor kursi yang sama sudah ada dalam keranjang pengguna
            $existingCart = Cart::where('user_id', $userId)
                ->where('movie_id', $movie->id)
                ->where('seat_number', $request->input('seat_number'))
                ->first();

            if ($existingCart) {
                return redirect()->back()->with('error', 'You have already added a ticket with the same seat number to your cart.');
            }

            // Periksa apakah tiket dengan nomor kursi yang sama sudah ada dalam tiket yang sudah dibeli oleh pengguna
            $existingTicket = Ticket::where('user_id', $userId)
                ->where('movie_id', $movie->id)
                ->where('seat_number', $request->input('seat_number'))
                ->first();

            if ($existingTicket) {
                return redirect()->back()->with('error', 'You have already purchased a ticket with the same seat number.');
            }

            $cart = Cart::where('user_id', $userId)
                ->where('movie_id', $movie->id)
                ->first();

            if ($cart) {
                // Increment the quantity if the product already exists in the cart
                $cart->quantity += $request->input('quantity');
                $cart->save();
            } else {
                // Create a new cart entry for the product
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->movie_id = $movie->id;
                $cart->seat_number = $request->input('seat_number');
                $cart->quantity = $request->input('quantity');
                $cart->save();
            }

            return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
    }



    public function checkout()
    {
        // Dapatkan saldo pengguna yang sedang melakukan checkout
        $userId = auth()->id();
        $balance = Balance::where('user_id', $userId)->first();

        // Hitung total biaya tiket
        $cart = Cart::where('user_id', $userId)->get();
        $totalCost = 0;
        foreach ($cart as $item) {
            $totalCost += $item->movie->ticket_price * $item->quantity;
        }

        // Periksa apakah saldo cukup untuk membayar total biaya tiket
        if ($balance->amount >= $totalCost) {
            // Lakukan transaksi pembayaran dan kurangi saldo pengguna
            $balance->amount -= $totalCost;
            $balance->save();

            // Simpan transaksi tiket ke database
            foreach ($cart as $item) {
                $ticket = new Ticket();
                $ticket->user_id = $userId;
                $ticket->movie_id = $item->movie_id;
                $ticket->seat_number = $item->seat_number;
                $ticket->total_cost = $item->movie->ticket_price * $item->quantity;
                $ticket->save();
            }

            // Hapus item cart setelah checkout
            foreach ($cart as $item) {
                $item->delete();
            }

            // Redirect atau berikan respons sukses
            return redirect()->route('historyTicket')->with('success', 'Ticket checkout successful.');
        } else {
            // Saldo tidak cukup, berikan pesan kesalahan
            return redirect()->route('topup')->with('error', 'Insufficient balance. Please top up your balance.');
        }
    }

    public function deleteCartItem($cartId)
    {
        // Temukan item keranjang berdasarkan ID
        $cart = Cart::findOrFail($cartId);

        if ($cart->quantity > 1) {
            // Kurangi jumlah item jika lebih dari satu
            $cart->quantity--;
            $cart->save();
        } else {
            // Hapus item jika jumlahnya satu
            $cart->delete();
        }

        return redirect()->route('cart')->with('success', 'Item removed from cart successfully');
    }
}
