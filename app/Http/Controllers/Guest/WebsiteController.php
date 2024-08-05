<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Beritakategori;
use App\Models\Dokumentasi;
use App\Models\Kemiskinan;
use App\Models\Peraturan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WebsiteController extends Controller
{

    public function legalitas(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Peraturan::query())
                ->addColumn('action', function ($data) {
                    $view = '<a href="#" data-id="' . $data->slug . '" class="preview"><img height="40" src="' . asset('assets/img/pdf-file.png') . '"></a>';
                    return $view;
                })
                ->make(true);
        }
        return view('guest.legalitas');
    }

    public function news()
    {
        $data = Berita::all();
        $kategori = Beritakategori::all();
        return view('guest.berita.index', compact('data', 'kategori'));
    }

    public function newsShow($id)
    {
        $data = Berita::findOrFail($id);
        $kategori = Beritakategori::all();
        return view('guest.berita.show', compact('data', 'kategori'));
    }

    public function program()
    {
        $data = Dokumentasi::all();
        return view('guest.program', compact('data'));
    }
    public function dataKemiskinan(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Kemiskinan::query())
                ->addColumn('action', function ($data) {
                    $view = '<a href="#" data-id="' . $data->id . '" class="preview"><img height="40" src="' . asset('assets/img/pdf-file.png') . '"></a>';
                    return $view;
                })
                ->addColumn('tanggal_diterbitkan', function ($data) {
                    return Carbon::parse($data->tanggal_diterbitkan)->isoFormat('dddd, D MMMM Y');
                })
                ->addColumn('preview', function ($data) {
                    $view = '<a href="#" data-id="' . $data->id . '" class="preview"><img height="40" src="' . asset('assets/img/pdf-file.png') . '"></a>';
                    return $view;
                })->rawColumns(['preview'])
                ->make(true);
        }
        return view('guest.data_kemiskinan');
    }

}
