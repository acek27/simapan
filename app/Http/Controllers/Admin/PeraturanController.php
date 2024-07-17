<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\JenisPeraturan;
use App\Models\Peraturan;
use App\Traits\HasUpload;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PeraturanController extends Controller
{
    use Resource, HasUpload;

    protected $model = Peraturan::class;
    protected $view = 'admin.peraturan';
    protected $route = 'peraturan';

    public function create()
    {
        $jenis = JenisPeraturan::all()->pluck('nama_jenis', 'id');
        return view($this->view . '.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->model::$rulesCreate);
        $post = $this->hasFile($request->path, 'peraturan');
        $data['path'] = $post;
        $this->model::create($data);
        return redirect(route($this->route . '.index'));
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('action', function ($data) {
                $view = '<a href="#" data-id="' . $data->id . '" class="btn btn-secondary preview"><i class="fa fa-file-pdf"></i></a>';
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $view . '&nbsp' . $edit . '&nbsp' . $del;
            })
            ->make(true);
    }
    public function file($id)
    {
        $data = $this->model::findOrFail($id);
        $result = $this->showFile($data->path);
        return $result;
    }

    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        Storage::delete($data->path);
        $this->model::destroy($id);
    }
}
