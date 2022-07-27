<?php

namespace App\Http\Controllers;

use App\Models\TBKapal;
use App\Http\Requests\StoreTBKapalRequest;
use App\Http\Requests\UpdateTBKapalRequest;

class TBKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTBKapalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTBKapalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TBKapal  $tBKapal
     * @return \Illuminate\Http\Response
     */
    public function show(TBKapal $tBKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TBKapal  $tBKapal
     * @return \Illuminate\Http\Response
     */
    public function edit(TBKapal $tBKapal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTBKapalRequest  $request
     * @param  \App\Models\TBKapal  $tBKapal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTBKapalRequest $request, TBKapal $tBKapal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TBKapal  $tBKapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TBKapal $tBKapal)
    {
        //
    }
}
