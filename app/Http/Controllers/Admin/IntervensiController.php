<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Galeri;
use App\Models\Peraturan;
use App\Traits\HasUpload;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntervensiController extends Controller
{
    use Resource, HasUpload;

    protected $model = Dokumentasi::class;
    protected $view = 'admin.intervensi';
    protected $route = 'intervensi';

    public function index()
    {
        $data = Dokumentasi::paginate(4);
        return view($this->view . '.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        return $data;
        Validator::make($data, $this->model::$rulesCreate)->validate();
        Validator::make($data, Galeri::$rulesCreate)->validate();
        $dokumentasi = $this->model::create($data);
        foreach ($request->path as $item) {
            $image = $this->hasFile($item, 'galeri');
            Galeri::create([
                'dokumentasi_id' => $dokumentasi->id,
                'path' => $image
            ]);
        }
        return redirect(route($this->route . '.index'));
    }
    public function file($id)
    {
        $data = Galeri::findOrFail($id);
        $result = $this->showFile($data->path);
        return $result;
    }

}
