<?php

namespace App\Http\Controllers;

use App\Models\TabelKapal;
use App\Http\Requests\StoreTabelKapalRequest;
use App\Http\Requests\UpdateTabelKapalRequest;

class TabelKapalController extends Controller
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
     * @param  \App\Http\Requests\StoreTabelKapalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTabelKapalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TabelKapal  $tabelKapal
     * @return \Illuminate\Http\Response
     */
    public function show(TabelKapal $tabelKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabelKapal  $tabelKapal
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelKapal $tabelKapal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTabelKapalRequest  $request
     * @param  \App\Models\TabelKapal  $tabelKapal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTabelKapalRequest $request, TabelKapal $tabelKapal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabelKapal  $tabelKapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelKapal $tabelKapal)
    {
        //
    }
}
