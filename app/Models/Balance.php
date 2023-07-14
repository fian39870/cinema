<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Balance extends Model
{
    use HasFactory;
    protected $table = 'balances';
    protected $fillable = [
        'user_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}