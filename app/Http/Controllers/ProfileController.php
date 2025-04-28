<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anime;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->get();
        $history = $user->history()->get();

        return view('profile', compact('user', 'favorites', 'history'));
    }

    public function favorite(Anime $anime)
    {
        $user = Auth::user();
        if (!$user->favorites->contains($anime->id)) {
            $user->favorites()->attach($anime->id);
        } else {
            $user->favorites()->detach($anime->id);
        }

        return back();
    }

    public function history(Anime $anime)
    {
        $user = Auth::user();
        if (!$user->history->contains($anime->id)) {
            $user->history()->attach($anime->id);
        }

        return back();
    }
}
