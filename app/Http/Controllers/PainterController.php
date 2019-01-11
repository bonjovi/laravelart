<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Painter;

class PainterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $painters = Painter::inRandomOrder()->take(8)->get();

        return view('painters')->with([
            'painters' => $painters
        ]);
    }

    public function asc()
    {
        $painters = Painter::orderBy('lastname', 'asc')->get();;

        return view('painters')->with([
            'painters' => $painters
        ]);
    }

    public function new()
    {
        $painters = Painter::latest()->take(8)->get();


        return view('painters')->with([
            'painters' => $painters
        ]);
    }

    public function popular()
    {
        $painters = Painter::orderByViewsCount()->get();


        return view('painters')->with([
            'painters' => $painters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $painter = Painter::where('id', $id)->first();
        $painter->addView();

        return view('painter')->with([
            'painter' => $painter
        ]);
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
