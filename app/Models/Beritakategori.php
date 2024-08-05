<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beritakategori extends Model
{
    protected $table = 'berita_kategori';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string'];
}
