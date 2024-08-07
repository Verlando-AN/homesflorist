<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use App\Models\Symptom;
use App\Models\Rule;

class DiagnosaController extends Controller
{
    public function diagnosa()
    {
        $symptoms = Symptom::all();
        return view('dashboard.diagnosa', compact('symptoms'));
    }

    public function diagnose(Request $request)
    {
        $selectedSymptoms = $request->input('symptoms', []);

        $diseases = Disease::with('rules')->get();
        $results = [];

        foreach ($diseases as $disease) {
            $cfCombine = 0;
            $rules = $disease->rules;

            foreach ($rules as $rule) {
                $symptomCodes = explode(',', $rule->rule);

                foreach ($symptomCodes as $code) {
                    if (in_array($code, $selectedSymptoms)) {
                        $symptom = Symptom::where('code', $code)->first();
                        $mb = $symptom->mb;
                        $md = $symptom->md;

                        $cf = $mb * $md;

                        $cfCombine = $cfCombine + $cf * (1 - $cfCombine);
                    }
                }
            }

            $cfPercentage = $cfCombine * 100;

            $results[] = ['disease' => $disease, 'cf' => $cfPercentage];
        }

        return view('dashboard.hasil', compact('results'));
    }
}
