<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'movie_carts';
    protected $fillable = [
        'user_id',
        'movie_id',
        'quantity'
    ];
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
