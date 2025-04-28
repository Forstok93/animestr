<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'type',
        'status',
        'description',
        'image',
        'year',
        'views',
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
