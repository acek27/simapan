<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Berita extends Model
{
    use Sluggable;

    protected $table = 'berita';
    protected $primaryKey = 'slug';
    protected $fillable = ['slug', 'category_id', 'title', 'content', 'path', 'editor', 'date'];
    protected $with = ['kategori'];
    protected $casts = ['slug' => 'string'];
    protected $appends = ['preview'];


    public static $rulesCreate = [
        'category_id' => 'required',
        'title' => 'required',
        'content' => 'required',
        'path' => 'required|image',
        'date' => 'required|date',
        'editor' => 'required'
    ];

    public static function rulesEdit(Berita $data)
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'path' => 'image',
            'editor' => 'required'
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getPreviewAttribute()
    {
        return substr(strip_tags(str_replace('&nbsp;', ' ', $this->content)),0,50).'...';
    }

    public function kategori()
    {
        return $this->belongsTo(Beritakategori::class, 'category_id');
    }
}
