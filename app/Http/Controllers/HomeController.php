<?php

namespace App\Http\Controllers;

use App\Models\PapanBunga;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $papanBunga = PapanBunga::all();
        return view('home', compact('papanBunga'));
    }
}