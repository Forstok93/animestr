@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Каталог аниме</h2>

    <form method="GET" action="{{ route('anime.catalog') }}" class="row mb-4">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Поиск по названию" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="genre" class="form-control">
                <option value="">Все жанры</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="status" class="form-control">
                <option value="">Все статусы</option>
                <option value="выпущено" {{ request('status') == 'выпущено' ? 'selected' : '' }}>Выпущено</option>
                <option value="онгоинг" {{ request('status') == 'онгоинг' ? 'selected' : '' }}>Онгоинг</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="type" class="form-control">
                <option value="">Все типы</option>
                <option value="TV" {{ request('type') == 'TV' ? 'selected' : '' }}>TV</option>
                <option value="Фильм" {{ request('type') == 'Фильм' ? 'selected' : '' }}>Фильм</option>
                <option value="OVA" {{ request('type') == 'OVA' ? 'selected' : '' }}>OVA</option>
