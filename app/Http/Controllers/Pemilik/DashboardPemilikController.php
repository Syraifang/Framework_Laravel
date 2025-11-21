<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;
use App\Models\Pet;  

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $pemilik = Pemilik::where('iduser', $userId)->first();

        $pets = [];
        if ($pemilik) {
            $pets = Pet::where('idpemilik', $pemilik->idpemilik)->with('rasHewan')->get();
        }

        return view('pemilik.dashboard', compact('pets'));
    }
}