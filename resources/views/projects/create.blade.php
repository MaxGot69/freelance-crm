@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title">Project Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button class="btn btn-success">Create Project</button>
    </form>
</div>
@endsection
