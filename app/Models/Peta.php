<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasUlids;

    protected $table = 'peta';
    protected $fillable = ['keterangan', 'periode', 'tahun', 'path'];
    protected $casts = ['id' => 'string'];

    public static $rulesCreate = [
        'keterangan' => 'required',
        'periode' => 'required|numeric|digits:1|max:2',
        'tahun' => 'required|date',
        'path' => 'required|image|max:2048'
    ];

    public static function rulesEdit(Peta $data)
    {
        return [
            'keterangan' => 'required',
            'periode' => 'required|numeric|digits:1|max:2',
            'tahun' => 'required|date',
            'path' => 'image|max:2048'
        ];
    }
}
