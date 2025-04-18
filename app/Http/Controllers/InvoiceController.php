<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('project')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('invoices.create', compact('projects'));
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'project_id' => 'required|exists:projects,id',  // Если инвойс связан с проектом
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);
    
        // Создание нового инвойса
        $invoice = new Invoice();
        $invoice->project_id = $request->project_id;
        $invoice->amount = $request->amount;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;
        $invoice->save();
    
        // Перенаправление на страницу с инвойсами
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
    }

    public function edit(Invoice $invoice)
    {
        $projects = Project::all();
        return view('invoices.edit', compact('invoice', 'projects'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'projects_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|in:paid,unpaid,overdue',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
