<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>

<h3>Invoices:</h3>
@if ($invoices->isEmpty())
    <p>No invoices found for this project.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Amount</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->due_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
