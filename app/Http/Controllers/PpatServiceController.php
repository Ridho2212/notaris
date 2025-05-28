<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpatService;

class PpatServiceController extends Controller
{
    public function index()
    {
        $services = PpatService::latest()->get();
        return view('ppat_services.index', compact('services'));
    }

    public function create()
    {
        return view('ppat_services.create');
    }

    public function show($id)
    {
        $service = PpatService::findOrFail($id);
        return view('ppat_services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = PpatService::findOrFail($id);
        return view('ppat_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_name' => 'required|string',
            'service_type' => 'required',
            'document_number' => 'required|string',
            'service_date' => 'required|date',
            'object_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        PpatService::findOrFail($id)->update($validated);

        return redirect()->route('ppat-services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PpatService::findOrFail($id)->delete();
        return redirect()->route('ppat-services.index')->with('success', 'Data layanan berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'service_type' => 'required|in:jual_beli,hibah,tukar_menukar,dll',
            'document_number' => 'required|string|max:100',
            'service_date' => 'required|date',
            'object_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        PpatService::create($validated);

        return redirect()->route('ppat-services.index')->with('success', 'Layanan PPAT berhasil ditambahkan.');
    }
}

