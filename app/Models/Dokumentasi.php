<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumentasi extends Model
{
    use HasUlids, SoftDeletes;

    protected $table = 'dokumentasi';
    protected $fillable = ['nama_kegiatan', 'tanggal'];
    protected $with = ['galeri'];
    protected $casts = ['id' => 'string'];


    public static $rulesCreate = [
        'nama_kegiatan' => 'required',
        'tanggal' => 'required|date',
    ];

    public static function rulesEdit(Dokumentasi $data)
    {
        return [
            'nama_kegiatan' => 'required',
            'tanggal' => 'required|date',
        ];
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'dokumentasi_id', 'id');
    }
}
