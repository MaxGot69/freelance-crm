<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Это важный момент для отправки запроса методом PUT -->
    
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
    </div>

    <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="active" {{ $project->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $project->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="client_id">Client</label>
        <select name="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $client->id === $project->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Project</button>
</form>
