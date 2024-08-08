<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Symptom;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }
        
        $diseases = Disease::with('symptoms')->get();
        return view('dashboard.crudpenyakit.index', compact('diseases'));
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }

        $symptoms = Symptom::all();
        return view('dashboard.crudpenyakit.create', compact('symptoms'));
    }

    public function edit(Disease $disease)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }
        $symptoms = Symptom::all();
        return view('dashboard.crudpenyakit.edit', compact('disease', 'symptoms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:diseases',
            'symptoms' => 'required|array',
        ]);
    
        $disease = Disease::create($request->only('name', 'code'));
    
        if ($request->has('symptoms')) {
            $symptomCodes = Symptom::whereIn('id', $request->input('symptoms'))->pluck('code');
            $symptomCodesString = $symptomCodes->implode(',');
    
            $disease->symptoms()->sync($request->input('symptoms'));
    
            // Simpan aturan berdasarkan kode gejala yang dipilih
            $ruleCode = 'R' . str_pad($disease->id, 2, '0', STR_PAD_LEFT); // Buat kode aturan
    
            Rule::create([
                'code' => $ruleCode,
                'rule' => $symptomCodesString, // Gabungkan kode gejala
                'disease_id' => $disease->id,
            ]);
        }
    
        return redirect()->route('diseases.index')->with('success', 'Penyakit dan aturan berhasil dibuat.');
    }
    
    public function update(Request $request, Disease $disease)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:10|unique:diseases,code,' . $disease->id,
        'symptoms' => 'array',
    ]);

    $disease->update($request->only('name', 'code'));

    if ($request->has('symptoms')) {
        $symptomCodes = Symptom::whereIn('id', $request->input('symptoms'))->pluck('code');
        $symptomCodesString = $symptomCodes->implode(',');

        $disease->symptoms()->sync($request->input('symptoms'));

        $rule = Rule::where('disease_id', $disease->id)->first();

        if ($rule) {
            $rule->update([
                'rule' => $symptomCodesString, 
            ]);
        } else {
            $ruleCode = 'R' . str_pad($disease->id, 2, '0', STR_PAD_LEFT);
            Rule::create([
                'code' => $ruleCode,
                'rule' => $symptomCodesString,
                'disease_id' => $disease->id,
            ]);
        }
    }

    return redirect()->route('diseases.index')->with('success', 'Penyakit dan aturan berhasil diperbarui.');
}

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('diseases.index')->with('success', 'Disease deleted successfully.');
    }
}
