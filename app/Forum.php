<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable = ['user_id', 'judul', 'slug', 'konten'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
