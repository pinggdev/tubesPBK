<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kelas;
use App\Materi;
use App\JawabanKuis;
use App\KuisPilihan;
use App\JawabanKuisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function kelas_saya()
    {
        $kelas = Kelas::all();
        $materi = Materi::all();
        return view('front-end.kelas_saya', ['kelas' => $kelas, 'materi' => $materi]);
    }

    public function tutorhp(Kelas $kelas)
    {
        return view('front-end.tutorial-homepage', ['kelas' => $kelas]);
    }

    public function tutor(Kelas $kelas, Materi $materi)
    {
        return view('front-end.tutorial', ['materi' => $materi, 'kelas' => $kelas]);
    }
    
    public function kuisbab(Kelas $kelas, $babkuis)
    {
        $data = Kuis::where('babkuis', $babkuis)->orWhere('kelas_id', $kelas)->get();
        $kuis = Kuis::all();
        $kuis_pilihan = KuisPilihan::all();
        return view('front-end.kuis', [
            'kelas'         => $kelas,
            'data'          => $data,
            'kuis'          => $kuis,
            'kuis_pilihan'  => $kuis_pilihan
            ]);
    }

}
