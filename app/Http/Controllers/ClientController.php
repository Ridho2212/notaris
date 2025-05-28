<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'status' => 'required|in:aktif,tidak_aktif'
        ]);

        Client::findOrFail($id)->update($validated);
        return redirect()->route('clients.index')->with('success', 'Data klien diperbarui.');
    }

    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect()->route('clients.index')->with('success', 'Data klien dihapus.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Data client berhasil disimpan.');
    }
}

