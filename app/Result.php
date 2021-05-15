<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "results";
    protected $fillable = [
        'user_id',
        'total_points'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kuis()
    {
        return $this->belongsToMany('App\Kuis')->withPivot(['option_id'], 'points');
    }
}
