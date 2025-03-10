<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Show the form to add a new client
    public function create()
    {
        return view('clients.create');
    }

    // Store a new client
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,email',
            'address' => 'required|string',
            'app_created' => 'required|in:app,website',
        ]);

        Client::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Client added successfully!');
    }
    public function edit(Client $client)
    {
        // Pass the client data to the edit view
        return view('clients.create', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,email,',
            'address' => 'required|string',
            'app_created' => 'required|in:app,website',
        ]);

        // Update the client
        $client->update($request->all());

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Client updated successfully!');
    }

    // Method to view transactions for a specific client
    public function viewTransactions(Client $client)
    {
        // Fetch the client's transactions
        $transactions = $client->transactions;

        // Pass the client and transactions to the view
        return view('clients.transactions', compact('client', 'transactions'));
    }

}
