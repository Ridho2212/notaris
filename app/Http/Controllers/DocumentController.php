<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.show', compact('document'));
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'document_type' => 'required|string|max:100',
            'client_name' => 'required|string|max:255',
            'document_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'notes' => 'nullable|string',
            'access_status' => 'required|in:privat,publik',
        ]);

        $document = Document::findOrFail($id);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('documents');
        }

        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Dokumen diperbarui.');
    }

    public function destroy($id)
    {
        Document::findOrFail($id)->delete();
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_type' => 'required|string|max:100',
            'client_name' => 'required|string|max:255',
            'document_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'notes' => 'nullable|string',
            'access_status' => 'required|in:privat,publik',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('documents');
        }

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diarsipkan.');
    }
}

