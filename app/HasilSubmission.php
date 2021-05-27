<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilSubmission extends Model
{
    protected $table = 'hasil_submission';
    protected $guarded = ['id'];

    public function submission()
    {
        return $this->belongsTo('App\Submission');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
