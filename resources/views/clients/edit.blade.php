<!-- resources/views/clients/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
</head>
<body>
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}" required>

        <label for="email">Client Email:</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}" required>

        <button type="submit">Update Client</button>
    </form>
</body>
</html>
