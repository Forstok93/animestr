<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Episode;

class AnimeController extends Controller
{
    public function index()
    {
        $latestAnimes = Anime::orderBy('created_at', 'desc')->take(8)->get();
        $popularAnimes = Anime::orderBy('views', 'desc')->take(8)->get();
        $genres = Anime::select('genre')->distinct()->pluck('genre');

        return view('home', compact('latestAnimes', 'popularAnimes', 'genres'));
    }

    public function catalog(Request $request)
    {
        $query = Anime::query();

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $animes = $query->paginate(20);
        $genres = Anime::select('genre')->distinct()->pluck('genre');

        return view('catalog', compact('animes', 'genres'));
    }

    public function show($id)
    {
        $anime = Anime::findOrFail($id);
        $episodes = Episode::where('anime_id', $id)->orderBy('episode_number')->get();
        $anime->increment('views');

        return view('anime', compact('anime', 'episodes'));
    }
}
