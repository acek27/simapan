<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasUlids;

    protected $table = 'galeri';
    protected $fillable = ['dokumentasi_id', 'path'];
    protected $casts = ['id' => 'string'];

    public static $rulesCreate = [
        'path.*' => 'required|image|max:2048',
    ];

}
