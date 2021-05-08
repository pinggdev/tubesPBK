<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Materi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function kelas_saya()
    {
        $kelas = Kelas::all();
        $materi = Materi::all();
        return view('front-end.kelas_saya', ['kelas' => $kelas, 'materi' => $materi]);
    }

    public function tutor(Kelas $kelas, Materi $materi)
    {
        return view('front-end.tutorial', ['materi' => $materi, 'kelas' => $kelas]);
    }
}
