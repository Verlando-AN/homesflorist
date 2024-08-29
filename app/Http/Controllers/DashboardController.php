<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Disease;
use App\Models\DiagnosisHistory;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $diseases = Disease::all();
        $histories = DiagnosisHistory::where('user_id', Auth::id())->get();

        return view('dashboard.index', [
            'users' => $users,
            'diseases' => $diseases,
            'histories' => $histories, 
            'title' => 'Home',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $changes = [];

        if ($user->username !== $request->input('username')) {
            $changes[] = 'Username';
            $user->username = $request->input('username');
        }

        if ($user->email !== $request->input('email')) {
            $changes[] = 'Email';
            $user->email = $request->input('email');
        }

        if ($request->filled('password')) {
            $changes[] = 'Password';
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                \Storage::disk('public')->delete($user->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
            $changes[] = 'Foto Profil';
        }

        $user->save();

        $message = 'Profil Berhasil di Update!';
        if (!empty($changes)) {
            $message = implode(', ', $changes) . ' telah berhasil diperbarui!';
        }

        return redirect()->back()->with('success', $message);
    }

    public function show($id)
    {
        $history = DiagnosisHistory::findOrFail($id);
        $diseases = Disease::all();
        $results = $this->getDiagnosisResults($history);
    
        return view('dashboard.driwayat', [
            'history' => $history,
            'diseases' => $diseases,
            'results' => $results,
            'title' => 'Diagnosis Details',
        ]);
    }

    private function getDiagnosisResults($history)
    {
        $diagnosisResults = json_decode($history->diagnosis_results, true);
        $results = [];
    
        foreach ($diagnosisResults as $result) {
            if (isset($result['disease']['id'])) {
                $disease = Disease::find($result['disease']['id']);
   
                if ($disease) {
                    $results[] = [
                        'disease' => $disease,
                        'cf' => $result['cf']
                    ];
                }
            }
        }
    
        return $results;
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun pengguna telah dihapus.');
    }

    public function home()
    {
        return view('dashboard.home', [
            'title' => 'home'
        ]);
    }
}
