<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = "kelas";

    protected $fillable = ['kelas', 'deskripsi', 'gambar', 'slug'];
}
