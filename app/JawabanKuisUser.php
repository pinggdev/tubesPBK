<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanKuisUser extends Model
{
    protected $talbe = 'jawaban_kuis_user';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kuis()
    {
        return $this->belongsTo('App\Kuis');
    }

    public function jawaban_kuis()
    {
        return $this->belongsTo('App\JawabanKuis');
    }
}
