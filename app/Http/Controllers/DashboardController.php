<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Peta;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Berita::orderBy('date', 'DESC')->take(3)->get();
        $peta = Peta::all();
        $map = Peta::orderBy('created_at', 'DESC')->first();
        return view('welcome', compact('posts', 'peta', 'map'));
    }
}
