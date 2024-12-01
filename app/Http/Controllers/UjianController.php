<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Http\Requests\StoreUjianRequest;
use App\Http\Requests\UpdateUjianRequest;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujian = \App\Models\Ujian::latest()->paginate(10);
        return view('ujian.index', compact('ujian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ujian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUjianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUjianRequest $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ujian $ujian)
    {
        //
    }
}
