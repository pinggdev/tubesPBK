<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = "kelas";

    protected $fillable = ['kelas', 'deskripsi', 'bab', 'gambar' , 'slug'];

    public function materi()
    {
        return $this->hasMany('App\Materi');
    }

    public function kuis()
    {
        return $this->hasMany('App\Kuis');
    }
}
