<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Beritakategori;
use App\Traits\HasUpload;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    use Resource, HasUpload;

    protected $model = Berita::class;
    protected $view = 'admin.berita';
    protected $route = 'berita';

    public function create()
    {
        $kategori = Beritakategori::all()->pluck('category_name', 'id');
        return view($this->view . '.create', compact('kategori'));
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        $kategori = Beritakategori::all()->pluck('category_name', 'id');
        return view($this->view . '.edit', compact('data', 'kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->model::$rulesCreate);
        $post = $this->hasFile($request->path, 'berita');
        $data['path'] = $post;
        $this->model::create($data);
        return redirect(route($this->route . '.index'));
    }

    public function update(Request $request, $id)
    {
        $poster = $this->model::find($id);
        $data = $request->all();
        Validator::make($data, $this->model::rulesEdit($poster));
        if ($request->file('path') == '') {
            unset($poster['path']);
        } else {
            $post = $this->hasFile($request->path, 'berita');
            Storage::delete($poster->path);
            $data['path'] = $post;
        }
        $poster->update($data);
        return redirect(route($this->route . '.index'));
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->slug . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->slug) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->make(true);
    }
    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        Storage::delete( $data->path);
        $this->model::destroy($id);
    }

}
