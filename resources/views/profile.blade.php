@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Профиль пользователя: {{ $user->name }}</h2>

    <h3 class="mt-4">Избранные аниме</h3>
    <div class="row">
        @forelse($favorites as $anime)
            <div class="col-md-3 mb-4">
                <a href="{{ route('anime.show', $anime->id) }}">
                    <img src="{{ asset('uploads/' . $anime->image) }}" class="img-fluid" alt="{{ $anime->title }}">
                    <h5 class="mt-2">{{ $anime->title }}</h5>
                </a>
            </div>
        @empty
            <p>Нет избранных аниме.</p>
        @endforelse
    </div>

    <h3 class="mt-5">История просмотров</h3>
    <div class="row">
        @forelse($history as $anime)
            <div class="col-md-3 mb-4">
                <a href="{{ route('anime.show', $anime->id) }}">
                    <img src="{{ asset('uploads/' . $anime->image) }}" class="img-fluid" alt="{{ $anime->title }}">
                    <h5 class="mt-2">{{ $anime->title }}</h5>
                </a>
            </div>
        @empty
            <p>История просмотров пуста.</p>
        @endforelse
    </div>
</div>
@endsection
