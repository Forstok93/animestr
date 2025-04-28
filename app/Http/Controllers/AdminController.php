<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Episode;

class AdminController extends Controller
{
    public function index()
    {
        $animes = Anime::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.index', compact('animes'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = null;
        }

        $anime = Anime::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imageName,
            'year' => $request->year ?? date('Y'),
        ]);

        if ($request->filled('episodes')) {
            foreach (explode(',', $request->episodes) as $index => $episode_link) {
                Episode::create([
                    'anime_id' => $anime->id,
                    'episode_number' => $index + 1,
                    'embed_link' => trim($episode_link),
                ]);
            }
        }

        return redirect()->route('admin.index')->with('success', 'Аниме добавлено!');
    }
}
