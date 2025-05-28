<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceFee;

class ServiceFeeController extends Controller
{
    public function index()
    {
        $fees = ServiceFee::latest()->get();
        return view('service_fees.index', compact('fees'));
    }

    public function create()
    {
        return view('service_fees.create');
    }

    public function show($id)
    {
        $fee = ServiceFee::findOrFail($id);
        return view('service_fees.show', compact('fee'));
    }

    public function edit($id)
    {
        $fee = ServiceFee::findOrFail($id);
        return view('service_fees.edit', compact('fee'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'service_type' => 'required|string|max:100',
            'cost_details' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:belum_bayar,lunas',
            'payment_method' => 'nullable|string|max:100',
            'payment_date' => 'nullable|date',
        ]);

        ServiceFee::findOrFail($id)->update($validated);
        return redirect()->route('service-fees.index')->with('success', 'Biaya berhasil diperbarui.');
    }

    public function destroy($id)
    {
        ServiceFee::findOrFail($id)->delete();
        return redirect()->route('service-fees.index')->with('success', 'Data berhasil dihapus.');
    }

    public function print($id)
    {
        $fee = ServiceFee::findOrFail($id);
        return view('service_fees.print', compact('fee'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'service_type' => 'required|string|max:100',
            'cost_details' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:belum_bayar,lunas',
            'payment_method' => 'nullable|string|max:100',
            'payment_date' => 'nullable|date',
        ]);

        ServiceFee::create($validated);

        return redirect()->route('service-fees.index')->with('success', 'Biaya layanan berhasil disimpan.');
    }
}

