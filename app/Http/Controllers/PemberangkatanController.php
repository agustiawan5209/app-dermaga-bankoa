<?php

namespace App\Http\Controllers;

use App\Models\Pemberangkatan;
use App\Http\Requests\StorePemberangkatanRequest;
use App\Http\Requests\UpdatePemberangkatanRequest;

class PemberangkatanController extends Controller
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
     * @param  \App\Http\Requests\StorePemberangkatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemberangkatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemberangkatan  $pemberangkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemberangkatan $pemberangkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemberangkatan  $pemberangkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemberangkatan $pemberangkatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemberangkatanRequest  $request
     * @param  \App\Models\Pemberangkatan  $pemberangkatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemberangkatanRequest $request, Pemberangkatan $pemberangkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemberangkatan  $pemberangkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemberangkatan $pemberangkatan)
    {
        //
    }
}
