<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peta;
use App\Traits\HasUpload;
use App\Traits\Resource;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    use Resource, HasUpload;

    protected $model = Peta::class;
    protected $view = 'admin.peta';
    protected $route = 'peta';
}
