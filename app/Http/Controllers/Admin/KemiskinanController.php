<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kemiskinan;
use App\Traits\HasUpload;
use App\Traits\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class KemiskinanController extends Controller
{
    use Resource, HasUpload;

    protected $model = Kemiskinan::class;
    protected $view = 'admin.kemiskinan';
    protected $route = 'kemiskinan';

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->model::$rulesCreate)->validate();
        $post = $this->hasFile($request->path, 'kemiskinan');
        $data['path'] = $post;
        $this->model::create($data);
        return redirect(route($this->route . '.index'));
    }

    public function update(Request $request, $id)
    {
        $poster = $this->model::find($id);
        $data = $request->all();
        Validator::make($data, $this->model::rulesEdit($poster))->validate();
        if ($request->file('path') == '') {
            unset($poster['path']);
        } else {
            $post = $this->hasFile($request->path, 'kemiskinan');
            Storage::delete($poster->path);
            $data['path'] = $post;
        }
        $poster->update($data);
        return redirect(route($this->route . '.index'));
    }

    public function file($id)
    {
        $data = $this->model::findOrFail($id);
        $result = $this->showFile($data->path);
        return $result;
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('action', function ($data) {
                $view = '<a href="#" data-id="' . $data->id . '" class="btn btn-secondary preview"><i class="fa fa-file-pdf"></i></a>';
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->addColumn('tanggal_diterbitkan', function ($data) {
                return Carbon::parse($data->tanggal_diterbitkan)->isoFormat('dddd, D MMMM Y');
            })
            ->addColumn('preview', function ($data) {
                $view = '<a href="#" data-id="' . $data->id . '" class="preview"><img height="40" src="' . asset('assets/img/pdf-file.png') . '"></a>';
                return $view;
            })->rawColumns(['action', 'preview'])
            ->make(true);
    }
}
