<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Show the form to create a new transaction
    public function create(Client $client)
    {
        return view('transactions.form', compact('client'));
    }

    // Store a new transaction
    public function store(Request $request,Client $client)
    {
        $request->validate([
            'previous_payment_date' => 'required|date',
            'previous_payment_amount' => 'required|numeric',
            'next_payment_date' => 'required|date',
            'next_payment_amount' => 'required|numeric',
            'remarks' => 'nullable|string',
        ]);

        // Add the client_id to the request data
        $data = $request->all();
        $data['client_id'] = $client->id;

        Transaction::create($data);

        return redirect()->route('clients.transactions', $client->id)->with('success', 'Transaction added successfully!');
    }

    // List all transactions
    public function index(Client $client)
    {
        // Fetch the client's transactions
        $transactions = $client->transactions;

        // Pass the client and transactions to the view
        return view('clients.transactions', compact('client', 'transactions'));
    }

    // Show the form to edit a transaction
    public function edit(Transaction $transaction)
    {
        // Fetch the client associated with the transaction
        $client = $transaction->client;

        // Pass the transaction and client to the form view
        return view('transactions.form', compact('transaction', 'client'));
    }

    // Update a transaction
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'previous_payment_date' => 'required|date',
            'previous_payment_amount' => 'required|numeric',
            'next_payment_date' => 'required|date',
            'next_payment_amount' => 'required|numeric',
            'remarks' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    // Delete a transaction
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
