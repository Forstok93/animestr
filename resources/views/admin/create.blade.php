@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Добавить новое аниме</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Жанр</label>
            <input type="text" name="genre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Тип (TV, Фильм, OVA)</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Статус (Выпущено, Онгоинг)</label>
            <input type="text" name="status" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Год выпуска</label>
            <input type="number" name="year" class="form-control">
        </div>

        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Обложка (изображение)</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label>Список ссылок на серии (через запятую)</label>
            <textarea name="episodes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Добавить аниме</button>
    </form>
</div>
@endsection
