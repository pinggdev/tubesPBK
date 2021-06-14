<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kelas;
use App\Materi;
use App\Option;
use App\Result;
use App\Submission;
use App\JawabanKuis;
use App\KuisPilihan;
use App\HasilSubmission;
use App\JawabanKuisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $kuis = Kuis::get();
        $hasil_submission = HasilSubmission::all();
        $submission = Submission::all();
        return view('front-end.tutorial-homepage', [
            'kelas'             => $kelas,
            'kuis'              => $kuis,
            'submission'        => $submission,
            'hasil_submission'  => $hasil_submission,
            ]);
    }

    public function tutor(Kelas $kelas, Materi $materi)
    {
        $submission = Submission::all();
        $hasil_submission = HasilSubmission::all();
        return view('front-end.tutorial', [
            'materi'            => $materi, 
            'kelas'             => $kelas,
            'submission'        => $submission,
            'hasil_submission'  => $hasil_submission,
            ]);
    }
    
    public function kuisbab(Kelas $kelas, $babkuis)
    {
        $data = Kuis::with(['options' => function($query) {
            $query->inRandomOrder();
                // ->with(['options' => function($query) {
                //     $query->inRandomOrder();
                // }]);
        }])
        ->where('babkuis', $babkuis)->orWhere('kelas_id', $kelas)->get();

        // $kuis = Kuis::all();
        return view('front-end.kuis', [
            'kelas'         => $kelas,
            'data'          => $data,
            // 'kuis'          => $kuis,
            ]);
    }

    public function storekuis(Request $request)
    {
        $kelas = Kelas::all();
        $option = Option::find(array_values($request->input('kuis')));

        $result = auth()->user()->results()->create([
            'total_points' => $option->sum('points')
        ]);

        $kuis = $option->mapWithKeys(function($option) {
            return [$option->kuis_id => [
                'option_id' => $option->id,
                'points'    => $option->points
                ]
            ];
        })->toArray();
        
        $result->kuis()->sync($kuis);

        return redirect()->route('hasil.show', $result->id);
    }

    public function tampilhasil($result_id, Kelas $kelas)
    {
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
        })->findOrFail($result_id);

        // $kelas = Kelas::all();
    
    return view('front-end.hasilkuis', [
        'result' => $result,
        'kelas' => $kelas,
    ]);
    }

}
