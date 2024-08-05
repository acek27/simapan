<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasUlids;

    protected $fillable = ['keterangan', 'periode', 'tahun', 'path'];
    protected $casts = ['id' => 'string'];
}
