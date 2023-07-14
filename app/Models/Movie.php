<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'age_rating',
        'poster',
        'ticket_price',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
