<!-- resources/views/clients/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($client) ? 'Edit Client' : 'Create Client' }}</title>
</head>
<body>
    <h1>{{ isset($client) ? 'Edit Client' : 'Create Client' }}</h1>

    <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
        @csrf
        @if (isset($client))
            @method('PUT')  <!-- Для редактирования -->
        @endif
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', isset($client) ? $client->name : '') }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', isset($client) ? $client->email : '') }}" required>

        <button type="submit">{{ isset($client) ? 'Update' : 'Create' }}</button>
    </form>
</body>
</html>
