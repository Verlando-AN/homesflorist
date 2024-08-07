<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
 
        return view('dashboard.index', [
            'users' => $users,
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
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


}
