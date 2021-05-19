<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::orderBy('created_at', 'asc')->paginate(10);
        return view('front-end.forum.index', [
            'forum'     => $forum
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.forum.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Forum $forum)
    {
        $validator = Validator::make($request->all(), [
            'judul'       => 'required',
            'konten'      => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('forum.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['slug' =>  Str::slug($request->judul)]);
            // $forum->judul = $request->input('judul');
            // $forum->slug = Str::slug($request->judul);
            // $forum->konten = $request->input('konten');
            $forum = Forum::create($request->all());

            return redirect()->route('forum.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
