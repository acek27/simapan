<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peraturan extends Model
{
    use HasUlids, Sluggable;

    protected $table = 'peraturan';
    protected $fillable = ["nama_peraturan", "jenis_id", "tentang", "tanggal_penetapan", "nomor", "status", "path", "slug"];
    protected $attributes = ['status' => 1];
    protected $with = ['jenis'];
    protected $casts = ['id' => 'string'];


    public static $rulesCreate = [
        'jenis_id' => 'required',
        'nama_peraturan' => 'required',
        'tentang' => 'required',
        'nomor' => 'required',
        'tanggal_penetapan' => 'required|date',
        'path' => 'required|mimetypes:application/pdf|max:2048'
    ];

    public static function rulesEdit(Peraturan $data)
    {
        return [
            'jenis_id' => 'required',
            'nama_peraturan' => 'required',
            'tentang' => 'required',
            'nomor' => 'required',
            'tanggal_penetapan' => 'required|date',
            'path' => 'mimetypes:application/pdf|max:2048'
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_peraturan'
            ]
        ];
    }

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisPeraturan::class, 'jenis_id', 'id');
    }
}
