@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Список проектов</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Создать новый проект</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
