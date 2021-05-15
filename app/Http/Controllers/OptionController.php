<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kelas;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Option $option)
    {
        $q = $request->input('q');


        $option = $option->when($q, function($query) use ($q) {
            return $query->where('option', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.option.index', [
            'option'      => $option,
            'request'   => $request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Option $option)
    {
        $kuis = Kuis::all();
        $kelas = Kelas::get();
        return view('dashboard.option.form', [
            'option'    => $option,
            'kuis'      => $kuis,
            'kelas'      => $kelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kuis_id'     => 'required',
            'option'      => 'required|unique:App\Option,option',
            'points'      => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('option.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // insert ke table kuis
            $option = Option::create($request->all());

            return redirect()->route('option.index');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        $kuis = Kuis::all();
        return view('dashboard.option.edit', [
            'kuis'          => $kuis,
            'option'        => $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $option = Option::find($id);
        $validator = Validator::make($request->all(), [
            'kuis_id'     => 'required',
            'option'      => 'required|unique:App\Option,option,'.$option->id,
            'points'      => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('option.edit', $option->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $option->update($request->all());

            return redirect()->route('option.index');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::find($id);
        $option->delete();
        return redirect()->route('option.index');
    }
}
