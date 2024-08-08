<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Symptom;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }
        
        $symptoms = Symptom::all();
        return view('dashboard.crudgejala.index', compact('symptoms'));
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }

        return view('dashboard.crudgejala.create');
    }

    public function edit(Symptom $symptom)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }
        
        return view('dashboard.crudgejala.edit', compact('symptom'));
    }
       
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:symptoms',
            'name' => 'required|string|max:255',
            'mb' => 'required|numeric',
            'md' => 'required|numeric',
            'cf' => 'required|numeric',
        ]);

        Symptom::create($request->all());

        return redirect()->route('symptoms.index')->with('success', 'Gejala berhasil ditambahkan.');
    }
    
    public function update(Request $request, Symptom $symptom)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:symptoms,code,' . $symptom->id,
            'name' => 'required|string|max:255',
            'mb' => 'required|numeric',
            'md' => 'required|numeric',
            'cf' => 'required|numeric',
        ]);

        $symptom->update($request->all());

        return redirect()->route('symptoms.index')->with('success', 'Gejala berhasil diupdate.');
    }

    public function destroy(Symptom $symptom)
    {
        $symptom->delete();

        return redirect()->route('symptoms.index')->with('success', 'Gejala berhasil dihapus.');
    }
}