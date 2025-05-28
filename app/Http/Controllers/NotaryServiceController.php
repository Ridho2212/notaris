<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaryService;

class NotaryServiceController extends Controller
{
    public function index()
    {
        $services = NotaryService::latest()->get();
        return view('notary_services.index', compact('services'));
    }

    public function create()
    {
        return view('notary_services.create');
    }

    public function show($id)
    {
        $service = NotaryService::findOrFail($id);
        return view('notary_services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = NotaryService::findOrFail($id);
        return view('notary_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'document_type' => 'required|in:pendirian_pt,perubahan_ad,kuasa,dll',
            'processing_date' => 'required|date',
            'document_number' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        NotaryService::findOrFail($id)->update($validated);

        return redirect()->route('notary-services.index')->with('success', 'Data layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        NotaryService::findOrFail($id)->delete();
        return redirect()->route('notary-services.index')->with('success', 'Data berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'document_type' => 'required|in:pendirian_pt,perubahan_ad,kuasa,dll',
            'processing_date' => 'required|date',
            'document_number' => 'required|string|max:100',
            'draft' => 'nullable|file|mimes:pdf,docx',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('draft')) {
            $validated['draft_path'] = $request->file('draft')->store('drafts');
        }

        NotaryService::create($validated);

        return redirect()->route('notary-services.index')->with('success', 'Layanan Notaris berhasil disimpan.');
    }
}

