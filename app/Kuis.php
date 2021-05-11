<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }

    public function jawaban_kuis() {
        return $this->hasMany('App\JawabanKuis');
    }

    public function jawaban_kuis_user() {
        return $this->hasMany('App\JawabanKuisUser');
    }
}
