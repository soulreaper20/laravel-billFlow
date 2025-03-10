<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all clients
        $clients = Client::latest()->get();

        // Pass clients to the dashboard view
        return view('dashboard', compact('clients'));
    }
}
