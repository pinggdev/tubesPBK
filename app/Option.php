<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = "options";
    protected $fillable = [
        'kuis_id',
        'option',
        'points'
    ];

    public function kuis()
    {
        return $this->belongsTo('App\Kuis', 'kuis_id');
    }
}
