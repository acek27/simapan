<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Berita::orderBy('date', 'DESC')->take(3)->get();
        return view('welcome', compact('posts'));
    }
}
