<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metodePembayarans = MetodePembayaran::paginate(10);
        return view('metodePembayarans.index', compact('metodePembayarans'));
    }

    public function create()
    {
        return view('metodePembayarans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        MetodePembayaran::create($validated);
        return redirect()->route('metodePembayarans.index')->with('success', 'Metode Pembayaran berhasil ditambahkan!');
    }

    public function edit(MetodePembayaran $metodePembayaran)
    {
        return view('metodePembayarans.edit', compact('metodePembayaran'));
    }

    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $metodePembayaran->update($validated);
        return redirect()->route('metodePembayarans.index')->with('success', 'Metode Pembayaran berhasil diperbarui!');
    }

    public function destroy(MetodePembayaran $metodePembayaran)
    {
        $metodePembayaran->delete();
        return redirect()->route('metodePembayarans.index')->with('success', 'Metode Pembayaran berhasil dihapus!');
    }
}

