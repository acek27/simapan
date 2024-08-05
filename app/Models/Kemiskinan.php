<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kemiskinan extends Model
{
    use HasUlids, SoftDeletes;

    protected $table = 'kemiskinan';
    protected $fillable = ['data_kemiskinan', 'tanggal_diterbitkan', 'periode','path'];
    protected $casts = ['id' => 'string'];

    public static $rulesCreate = [
        'data_kemiskinan' => 'required',
        'tanggal_diterbitkan' => 'required|date',
        'periode' => 'required|numeric|digits:1|max:2',
        'path' => 'required|mimetypes:application/pdf|max:2048'
    ];

    public static function rulesEdit(Kemiskinan $data)
    {
        return [
            'data_kemiskinan' => 'required',
            'tanggal_diterbitkan' => 'required|date',
            'periode' => 'required|numeric|digits:1|max:2',
            'path' => 'mimetypes:application/pdf|max:2048'
        ];
    }

}
