<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Materi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function kelaspage()
    {
        $kelas = Kelas::get();
        return view('front-end.kelas-page', [
            'kelas'     => $kelas
        ]);
    }

    public function rinciankelas(Kelas $kelas)
    {
        $materi = Materi::get();
        return view('front-end.rincian-kelas', [
            'kelas'      => $kelas,
            'materi'     => $materi,
        ]);
    }

    public function tentang()
    {
        return view('front-end.tentang');
    }
}
