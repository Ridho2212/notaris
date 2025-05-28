<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\RequestSubmission;
use Exception;
use Illuminate\Support\Facades\Log;

class RequestSubmissionController extends Controller
{
    public function index(){
        try {
          $submissions = RequestSubmission::latest()->get();
        return view('request_submissions.index', compact('submissions'));
        } catch (Exception $e) {
            Log::error('Error di RequestSubmissionController@create: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka halaman Lihat Dokumen.']);
        }
    }
    
    public function create()
    {
        return view('request_submissions.create');
    }

    public function show($id)
    {
        $submission = RequestSubmission::findOrFail($id);
        return view('request_submissions.show', compact('submission'));
    }


    public function edit($id)
    {
        $submission = RequestSubmission::findOrFail($id);
        $clients = Client::all(); // kalau kamu perlu dropdown client
        return view('request_submissions.edit', compact('submission', 'clients'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_name' => 'required',
            'request_type' => 'required',
            'status' => 'required',
            'submission_date' => 'required|date',
            'notes' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,docx',
        ]);

        $submission = RequestSubmission::findOrFail($id);

        if ($request->hasFile('document')) {
            $validated['document_path'] = $request->file('document')->store('documents');
        }

        $submission->update($validated);

        return redirect()->route('request-submissions.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RequestSubmission::findOrFail($id)->delete();
        return redirect()->route('request-submissions.index')->with('success', 'Data berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'request_type' => 'required|in:sertifikat,ajb,waris,lainnya',
            'submission_date' => 'required|date',
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
            'notes' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,docx',
        ]);

        if ($request->hasFile('document')) {
            $validated['document_path'] = $request->file('document')->store('documents');
        }

        RequestSubmission::create($validated);

        return redirect()->route('request-submissions.index')->with('success', 'Data berhasil disimpan.');
    }


}