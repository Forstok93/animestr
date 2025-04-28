@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('uploads/' . $anime->image) }}" class="img-fluid" alt="{{ $anime->title }}">
        </div>
        <div class="col-md-8">
            <h2>{{ $anime->title }}</h2>
            <p><strong>Жанр:</strong> {{ $anime->genre }}</p>
            <p><strong>Тип:</strong> {{ $anime->type }}</p>
            <p><strong>Статус:</strong> {{ $anime->status }}</p>
            <p><strong>Год выпуска:</strong> {{ $anime->year }}</p>
            <p><strong>Описание:</strong> {{ $anime->description }}</p>

            @auth
                <form action="{{ route('profile.favorite', $anime->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-warning">Добавить в избранное</button>
                </form>
            @endauth
        </div>
    </div>

    <hr>

    <h3 class="mt-4">Серии</h3>
    <div class="row">
        @foreach($episodes as $episode)
            <div class="col-md-2 mb-3">
                <a href="#player" onclick="document.getElementById('playerFrame').src='{{ $episode->embed_link }}'" class="btn btn-outline-primary w-100">
                    Серия {{ $episode->episode_number }}
                </a>
            </div>
        @endforeach
    </div>

    <div id="player" class="mt-5">
        <iframe id="playerFrame" src="{{ $episodes->first()->embed_link ?? '' }}" width="100%" height="480" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
@endsection
