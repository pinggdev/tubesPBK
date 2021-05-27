<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submission';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function hasil_submission()
    {
        return $this->hasMany('App\HasilSubmission');
    }
}
