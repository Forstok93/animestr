<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'episode_number',
        'embed_link',
    ];

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
