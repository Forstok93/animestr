@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Админ-панель: Список аниме</h2>

    <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Добавить новое аниме</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Обложка</th>
                <th>Название</th>
                <th>Жанр</th>
                <th>Тип</th>
                <th>Статус</th>
                <th>Год</th>
                <th>Просмотры</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animes as $anime)
                <tr>
                    <td><img src="{{ asset('uploads/' . $anime->image) }}" width="80" alt="{{ $anime->title }}"></td>
                    <td>{{ $anime->title }}</td>
                    <td>{{ $anime->genre }}</td>
                    <td>{{ $anime->type }}</td>
                    <td>{{ $anime->status }}</td>
                    <td>{{ $anime->year }}</td>
                    <td>{{ $anime->views }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $animes->links() }}
    </div>
</div>
@endsection
