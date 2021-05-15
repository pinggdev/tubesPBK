<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = "kuis";
    protected $fillable = [
        'kelas_id',
        'soal',
        'babkuis'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }

    public function options()
    {
        return $this->hasMany('App\Option', 'kuis_id', 'id');
    }

    public function results()
    {
        return $this->belongsToMany('App\Result');
    }
}
