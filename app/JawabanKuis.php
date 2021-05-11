<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanKuis extends Model
{
    protected $table = 'jawaban_kuis';

    public function kuis()
    {
        return $this->belongsTo('App\Kuis');
    }

    public function jawaban_kuis_user()
    {
        return $this->hasMany('App\JawabanKuisUser');
    }
}
