@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Invoice</h1>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="projects_id">Project</label>
            <select name="projects_id" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="unpaid">Unpaid</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>

        <button class="btn btn-success">Create Invoice</button>
    </form>
</div>
@endsection
