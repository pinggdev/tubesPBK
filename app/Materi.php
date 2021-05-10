<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;

    protected $table = 'materi';

    protected $fillable = ['materi', 'babmateri', 'kelas_id', 'link', 'slug'];
    
    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }
}
