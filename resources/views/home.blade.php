@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Новинки</h2>
    <div class="row">
        @foreach($latestAnimes as $anime)
            <div class="col-md-3 mb-4">
                <a href="{{ route('anime.show', $anime->id) }}">
                    <img src="{{ asset('uploads/' . $anime->image) }}" class="img-fluid" alt="{{ $anime->title }}">
                    <h5 class="mt-2">{{ $anime->title }}</h5>
                </a>
            </div>
        @endforeach
    </div>

    <h2 class="mt-5">Популярное за неделю</h2>
    <div class="row">
        @foreach($popularAnimes as $anime)
            <div class="col-md-3 mb-4">
                <a href="{{ route('anime.show', $anime->id) }}">
                    <img src="{{ asset('uploads/' . $anime->image) }}" class="img-fluid" alt="{{ $anime->title }}">
                    <h5 class="mt-2">{{ $anime->title }}</h5>
                </a>
            </div>
        @endforeach
    </div>

    <h2 class="mt-5">Рекомендации по жанрам</h2>
    <div class="row">
        @foreach($genres as $genre)
            <div class="col-md-2 mb-4">
                <a href="{{ route('anime.catalog', ['genre' => $genre]) }}" class="btn btn-outline-primary w-100">
                    {{ $genre }}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
