@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Invoice</h1>

    <form action="{{ route('invoices.update', $invoice) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="projects_id">Project</label>
            <select name="projects_id" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $invoice->projects_id == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $invoice->amount }}" required>
        </div>

        <div class="mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $invoice->due_date }}" required>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>

        <button class="btn btn-primary">Update Invoice</button>
    </form>
</div>
@endsection
