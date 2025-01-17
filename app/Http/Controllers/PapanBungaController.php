<?php

namespace App\Http\Controllers;

use App\Models\PapanBunga;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PapanBungaController extends Controller
{
    public function index()
    {
        $papanBunga = PapanBunga::with('kategori')->get();
        return view('papanbunga.index', compact('papanBunga'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('papan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
           'kategori_id' => $request->kategori,
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $papanBunga = PapanBunga::create($request->all());

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('papanbunga', 'public');
            $papanBunga->update(['gambar' => $path]);
        }

        return redirect()->route('papanbunga.index')->with('success', 'Papan Bunga berhasil ditambahkan.');
    }

    public function edit(PapanBunga $papanBunga)
    {
        $kategori = Kategori::all();
        return view('papanbunga.edit', compact('papanBunga', 'kategori'));
    }

    public function update(Request $request, PapanBunga $papanBunga)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'nullable|exists:kategori,kategori',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string|max:1000', 
        ]);

        $papanBunga->update($request->except('gambar'));

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('papanbunga', 'public');
            $papanBunga->update(['gambar' => $path]);
        }

        return redirect()->route('papanbunga.index')->with('success', 'Papan Bunga berhasil diperbarui.');
    }

    public function show(PapanBunga $papanBunga)
    {
        return view('papanbunga.show', compact('papanBunga'));
    }
    
    public function destroy(PapanBunga $papanBunga)
    {
        $papanBunga->delete();
        return redirect()->route('papanbunga.index')->with('success', 'Papan Bunga berhasil dihapus.');
    }
}
